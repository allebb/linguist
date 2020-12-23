<?php

namespace Ballen\Linguist\Transformers;

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
 * @license http://www.gnu.org/licenses/gpl-3.0.html
 * @link https://github.com/allebb/linguist
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

        $string = preg_replace(Transformer::URL_REGEX, "<a href=\"$0\">$0</a> ", $string);

        foreach (array_keys($this->tags) as $tagtype) {
            $tagconf = $this->tags[$tagtype];
            $string = preg_replace_callback('/\s+' . $this->tags[$tagtype]['prefix'] . '(\w+)/', function($matches) use ($tagconf) {
                return ' ' . trim($this->buildHtmlLink($matches[1], trim($matches[0]), $tagconf));
            }, $string);
        }

        $this->formatted = $string;
    }

    /**
     * Builds the HTML link replacement for the HTML transformation.
     * @param string $link The URL
     * @param string $text The name of the link
     * @param array $tag
     * @return string
     */
    private function buildHtmlLink($link, $text, $tag)
    {
        $url = sprintf($tag['url'], $link);
        $html_link = "<a href = \"{$url}\"";

        // Add the class tag if one is available.
        if (!is_null($tag['class'])) {
            $html_link .= " class=\"{$tag['class']}\"";
        }

        // Add the target="_blank" attribute if the user requires it!
        if ($tag['target']) {
            $html_link .= " target=\"_blank\"";
        }

        $html_link .= ">{$text}</a>";
        return $html_link;
    }
}
