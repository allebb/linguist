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
class ParserTest extends \PHPUnit_Framework_TestCase
{

    const EXAMPLE_TWEET_1 = "Hey @bobsta63, this example is for parsing plain-text tweet strings into HTML right? #questions #howto";

    public function testTwitterExampleToHtml()
    {
        $instance = new TagParser(self::EXAMPLE_TWEET_1, (new TagConfiguration)->loadDefault());
        $this->assertEquals('Hey <a href = "https://twitter.com/bobsta63" target="_blank">@bobsta63</a>, this example is for parsing plain-text tweet strings into HTML right? <a href = "https://twitter.com/hashtag/questions" target="_blank">#questions</a> <a href = "https://twitter.com/hashtag/howto" target="_blank">#howto</a>', $instance->html()->get());
    }

    public function testTwitterExampleToMarkdown()
    {
        $instance = new TagParser(self::EXAMPLE_TWEET_1, (new TagConfiguration)->loadDefault());
        $this->assertEquals('Hey [https://twitter.com/bobsta63](@bobsta63), this example is for parsing plain-text tweet strings into HTML right? [https://twitter.com/hashtag/questions](#questions) [https://twitter.com/hashtag/howto](#howto)', $instance->markdown()->get());
    }

    public function testTwitterExampleGetMentions()
    {
        $instance = new TagParser(self::EXAMPLE_TWEET_1, (new TagConfiguration)->loadDefault());
        $this->assertEquals(1, count($instance->tags()['mentions']));
        $this->assertTrue(($instance->tags()['mentions'][0] == 'bobsta63'));
        $this->assertFalse(isset($instance->tags()['mentions'][1]));
    }

    public function testTwitterExampleGetTopics()
    {
        $instance = new TagParser(self::EXAMPLE_TWEET_1, (new TagConfiguration)->loadDefault());
        $this->assertEquals(2, count($instance->tags()['topics']));
        $this->assertTrue(($instance->tags('topics')[0] == 'questions'));
        $this->assertTrue(($instance->tags('topics')[1] == 'howto'));
        $this->assertFalse(isset($instance->tags()['topics'][2]));
    }

    public function testGetTopicConfigurationArray()
    {
        $instance = new TagParser(self::EXAMPLE_TWEET_1, (new TagConfiguration)->loadDefault());
        $this->assertEquals('#', $instance->tag('topics')['prefix']);
        $this->assertEquals('https://twitter.com/hashtag/%s', $instance->tag('topics')['url']);
        $this->assertTrue($instance->tag('topics')['target']);
        $this->assertNull($instance->tag('topics')['class']);
    }

    public function testGetInvalidTagArray()
    {
        $instance = new TagParser(self::EXAMPLE_TWEET_1, (new TagConfiguration)->loadDefault());
        $this->setExpectedException('\InvalidArgumentException', 'The tag "locations" is not registered!');
        $instance->tags('locations');
    }
}
