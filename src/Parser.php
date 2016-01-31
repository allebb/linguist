<?php

namespace Ballen\Linguist;

use Ballen\Linguist\Configuration;
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
 * @license http://www.gnu.org/licenses/gpl-3.0.html
 * @link https://github.com/bobsta63/linguist
 * @link http://www.bobbyallen.me
 *
 */
class Parser
{

    /**
     * Runtime configuration object storeage.
     * @var \Ballen\Linguist\Entities\Configuration
     */
    private $configuration;

    /**
     * The original message text.
     * @var string
     */
    protected $message = '';

    /**
     * Class constructor
     * @param string $string The string to parse.
     * @param \Ballen\Linguist\Configuration $configuration Optional custom tag/url configuration
     * @throws InvalidArgumentException
     */
    public function __construct($string, $configuration = null)
    {
        if (is_null($configuration)) {
            $configuration = new Configuration;
            $configuration->loadDefault();
        }
        $this->loadConfiguration($configuration);
        $this->message = $string;
    }

    /**
     * Sets a custom tag/url configuration.
     * @param \Ballen\Linguist\Configuration $configuration
     * @return void
     */
    public function setConfiguration(Configuration $configuration)
    {
        $this->loadConfiguration($configuration);
    }

    /**
     * Return all or a single array of a certain type of tag
     * @param string $type The tag name to return
     * @return tarray
     * @throws InvalidArgumentException
     */
    public function tags($type = null)
    {
        if (!$type) {
            return $this->gatherTags();
        }
        if (isset($this->gatherTags()[$type])) {
            return $this->gatherTags()[$type];
        }
        throw new \InvalidArgumentException(sprintf('The tag "%s" is not registered!', $type));
    }

    /**
     * Return the configuration for a specific tag.
     * @param string $name The tag name/type.
     * @return array
     * @throws InvalidArgumentException
     */
    public function tag($name = null)
    {
        if (!is_null($name) && isset($this->configuration->get()[$name])) {
            return $this->configuration->get()[$name];
        }
        throw new \InvalidArgumentException('A tag type was not specified!');
    }

    /**
     * Generates HTML output by adding HTML links to the tags.
     * @return HtmlTransformer
     */
    public function html()
    {
        return new HtmlTransformer($this->plain($this->message), $this->configuration);
    }

    /**
     * Generate Markdown output by adding links to the tags.
     * @return MarkdownTansformer
     */
    public function markdown()
    {
        return new MarkdownTansformer($this->plain($this->message), $this->configuration);
    }

    /**
     * Return the plan text version of the message removing all HTML formatting.
     * @return PlaintextTransformer
     */
    public function plain()
    {
        return new PlaintextTransformer($this->message, $this->configuration);
    }

    /**
     * Finds, returns and categorises all tags found in the message.
     * @return array
     */
    private function gatherTags()
    {
        $tag_configuration = $this->configuration->get();
        foreach (array_keys($tag_configuration) as $tagtype) {
            preg_match_all('/\s+' . $tag_configuration[$tagtype]['prefix'] . '(\w+)/', $this->plain($this->message), $matches);
            $tags[$tagtype] = $matches[1];
        }
        return $tags;
    }

    /**
     * Loads the configuration into the Parser object.
     * @param Configuration $configuration
     */
    private function loadConfiguration(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Magic method calls to enable users to call $this->mentions etc.
     * @param string $name
     * @param array $arguments
     * @return array
     * @throws RuntimeException
     */
    public function __call($name, $arguments = [])
    {
        $tags = array_keys($this->tags);
        if (!in_array($name, $tags)) {
            throw new RuntimeException('Invalid tag type(s) requested.');
        }
        return $this->tag($name);
    }
}
