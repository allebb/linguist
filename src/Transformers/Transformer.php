<?php

namespace Ballen\Linguist\Transformers;

/**
 * Linguist
 *
 * Linguist is a PHP library for parsing strings, it can extract and manipulate
 *  prefixed words in content ideal for working with @mentions, #topics and
 *  even custom action tags!
 *
 * @author Bobby Allen <ballen@bobbyallen.me>
 * @license http://www.gnu.org/licenses/gpl-3.0.html
 * @link https://github.com/allebb/linguist
 * @link http://www.bobbyallen.me
 *
 */
abstract class Transformer
{

    const URL_REGEX = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

    /**
     * Strips HTML tags from the given string.
     * @param string $message The string that does/may contain HTML tags.
     * @return string
     */
    protected function stripHtml($message)
    {
        return strip_tags($message);
    }

    /**
     * Retrieves the formatted text.
     * @return string
     */
    public function get()
    {
        return $this->formatted;
    }

    /**
     * Default __toString() method to return the formatted text.
     * @return string
     */
    public function __toString()
    {
        return $this->get();
    }
}
