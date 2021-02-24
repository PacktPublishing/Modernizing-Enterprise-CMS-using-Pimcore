<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Image\Adapter;

use Pimcore\Cache;
use Pimcore\Config;
use Pimcore\File;
use Pimcore\Image\Adapter;
use Pimcore\Logger;

class Imagick extends Adapter
{
    /**
     * @var string
     */
    protected static $RGBColorProfile;

    /**
     * @var string
     */
    protected static $CMYKColorProfile;

    /**
     * @var \Imagick
     */
    protected $resource;

    /**
     * @var string
     */
    protected $imagePath;

    /**
     * @param string $imagePath
     * @param array $options
     *
     * @return $this|bool|self
     */
    public function load($imagePath, $options = [])
    {
        if (isset($options['preserveColor'])) {
            // set this option to TRUE to skip all color transformations during the loading process
            // this can massively improve performance if the color information doesn't matter, ...
            // eg. when using this function to obtain dimensions from an image
            $this->setPreserveColor($options['preserveColor']);
        }

        // support image URLs
        if (preg_match('@^https?://|^s3://@', $imagePath)) {
            $tmpFilename = 'imagick_auto_download_' . md5($imagePath) . '.' . File::getFileExtension($imagePath);
            $tmpFilePath = PIMCORE_SYSTEM_TEMP_DIRECTORY . '/' . $tmpFilename;

            $this->tmpFiles[] = $tmpFilePath;

            if (preg_match('@^s3://@', $imagePath)) {
                $imageContent = file_get_contents($imagePath);
            } else {
                $imageContent = \Pimcore\Tool::getHttpData($imagePath);
            }

            File::put($tmpFilePath, $imageContent);
            $imagePath = $tmpFilePath;
        }

        if (!stream_is_local($imagePath) && isset($options['asset'])) {
            // imagick is only able to deal with local files
            // if your're using custom stream wrappers this wouldn't work, so we create a temp. local copy
            $imagePath = $options['asset']->getTemporaryFile();
            $this->tmpFiles[] = $imagePath;
        }

        if (isset($options['asset']) && preg_match('@\.svgz?$@', $imagePath) && preg_match('@[^a-zA-Z0-9\-\.~_/]+@', $imagePath)) {
            // Imagick/Inkscape delegate has problems with special characters in the file path, eg. "ß" causes
            // Inkscape to completely go crazy -> Debian 8.10, Inkscape 0.48.5 r10040, Imagick 6.8.9-9 Q16, Imagick 3.4.3
            // we create a local temp file, to workaround this problem
            $imagePath = $options['asset']->getTemporaryFile();
            $this->tmpFiles[] = $imagePath;
        }

        if ($this->resource) {
            unset($this->resource);
            $this->resource = null;
        }

        try {
            $i = new \Imagick();
            $this->imagePath = $imagePath;

            if (!$this->isPreserveColor() && method_exists($i, 'setcolorspace')) {
                $i->setcolorspace(\Imagick::COLORSPACE_SRGB);
            }

            if (!$this->isPreserveColor() && $this->isVectorGraphic($imagePath)) {
                // only for vector graphics
                // the below causes problems with PSDs when target format is PNG32 (nobody knows why ;-))
                $i->setBackgroundColor(new \ImagickPixel('transparent'));
            }

            if (isset($options['resolution'])) {
                // set the resolution to 2000x2000 for known vector formats
                // otherwise this will cause problems with eg. cropPercent in the image editable (select specific area)
                // maybe there's a better solution but for now this fixes the problem
                $i->setResolution($options['resolution']['x'], $options['resolution']['y']);
            }

            $imagePathLoad = $imagePath;

            if (strpos($imagePathLoad, ':') !== false) {
                $imagePathLoad = ':' . $imagePathLoad;
            }

            $imagePathLoad = $imagePathLoad . '[0]';

            if (!$i->readImage($imagePathLoad) || !filesize($imagePath)) {
                return false;
            }

            $this->resource = $i;

            // set dimensions
            $dimensions = $this->getDimensions();
            $this->setWidth($dimensions['width']);
            $this->setHeight($dimensions['height']);

            if (!$this->sourceImageFormat) {
                $this->sourceImageFormat = $i->getImageFormat();
            }

            // check if image can have alpha channel
            if (!$this->reinitializing) {
                $alphaChannel = $i->getImageAlphaChannel();
                if ($alphaChannel) {
                    $this->setIsAlphaPossible(true);
                }
            }

            if (!$this->isPreserveColor()) {
                $this->setColorspaceToRGB();
            }

            $isClipAutoSupport = \Pimcore::getContainer()->getParameter('pimcore.config')['assets']['image']['thumbnails']['clip_auto_support'];
            if ($isClipAutoSupport) {
                // check for the existence of an embedded clipping path (8BIM / Adobe profile meta data)
                $identifyRaw = $i->identifyImage(true)['rawOutput'];
                if (strpos($identifyRaw, 'Clipping path') && strpos($identifyRaw, '<svg')) {
                    // if there's a clipping path embedded, apply the first one

                    try {
                        // known issues:
                        // - it seems that -clip doesnt work with the ImageMagick version
                        //   ImageMagick 6.9.7-4 Q16 x86_64 20170114 (which is used in Debian 9)
                        // - Imagick 3.4.4 with ImageMagick 7 on OSX has horrible broken clipping support
                        $i->setImageAlphaChannel(\Imagick::ALPHACHANNEL_TRANSPARENT);
                        $i->clipImage();
                    } catch (\Exception $e) {
                        Logger::info(sprintf('Although automatic clipping support is enabled, your current ImageMagick / Imagick version does not support this operation on the image %s', $imagePath));
                    }

                    // Imagick version compatibility
                    // Since Imagick 3.4.4 compiled against ImageMagick 7 ALPHACHANNEL_OPAQUE was removed for whatever reason
                    // ImageMagick is still defining and using OpaqueAlphaChannel in ImageMagick 7 releases
                    // Let's hardcode the current ImageMagick 7 enum number to workaround this issue
                    $alphaChannel = 11;
                    if (defined('Imagick::ALPHACHANNEL_OPAQUE')) {
                        $alphaChannel = \Imagick::ALPHACHANNEL_OPAQUE;
                    }
                    $i->setImageAlphaChannel($alphaChannel);
                }
            }
        } catch (\Exception $e) {
            Logger::error('Unable to load image: ' . $imagePath);
            Logger::error($e);

            return false;
        }

        $this->setModified(false);

        return $this;
    }

