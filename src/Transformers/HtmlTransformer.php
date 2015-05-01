<?php namespace Ballen\Linguist\Transformers;

use Ballen\Linguist\Transformers\TransformerInitTrait;
use Ballen\Linguist\Transformers\TransformerInterface;
use Ballen\Linguist\Transformers\Transformer;

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
class HtmlTransformer extends Transformer implements TransformerInterface
{

    use TransformerInitTrait;

    /**
     * Transforms the message string.
     * @param string $string
     * @return void
     */
    private function transform($string)
    {
        $this->formatted = '';
    }
}
