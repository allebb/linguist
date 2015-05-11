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
class MarkdownTansformer extends Transformer implements TransformerInterface
{

    use TransformerInitTrait;

    /**
     * Transforms the message string.
     * @param string $string
     * @return void
     */
    private function transform($string)
    {

        $string = preg_replace("/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/", "[$0]($0) ", $string);

        foreach (array_keys($this->tags) as $tagtype) {
            $tagconf = $this->tags[$tagtype];
            $string = preg_replace_callback('/\s+' . $this->tags[$tagtype]['prefix'] . '(\w+)/', function($matches) use ($tagconf) {
                return ' ' . trim($this->buildMarkdownLink($matches[1], trim($matches[0]), $tagconf));
            }, $string);
        }
        $this->formatted = $string;
    }

    /**
     * Builds the Mardown link replacement for the Markdown transformation.
     * @param string $link The URL
     * @param string $text The name of the link
     * @param array $tag
     * @return string
     */
    private function buildMarkdownLink($link, $text, $tag)
    {
        if (!is_null($link)) {
            $link = sprintf($tag['url'], $link);
            return "[{$link}]({$text})";
        }
        return $text;
    }
}