    /**
     * @return string
     */
    public function getContentOptimizedFormat()
    {
        $format = 'pjpeg';
        if ($this->hasAlphaChannel()) {
            $format = 'png32';
        }

        return $format;
    }

    /**
     * @param string $path
     * @param string|null $format
     * @param int|null $quality
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function save($path, $format = null, $quality = null)
    {
        if (!$format) {
            $format = 'png32';
        }

        if ($format == 'original') {
            $format = $this->sourceImageFormat;
        }

        $format = strtolower($format);

        if ($format == 'png') {
            // we need to force imagick to create png32 images, otherwise this can cause some strange effects
            // when used with gray-scale images
            $format = 'png32';
        }

        $originalFilename = null;
        $i = $this->resource; // this is because of HHVM which has problems with $this->resource->writeImage();

        if (in_array($format, ['jpeg', 'pjpeg', 'jpg']) && $this->isAlphaPossible) {
            // set white background for transparent pixels
            $i->setImageBackgroundColor('#ffffff');

            if ($i->getImageAlphaChannel() !== 0) { // Note: returns (int) 0 if there's no AlphaChannel, PHP Docs are wrong. See: https://www.imagemagick.org/api/channel.php
                // Imagick version compatibility
                $alphaChannel = 11; // This works at least as far back as version 3.1.0~rc1-1
                if (defined('Imagick::ALPHACHANNEL_REMOVE')) {
                    // Imagick::ALPHACHANNEL_REMOVE has been added in 3.2.0b2
                    $alphaChannel = \Imagick::ALPHACHANNEL_REMOVE;
                }
                $i->setImageAlphaChannel($alphaChannel);
            }

            $i->mergeImageLayers(\Imagick::LAYERMETHOD_FLATTEN);
        }

        if (!$this->isPreserveMetaData()) {
            $i->stripImage();
            if ($format == 'png32') {
                // do not include any meta-data
                // this is due a bug in -strip, therefore we have to use this custom option
                // see also: https://github.com/ImageMagick/ImageMagick/issues/156
                $i->setOption('png:include-chunk', 'none');
            }
        }
        if (!$this->isPreserveColor()) {
            $i->profileImage('*', null);
        }

        if ($quality && !$this->isPreserveColor()) {
            $i->setCompressionQuality((int) $quality);
            $i->setImageCompressionQuality((int) $quality);
        }

        if ($format == 'tiff') {
            $i->setCompression(\Imagick::COMPRESSION_LZW);
        }

        // force progressive JPEG if filesize >= 10k
        // normally jpeg images are bigger than 10k so we avoid the double compression (baseline => filesize check => if necessary progressive)
        // and check the dimensions here instead to faster generate the image
        // progressive JPEG - better compression, smaller filesize, especially for web optimization
        if ($format == 'jpeg' && !$this->isPreserveColor()) {
            if (($this->getWidth() * $this->getHeight()) > 35000) {
                $i->setInterlaceScheme(\Imagick::INTERLACE_PLANE);
            }
        }

        // Imagick isn't able to work with custom stream wrappers, so we make a workaround
        $realTargetPath = null;
        if (!stream_is_local($path)) {
            $realTargetPath = $path;
            $path = PIMCORE_SYSTEM_TEMP_DIRECTORY . '/imagick-tmp-' . uniqid() . '.' . File::getFileExtension($path);
        }

        if (!stream_is_local($path)) {
            $i->setImageFormat($format);
            $success = File::put($path, $i->getImageBlob());
        } else {
            $success = $i->writeImage($format . ':' . $path);
        }

        if (!$success) {
            throw new \Exception('Unable to write image: ', $path);
        }

        if ($realTargetPath) {
            File::rename($path, $realTargetPath);
        }

        return $this;
    }

    /**
     * @return  void
     */
    protected function destroy()
    {
        if ($this->resource) {
            $this->resource->clear();
            $this->resource->destroy();
            $this->resource = null;
        }
    }

