<?php namespace Ballen\Linguist;

use InvalidArgumentException;
use Ballen\Linguist\Entities\Tags;

class Parser
{

    const HTML_HREF_FORMAT = "<a href=\"%s\">%s</a>";
    
    const MD_HREF_FORMAT = "[%s](%5)"; // Name of link, URL
    
    /**
     * The original message text.
     * @var string
     */
    protected $message = '';

    /**
     * Tag name and character prefix.
     * @var type 
     */
    private $tags = [
        'mentions' => [
            'prefix' => '@',
            'url' => 'http://twitter.com/%s'
        ],
        'topics' => [
            'prefix' => '#',
            'url' => 'https://twitter.com/search?q=%s&src=hash'
        ],
    ];

    public function __construct($string)
    {
        if (!isset($string)) {
            throw new InvalidArgumentException('The input string is required.');
        }
        $this->message = $string;
    }

    /**
     * Set the tag configuration.
     * @param \Ballen\Linguist\Entities\Configuration $configuration
     */
    public function setConfiguration(\Ballen\Linguist\Configuration $configuration)
    {
        $this->tags = $configuration->get();
    }

    /**
     * Returns a Tag entities class.
     * @return \Ballen\Linguist\Entities\Tags
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
        return strip_tags($this->message);
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
     * Magic method calls to enable users to call $this->mentions etc.
     * @param string $name
     * @param string $arguments
     * @return array
     * @throws \RuntimeException
     */
    public function __call($name, $arguments)
    {
        $tags = array_keys($this->tags);
        if (!in_array($name, $tags)) {
            throw new \RuntimeException('Invalid tag type(s) requested.');
        }
        return $this->tag($name);
    }
}
