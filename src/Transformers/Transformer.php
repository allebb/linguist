<?php namespace Ballen\Linguist\Transformers;

abstract class Transformer
{

    /**
     * Validate that the transformer input is a string.
     * @param string $string
     * @throws \InvalidArgumentException
     */
    protected function validateInput($string)
    {
        if (!is_string($string)) {
            throw new \InvalidArgumentException('The input must be of type string!');
        }
    }

    /**
     * Strips HTML tags from the given string.
     * @param string $string The string that does/may contain HTML tags.
     * @return string
     */
    private function stripHtml($message)
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