    /**
     * @return bool
     */
    protected function hasAlphaChannel()
    {
        if ($this->isAlphaPossible) {
            $width = $this->resource->getImageWidth(); // Get the width of the image
            $height = $this->resource->getImageHeight(); // Get the height of the image

            // We run the image pixel by pixel and as soon as we find a transparent pixel we stop and return true.
            for ($i = 0; $i < $width; $i++) {
                for ($j = 0; $j < $height; $j++) {
                    $pixel = $this->resource->getImagePixelColor($i, $j);
                    $color = $pixel->getColor(true); // get the real alpha not just 1/0
                    if ($color['a'] < 1) { // if there's an alpha pixel, return true
                        return true;
                    }
                }
            }
        }

        // If we dont find any pixel the function will return false.
        return false;
    }

    /**
     * @return $this
     */
    public function setColorspaceToRGB()
    {
        $imageColorspace = $this->resource->getImageColorspace();

        $profiles = $this->resource->getImageProfiles('icc', true);

        // Workaround for ImageMagick (e.g. 6.9.10-23) bug, that let's it crash immediately if the tagged colorspace is
        // different from the colorspace of the embedded icc color profile
        // If that is the case we just ignore the color profiles
        if (isset($profiles['icc']) && in_array($imageColorspace, [\Imagick::COLORSPACE_CMYK, \Imagick::COLORSPACE_SRGB])) {
            if (strpos($profiles['icc'], 'CMYK') !== false && $imageColorspace !== \Imagick::COLORSPACE_CMYK) {
                return $this;
            }

            if (strpos($profiles['icc'], 'RGB') !== false && $imageColorspace !== \Imagick::COLORSPACE_SRGB) {
                return $this;
            }
        }

        if ($imageColorspace == \Imagick::COLORSPACE_CMYK) {
            if (self::getCMYKColorProfile() && self::getRGBColorProfile()) {
                // if it doesn't have a CMYK ICC profile, we add one
                if (!isset($profiles['icc'])) {
                    $this->resource->profileImage('icc', self::getCMYKColorProfile());
                }
                // then we add an RGB profile
                $this->resource->profileImage('icc', self::getRGBColorProfile());
                $this->resource->setImageColorspace(\Imagick::COLORSPACE_SRGB); // we have to use SRGB here, no clue why but it works
            } else {
                $this->resource->setImageColorspace(\Imagick::COLORSPACE_SRGB);
            }
        } elseif ($imageColorspace == \Imagick::COLORSPACE_GRAY) {
            $this->resource->setImageColorspace(\Imagick::COLORSPACE_SRGB);
        } elseif (!in_array($imageColorspace, [\Imagick::COLORSPACE_RGB, \Imagick::COLORSPACE_SRGB])) {
            $this->resource->setImageColorspace(\Imagick::COLORSPACE_SRGB);
        } else {
            // this is to handle embedded icc profiles in the RGB/sRGB colorspace
            if (isset($profiles['icc'])) {
                try {
                    // if getImageColorspace() says SRGB but the embedded icc profile is CMYK profileImage() will throw an exception
                    $this->resource->profileImage('icc', self::getRGBColorProfile());
                } catch (\Exception $e) {
                    Logger::warn($e);
                }
            }
        }

        // this is a HACK to force grayscale images to be real RGB - truecolor, this is important if you want to use
        // thumbnails in PDF's because they do not support "real" grayscale JPEGs or PNGs
        // problem is described here: http://imagemagick.org/Usage/basics/#type
        // and here: http://www.imagemagick.org/discourse-server/viewtopic.php?f=2&t=6888#p31891

        // 20.7.2018: this seems to cause new issues with newer Imagick/PHP versions, so we take it out for now ...
        //  not sure if this workaround is actually still necessary (wouldn't assume so).

        /*$currentLocale = setlocale(LC_ALL, '0'); // this locale hack thing is also a hack for imagick
        setlocale(LC_ALL, 'en'); // Set locale to "en" for ImagickDraw::point() to ensure the involved tostring() methods keep the decimal point

        $draw = new \ImagickDraw();
        $draw->setFillColor('#ff0000');
        $draw->setfillopacity(.01);
        $draw->point(floor($this->getWidth() / 2), floor($this->getHeight() / 2)); // place it in the middle of the image
        $this->resource->drawImage($draw);

        setlocale(LC_ALL, $currentLocale); // see setlocale() above, for details ;-)
        */

        return $this;
    }

