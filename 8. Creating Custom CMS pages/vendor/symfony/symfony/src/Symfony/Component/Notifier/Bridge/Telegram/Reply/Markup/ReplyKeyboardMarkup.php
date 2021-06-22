<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Notifier\Bridge\Telegram\Reply\Markup;

use Symfony\Component\Notifier\Bridge\Telegram\Reply\Markup\Button\KeyboardButton;

/**
 * @author Mihail Krasilnikov <mihail.krasilnikov.j@gmail.com>
 *
 * @see https://core.telegram.org/bots/api#replykeyboardmarkup
 *
 * @experimental in 5.2
 */
final class ReplyKeyboardMarkup extends AbstractTelegramReplyMarkup
{
    public function __construct()
    {
        $this->options['keyboard'] = [];
    }

    /**
     * @param array|KeyboardButton[] $buttons
     *
     * @return $this
     */
    public function keyboard(array $buttons): self
    {
        $buttons = array_map(static function (KeyboardButton $button) {
            return $button->toArray();
        }, $buttons);

        $this->options['keyboard'][] = $buttons;

        return $this;
    }

    public function resizeKeyboard(bool $bool): self
    {
        $this->options['resize_keyboard'] = $bool;

        return $this;
    }

    public function oneTimeKeyboard(bool $bool): self
    {
        $this->options['one_time_keyboard'] = $bool;

        return $this;
    }

    public function selective(bool $bool): self
    {
        $this->options['selective'] = $bool;

        return $this;
    }
}
