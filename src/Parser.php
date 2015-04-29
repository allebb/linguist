<?php namespace Ballen\Linguist;

use InvalidArgumentException;
use Ballen\Linguist\Entities\Tags;

class Parser
{

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
            'tag' => '@',
            'url' => 'http://twitter.com/%s'
        ],
        'topics' => [
            'tag' => '#',
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
     * Returns a Tag entities class.
     * @return \Ballen\Linguist\Entities\Tags
     */
    public function tags()
    {
        return new Tags($this->tags);
    }

    public function html()
    {
        
    }

    /**
     * 
     * @return type
     */
    public function __toString()
    {
        return $this->message;
    }

    public function __call($name, $arguments)
    {
        var_dump(['name' => $name, 'argument' => $arguments]);
    }
}