    /**
     * @param string $CMYKColorProfile
     */
    public static function setCMYKColorProfile($CMYKColorProfile)
    {
        self::$CMYKColorProfile = $CMYKColorProfile;
    }

    /**
     * @return string
     */
    public static function getCMYKColorProfile()
    {
        if (!self::$CMYKColorProfile) {
            $path = Config::getSystemConfiguration('assets')['icc_cmyk_profile'] ?? null;
            if (!$path || !file_exists($path)) {
                $path = __DIR__ . '/../icc-profiles/ISOcoated_v2_eci.icc'; // default profile
            }

            if ($path && file_exists($path)) {
                self::$CMYKColorProfile = file_get_contents($path);
            }
        }

        return self::$CMYKColorProfile;
    }

    /**
     * @param string $RGBColorProfile
     */
    public static function setRGBColorProfile($RGBColorProfile)
    {
        self::$RGBColorProfile = $RGBColorProfile;
    }

    /**
     * @return string
     */
    public static function getRGBColorProfile()
    {
        if (!self::$RGBColorProfile) {
            $path = Config::getSystemConfiguration('assets')['icc_rgb_profile'] ?? null;
            if (!$path || !file_exists($path)) {
                $path = __DIR__ . '/../icc-profiles/sRGB_IEC61966-2-1_black_scaled.icc'; // default profile
            }

            if (file_exists($path)) {
                self::$RGBColorProfile = file_get_contents($path);
            }
        }

        return self::$RGBColorProfile;
    }

