<?php

namespace App\CalculatedValue;

use Pimcore\Model\DataObject\ClassDefinition\CalculatorClassInterface;
use Pimcore\Model\DataObject\ClassDefinition\Layout\DynamicTextLabelInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Data\CalculatedValue;
use Pimcore\Model\DataObject\Product;
use Pimcore\Tool;

class DataQualityCalculator implements DynamicTextLabelInterface, CalculatorClassInterface
{
    public function compute(Concrete $object, CalculatedValue $context): string
    {
        return $this->getCalculatedValueForEditMode($object, $context);
    }

    public function getCalculatedValueForEditMode(Concrete $object, CalculatedValue $context): string
    {
        if ($object instanceof Product) {

            $language = $context->getPosition();

            if(empty($object->getName($language)) 
                || empty($object->getShort_description($language))
                || empty($object->getDescription($language))){

                return "no";
            }

            return "yes";
        }
        
        return '';
    }

    public function renderLayoutText($data, $object, $params)
    {
        if ($object instanceof Product) {

            $htmlTable = '<table style="border: 1px solid black">';
            $htmlTable .= '<thead><tr>
                <td style="border: 1px solid black">Language</td>
                <td style="border: 1px solid black">Translation Status</td>
            </tr></thead>';

            foreach (Tool::getValidLanguages() as $language) {
                $htmlTable .= '<tr>';
                $htmlTable .= '<td style="border: 1px solid black">'.$language.'</td>';
                $htmlTable .= '<td style="border: 1px solid black">'.
                    ($object->getTranslationCompleted($language) == "yes" ? "completed" : "not completed").
                    '</td>';
                $htmlTable .= '</tr>';
            }

            $htmlTable .= '</table>';

            return "<h2 style='margin-top: 0'>Translations Summary</h2>" . $htmlTable;
        }
        
        return '';
    }
}
