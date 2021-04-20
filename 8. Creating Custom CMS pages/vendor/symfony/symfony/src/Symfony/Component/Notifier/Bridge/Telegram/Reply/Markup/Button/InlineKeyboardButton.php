<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Notifier\Bridge\Telegram\Reply\Markup\Button;

/**
 * @author Mihail Krasilnikov <mihail.krasilnikov.j@gmail.com>
 *
 * @see https://core.telegram.org/bots/api#inlinekeyboardbutton
 *
 * @experimental in 5.2
 */
final class InlineKeyboardButton extends AbstractKeyboardButton
{
    public function __construct(string $text = '')
    {
        $this->options['text'] = $text;
    }

    public function url(string $url): self
    {
        $this->options['url'] = $url;

        return $this;
    }

    public function loginUrl(string $url): self
    {
        $this->options['login_url']['url'] = $url;

        return $this;
    }

    public function loginUrlForwardText(string $text): self
    {
        $this->options['login_url']['forward_text'] = $text;

        return $this;
    }

    public function requestWriteAccess(bool $bool): self
    {
        $this->options['login_url']['request_write_access'] = $bool;

        return $this;
    }

    public function callbackData(string $data): self
    {
        $this->options['callback_data'] = $data;

        return $this;
    }

    public function switchInlineQuery(string $query): self
    {
        $this->options['switch_inline_query'] = $query;

        return $this;
    }

    public function payButton(bool $bool): self
    {
        $this->options['pay'] = $bool;

        return $this;
    }
}