    /**
     * @param int $width
     * @param int $height
     *
     * @return self
     */
    public function resize($width, $height)
    {
        $this->preModify();

        // this is the check for vector formats because they need to have a resolution set
        // this does only work if "resize" is the first step in the image-pipeline

        if ($this->isVectorGraphic()) {
            // the resolution has to be set before loading the image, that's why we have to destroy the instance and load it again
            $res = $this->resource->getImageResolution();
            $x_ratio = $res['x'] / $this->getWidth();
            $y_ratio = $res['y'] / $this->getHeight();
            $this->resource->removeImage();

            $newRes = ['x' => $width * $x_ratio, 'y' => $height * $y_ratio];

            // only use the calculated resolution if we need a higher one that the one we got from the metadata (getImageResolution)
            // this is because sometimes the quality is much better when using the "native" resolution from the metadata
            if ($newRes['x'] > $res['x'] && $newRes['y'] > $res['y']) {
                $this->resource->setResolution($newRes['x'], $newRes['y']);
            } else {
                $this->resource->setResolution($res['x'], $res['y']);
            }

            $this->resource->readImage($this->imagePath);

            if (!$this->isPreserveColor()) {
                $this->setColorspaceToRGB();
            }
        }

        $width = (int)$width;
        $height = (int)$height;

        $this->resource->resizeimage($width, $height, \Imagick::FILTER_UNDEFINED, 1, false);

        $this->setWidth($width);
        $this->setHeight($height);

        $this->postModify();

        return $this;
    }

    /**
     * @param int $x
     * @param int $y
     * @param int $width
     * @param int $height
     *
     * @return self
     */
    public function crop($x, $y, $width, $height)
    {
        $this->preModify();

        $this->resource->cropImage($width, $height, $x, $y);
        $this->resource->setImagePage($width, $height, 0, 0);

        $this->setWidth($width);
        $this->setHeight($height);

        $this->postModify();

        return $this;
    }

    /**
     * @param int $width
     * @param int $height
     * @param bool $forceResize
     *
     * @return $this
     */
    public function frame($width, $height, $forceResize = false)
    {
        $this->preModify();

        $this->contain($width, $height, $forceResize);

        $x = ($width - $this->getWidth()) / 2;
        $y = ($height - $this->getHeight()) / 2;

        $newImage = $this->createImage($width, $height);
        $newImage->compositeImage($this->resource, \Imagick::COMPOSITE_DEFAULT, $x, $y);
        $this->resource = $newImage;

        $this->setWidth($width);
        $this->setHeight($height);

        $this->postModify();

        $this->setIsAlphaPossible(true);

        return $this;
    }

    /**
     * @param float $tolerance
     *
     * @return self
     */
    public function trim($tolerance)
    {
        $this->preModify();

        $this->resource->trimimage($tolerance);

        $dimensions = $this->getDimensions();
        $this->setWidth($dimensions['width']);
        $this->setHeight($dimensions['height']);

        $this->postModify();

        return $this;
    }

    /**
     * @param string $color
     *
     * @return self
     */
    public function setBackgroundColor($color)
    {
        $this->preModify();

        $newImage = $this->createImage($this->getWidth(), $this->getHeight(), $color);
        $newImage->compositeImage($this->resource, \Imagick::COMPOSITE_DEFAULT, 0, 0);
        $this->resource = $newImage;

        $this->postModify();

        $this->setIsAlphaPossible(false);

        return $this;
    }

    /**
     * @param int $width
     * @param int $height
     * @param string $color
     *
     * @return \Imagick
     */
    protected function createImage($width, $height, $color = 'transparent')
    {
        $newImage = new \Imagick();
        $newImage->newimage($width, $height, $color);
        $newImage->setImageFormat($this->resource->getImageFormat());

        return $newImage;
    }

    /**
     * @param int $angle
     *
     * @return $this
     */
    public function rotate($angle)
    {
        $this->preModify();

        $this->resource->rotateImage(new \ImagickPixel('none'), $angle);
        $this->setWidth($this->resource->getimagewidth());
        $this->setHeight($this->resource->getimageheight());

        $this->postModify();

        $this->setIsAlphaPossible(true);

        return $this;
    }

