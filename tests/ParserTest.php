<?php
use Ballen\Linguist\Parser as TagParser;
use Ballen\Linguist\Configuration as TagConfiguration;
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
use \PHPUnit_Framework_TestCase;

class ParserTest extends PHPUnit_Framework_TestCase
{

    const EXAMPLE_TWEET_1 = "Hey @bobsta63, this example is for parsing plain-text tweet strings into HTML right? #questions #howto";

    public function __construct()
    {
        
    }

    public function testExample()
    {
        return $this->assertTrue(true);
    }

    public function testExample2()
    {
        return $this->assertNotTrue(false);
    }
}
