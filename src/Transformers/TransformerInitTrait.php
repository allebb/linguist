<?php namespace Ballen\Linguist\Transformers;

/**
 * Linguist
 *
 * Linguist is a PHP library for parsing strings, it can extract and manipulate
 *  prefixed words in content ideal for working with @mentions, #topics and
 *  even custom action tags!
 *
 * @author Bobby Allen <ballen@bobbyallen.me>
 * @version 1.0.0
 * @license http://www.gnu.org/licenses/gpl-3.0.html
 * @link https://github.com/bobsta63/linguist
 * @link http://www.bobbyallen.me
 *
 */
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