    /**
     * @param int $width
     * @param int $height
     *
     * @return $this
     */
    public function roundCorners($width, $height)
    {
        $this->preModify();

        if (method_exists($this->resource, 'roundCorners')) {
            $this->resource->roundCorners($width, $height);
        } else {
            $this->internalRoundCorners($width, $height);
        }

        $this->postModify();

        $this->setIsAlphaPossible(true);

        return $this;
    }

    /**
     * Workaround for Imagick PHP extension v3.4.4 which removed Imagick::roundCorners
     *
     * @param int $width
     * @param int $height
     */
    protected function internalRoundCorners($width, $height)
    {
        $imageWidth = $this->resource->getImageWidth();
        $imageHeight = $this->resource->getImageHeight();

        $rectangle = new \ImagickDraw();
        $rectangle->setFillColor(new \ImagickPixel('black'));
        $rectangle->roundRectangle(0, 0, $imageWidth - 1, $imageHeight - 1, $width, $height);

        $mask = new \Imagick();
        $mask->newImage($imageWidth, $imageHeight, new \ImagickPixel('transparent'), 'png');
        $mask->drawImage($rectangle);

        $this->resource->compositeImage($mask, \Imagick::COMPOSITE_DSTIN, 0, 0);
    }

    /**
     * @param string $image
     * @param null|string $mode
     *
     * @return $this
     *
     * @throws \ImagickException
     */
    public function setBackgroundImage($image, $mode = null)
    {
        $this->preModify();

        $image = ltrim($image, '/');
        $image = PIMCORE_WEB_ROOT . '/' . $image;

        if (is_file($image)) {
            $newImage = new \Imagick();

            if ($mode == 'asTexture') {
                $newImage->newImage($this->getWidth(), $this->getHeight(), new \ImagickPixel());
                $texture = new \Imagick($image);
                $newImage = $newImage->textureImage($texture);
            } else {
                $newImage->readimage($image);
                if ($mode == 'cropTopLeft') {
                    $newImage->cropImage($this->getWidth(), $this->getHeight(), 0, 0);
                } else {
                    // default behavior (fit)
                    $newImage->resizeimage($this->getWidth(), $this->getHeight(), \Imagick::FILTER_UNDEFINED, 1, false);
                }
            }

            $newImage->compositeImage($this->resource, \Imagick::COMPOSITE_DEFAULT, 0, 0);
            $this->resource = $newImage;
        }

        $this->postModify();

        return $this;
    }

    /**
     * @param string $image
     * @param int $x Amount of horizontal pixels the overlay should be offset from the origin
     * @param int $y Amount of vertical pixels the overlay should be offset from the origin
     * @param int $alpha Opacity in a scale of 0 (transparent) to 100 (opaque)
     * @param string $composite
     * @param string $origin Origin of the X and Y coordinates (top-left, top-right, bottom-left, bottom-right or center)
     *
     * @return Imagick
     */
    public function addOverlay($image, $x = 0, $y = 0, $alpha = 100, $composite = 'COMPOSITE_DEFAULT', $origin = 'top-left')
    {
        $this->preModify();

        // 100 alpha is default
        if (empty($alpha)) {
            $alpha = 100;
        }
        $alpha = round($alpha / 100, 1);

        //Make sure the composite constant exists.
        if (is_null(constant('Imagick::' . $composite))) {
            $composite = 'COMPOSITE_DEFAULT';
        }

        $newImage = null;

        if (is_string($image)) {
            $image = ltrim($image, '/');
            $image = PIMCORE_PROJECT_ROOT . '/' . $image;

            $newImage = new \Imagick();
            $newImage->readimage($image);
        } elseif ($image instanceof \Imagick) {
            $newImage = $image;
        }

        if ($newImage) {
            if ($origin == 'top-right') {
                $x = $this->resource->getImageWidth() - $newImage->getImageWidth() - $x;
            } elseif ($origin == 'bottom-left') {
                $y = $this->resource->getImageHeight() - $newImage->getImageHeight() - $y;
            } elseif ($origin == 'bottom-right') {
                $x = $this->resource->getImageWidth() - $newImage->getImageWidth() - $x;
                $y = $this->resource->getImageHeight() - $newImage->getImageHeight() - $y;
            } elseif ($origin == 'center') {
                $x = round($this->resource->getImageWidth() / 2) - round($newImage->getImageWidth() / 2) + $x;
                $y = round($this->resource->getImageHeight() / 2) - round($newImage->getImageHeight() / 2) + $y;
            }

            $newImage->evaluateImage(\Imagick::EVALUATE_MULTIPLY, $alpha, \Imagick::CHANNEL_ALPHA);
            $this->resource->compositeImage($newImage, constant('Imagick::' . $composite), $x, $y);
        }

        $this->postModify();

        return $this;
    }

