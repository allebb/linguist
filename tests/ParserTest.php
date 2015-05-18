<?php
/**
 * Distical
 *
 * Distical is a simple distance calculator library for PHP 5.3+ which
 * amongst other things can calculate the distance between two or more lat/long
 * co-ordinates.
 *
 * @author Bobby Allen <ballen@bobbyallen.me>
 * @version 2.0.0
 * @license http://opensource.org/licenses/MIT
 * @link https://github.com/bobsta63/distical
 * @link http://www.bobbyallen.me
 *
 */
use Ballen\Linguist\Parser as TagParser;
use Ballen\Linguist\Configuration as TagConfiguration;
use \PHPUnit_Framework_TestCase;

class ParserTest extends PHPUnit_Framework_TestCase
{

    private $example_twitter = "Hey @bobsta63, this example is for parsing plain-text tweet strings into HTML right? #questions #howto";

    public function __construct()
    {
        
    }
    
    public function testExample(){
        return $this->assertTrue(true);
    }
    
    public function testExample2(){
        return $this->assertNotTrue(false);
    }
}
