<?php namespace Ballen\Linguist;

use Ballen\Linguist\Configuration as LinguistConfig;
use Ballen\Linguist\Transformers\PlaintextTransformer;
use Ballen\Linguist\Transformers\HtmlTransformer;
use Ballen\Linguist\Transformers\MarkdownTansformer;

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
class Parser
{

    /**
     * The HTML link format.
     */
    const HTML_HREF_FORMAT = "<a href=\"%s\">%s</a>";

    /**
     * The Markdown link format.
     */
    const MD_HREF_FORMAT = "[%s](%5)"; // Name of link, URL

    /**
     * The original message text.
     * @var string
     */

    protected $message = '';

    /**
     * Tag name and character prefix.
     * @var array
     */
    private $tags = [];

    /**
     * Class constructor
     * @param string $string The string to parse.
     * @param \Ballen\Linguist\Entities\Configuration $configuration Optional custom tag/url configuration
     * @throws InvalidArgumentException
     */
    public function __construct($string, $configuration = null)
    {
        if (!is_null($configuration)) {
            $this->loadConfiguration((new Configuration())->loadDefault());
        }
        if (!isset($string)) {
            throw new \InvalidArgumentException('The input string is required.');
        }
        $this->message = $string;
    }

    /**
     * Sets a custom tag/url configuration.
     * @param \Ballen\Linguist\Entities\Configuration $configuration
     * @return void
     */
    public function setConfiguration(LinguistConfig $configuration)
    {
        $this->tags = $configuration->get();
    }

    /**
     * Returns a Tag entities class.
     * @return array
     */
    public function tags()
    {
        return $this->gatherTags();
    }

    /**
     * Return a specific array of tags.
     * @param string $name The tag name/type.
     * @return array
     * @throws InvalidArgumentException
     */
    public function tag($name = null)
    {
        if (!is_null($name)) {
            return $this->tags()[$name];
        }
        throw new \InvalidArgumentException('A tag type was not specified!');
    }

    /**
     * Generates HTML output by adding HTML links to the tags.
     * @return string
     */
    public function html()
    {
        // Convert the text to HTML code.
    }

    /**
     * Generate Markdown output by adding links to the tags.
     * @return string
     */
    public function md()
    {
        // Convert the text to Markdown code.
    }

    /**
     * Return the plan text version of the message removing all HTML formatting.
     * @return string
     */
    public function plain()
    {
        return new PlaintextTransformer($this->message);
    }

    /**
     * Finds, returns and categorises all tags found in the message.
     * @return array
     */
    private function gatherTags()
    {
        foreach (array_keys($this->tags) as $tagtype) {
            preg_match_all('/\s+' . $this->tags[$tagtype]['prefix'] . '(\w+)/', $this->plain($this->message), $matches);
            $tags[$tagtype] = $matches[1];
        }
        return $tags;
    }

    /**
     * Loads the configuration into the Parser object.
     * @param Configuration $configuration
     */
    private function loadConfiguration(LinguistConfig $configuration)
    {
        $this->tags = $configuration->get();
    }

    /**
     * Magic method calls to enable users to call $this->mentions etc.
     * @param string $name
     * @param string $arguments
     * @return array
     * @throws RuntimeException
     */
    public function __call($name, $arguments)
    {
        $tags = array_keys($this->tags);
        if (!in_array($name, $tags)) {
            throw new RuntimeException('Invalid tag type(s) requested.');
        }
        return $this->tag($name);
    }
}