    /**
     * @param string $image
     * @param string $composite
     *
     * @return $this
     */
    public function addOverlayFit($image, $composite = 'COMPOSITE_DEFAULT')
    {
        $image = ltrim($image, '/');
        $image = PIMCORE_PROJECT_ROOT . '/' . $image;

        $newImage = new \Imagick();
        $newImage->readimage($image);
        $newImage->resizeimage($this->getWidth(), $this->getHeight(), \Imagick::FILTER_UNDEFINED, 1, false);

        $this->addOverlay($newImage, 0, 0, 100, $composite);

        return $this;
    }

    /**
     * @param string $image
     *
     * @return self
     */
    public function applyMask($image)
    {
        $this->preModify();
        $image = ltrim($image, '/');
        $image = PIMCORE_PROJECT_ROOT . '/' . $image;

        if (is_file($image)) {
            $this->resource->setImageMatte(1);
            $newImage = new \Imagick();
            $newImage->readimage($image);
            $newImage->resizeimage($this->getWidth(), $this->getHeight(), \Imagick::FILTER_UNDEFINED, 1, false);
            $this->resource->compositeImage($newImage, \Imagick::COMPOSITE_COPYOPACITY, 0, 0, \Imagick::CHANNEL_ALPHA);
        }

        $this->postModify();

        $this->setIsAlphaPossible(true);

        return $this;
    }

    /**
     * @return self
     */
    public function grayscale()
    {
        $this->preModify();
        $this->resource->setImageType(\Imagick::IMGTYPE_GRAYSCALEMATTE);
        $this->postModify();

        return $this;
    }

    /**
     * @return self
     */
    public function sepia()
    {
        $this->preModify();
        $this->resource->sepiatoneimage(85);
        $this->postModify();

        return $this;
    }

    /**
     * @param int $radius
     * @param float $sigma
     * @param float $amount
     * @param float $threshold
     *
     * @return $this|Adapter
     */
    public function sharpen($radius = 0, $sigma = 1.0, $amount = 1.0, $threshold = 0.05)
    {
        $this->preModify();
        $this->resource->normalizeImage();
        $this->resource->unsharpMaskImage($radius, $sigma, $amount, $threshold);
        $this->postModify();

        return $this;
    }

    /**
     * @param int $radius
     * @param float $sigma
     *
     * @return $this|Adapter
     */
    public function gaussianBlur($radius = 0, $sigma = 1.0)
    {
        $this->preModify();
        $this->resource->gaussianBlurImage($radius, $sigma);
        $this->postModify();

        return $this;
    }

    /**
     * @param int $brightness
     * @param int $saturation
     * @param int $hue
     *
     * @return $this
     */
    public function brightnessSaturation($brightness = 100, $saturation = 100, $hue = 100)
    {
        $this->preModify();
        $this->resource->modulateImage($brightness, $saturation, $hue);
        $this->postModify();

        return $this;
    }

    /**
     * @param string $mode
     *
     * @return $this|Adapter
     */
    public function mirror($mode)
    {
        $this->preModify();

        if ($mode == 'vertical') {
            $this->resource->flipImage();
        } elseif ($mode == 'horizontal') {
            $this->resource->flopImage();
        }

        $this->postModify();

        return $this;
    }

