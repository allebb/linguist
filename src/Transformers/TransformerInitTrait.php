<?php namespace Ballen\Linguist\Transformers;

trait TransformerInitTrait
{

    /**
     * Runtime storage for the formatted text string.
     * @var string
     */
    protected $formatted = '';

    /**
     * Class constructor
     * @param string $string The string of which to be converted/transformed.
     */
    public function __construct($string)
    {
        $this->transform($string);
    }
}
