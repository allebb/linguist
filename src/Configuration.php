<?php namespace Ballen\Linguist;

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
class Configuration
{

    /**
     * Runtime  storage for instance configuration.
     * @var array
     */
    private $configuration = [];

    /**
     * A default configuration (based on Twitter)
     * @var array 
     */
    private $default_configuration = [
        'mentions' => [
            'prefix' => '@',
            'url' => 'https://twitter.com/%s'
        ],
        'topics' => [
            'prefix' => '#',
            'url' => 'https://twitter.com/hashtag/%s&src=hash'
        ],
    ];

    /**
     * Push a tag configuraiton on to the configuration.
     * @param string $name The name of the tag eg. 'mentions'
     * @param string $prefix The tag prefix that we will search on eg. '@'
     * @param string $url_pattern The URL pattern to use when outputting to HTML. (use %s as the dynamic placeholder)
     */
    public function push($name, $prefix, $url_pattern)
    {
        $this->configuration[$name] = [
            'prefix' => $prefix,
            'url' => $url_pattern,
        ];
    }

    /**
     * Remove a tag type from the configuration.
     * @param string $name The name of the tag type to remove eg. 'mentions'
     */
    public function drop($name)
    {
        if (key_exists($name, $this->configuration)) {
            unset($this->configuration[$name]);
        }
    }

    /**
     * Return the tags configuration.
     * @return array
     */
    public function get()
    {
        return $this->configuration;
    }

    /**
     * Load the 'default' configuration set (compatible with Twitter)
     * @return void
     */
    public function loadDefault()
    {
        $this->configuration = $this->default_configuration;
    }
}