    /**
     * @param string|null $imagePath
     *
     * @return bool
     */
    public function isVectorGraphic($imagePath = null)
    {
        if (!$imagePath) {
            $imagePath = $this->imagePath;
        }

        // we need to do this check first, because ImageMagick using the inkscape delegate returns "PNG" when calling
        // getimageformat() onto SVG graphics, this is a workaround to avoid problems
        if (preg_match("@\.(svgz?|eps|pdf|ps|ai|indd)$@", $imagePath)) {
            return true;
        }

        try {
            if ($this->resource) {
                $type = $this->resource->getimageformat();
                $vectorTypes = [
                    'EPT',
                    'EPDF',
                    'EPI',
                    'EPS',
                    'EPS2',
                    'EPS3',
                    'EPSF',
                    'EPSI',
                    'EPT',
                    'PDF',
                    'PFA',
                    'PFB',
                    'PFM',
                    'PS',
                    'PS2',
                    'PS3',
                    'SVG',
                    'SVGZ',
                    'MVG',
                ];

                if (in_array(strtoupper($type), $vectorTypes)) {
                    return true;
                }
            }
        } catch (\Exception $e) {
            Logger::err($e);
        }

        return false;
    }

    /**
     * @return array
     */
    public function getDimensions()
    {
        if ($vectorDimensions = $this->getVectorFormatEmbeddedRasterDimensions()) {
            return $vectorDimensions;
        }

        return [
            'width' => $this->resource->getImageWidth(),
            'height' => $this->resource->getImageHeight(),
        ];
    }

    /**
     * @return array|null
     */
    public function getVectorFormatEmbeddedRasterDimensions()
    {
        if (in_array($this->resource->getimageformat(), ['EPT', 'EPDF', 'EPI', 'EPS', 'EPS2', 'EPS3', 'EPSF', 'EPSI', 'EPT', 'PDF', 'PFA', 'PFB', 'PFM', 'PS', 'PS2', 'PS3'])) {
            // we need a special handling for PhotoShop EPS
            $i = 0;

            ini_set('auto_detect_line_endings', true); // we need to turn this on, as the damn f****** Mac has different line endings in EPS files, Prost Mahlzeit!

            $epsFile = fopen($this->imagePath, 'r');
            while (($eps_line = fgets($epsFile)) && ($i < 100)) {
                if (preg_match('/%ImageData: ([0-9]+) ([0-9]+)/i', $eps_line, $matches)) {
                    return [
                        'width' => $matches[1],
                        'height' => $matches[2],
                    ];
                }
                $i++;
            }
        }

        return null;
    }

    /**
     * @return array
     */
    public function getVectorRasterDimensions()
    {
        if ($vectorDimensions = $this->getVectorFormatEmbeddedRasterDimensions()) {
            return $vectorDimensions;
        }

        return parent::getVectorRasterDimensions();
    }

    protected static $supportedFormatsCache = [];

    /**
     * @inheritdoc
     */
    public function supportsFormat(string $format, bool $force = false)
    {
        if ($force) {
            return $this->checkFormatSupport($format);
        }

        if (!isset(self::$supportedFormatsCache[$format])) {

            // since determining if an image format is supported is quite expensive we use two-tiered caching
            // in-process caching (static variable) and the shared cache
            $cacheKey = 'imagick_format_' . $format;
            if (($cachedValue = Cache::load($cacheKey)) !== false) {
                self::$supportedFormatsCache[$format] = (bool) $cachedValue;
            } else {
                self::$supportedFormatsCache[$format] = $this->checkFormatSupport($format);

                // we cache the status as an int, so that we know if the status was cached or not, with bool that wouldn't be possible, since load() returns false if item doesn't exists
                Cache::save((int) self::$supportedFormatsCache[$format], $cacheKey, [], null, 999, true);
            }
        }

        return self::$supportedFormatsCache[$format];
    }

    /**
     * @param string $format
     *
     * @return bool
     */
    protected function checkFormatSupport(string $format): bool
    {
        try {
            // we can't use \Imagick::queryFormats() here, because this doesn't consider configured delegates
            $tmpFile = PIMCORE_SYSTEM_TEMP_DIRECTORY . '/imagick-format-support-detection-' . uniqid() . '.' . $format;
            $image = new \Imagick();
            $image->newImage(1, 1, new \ImagickPixel('red'));
            $image->writeImage($format . ':' . $tmpFile);
            unlink($tmpFile);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
