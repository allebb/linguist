<?php
use \PHPUnit_Framework_TestCase;
use Ballen\Linguist\Configuration;

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
class ConfigurationTest extends PHPUnit_Framework_TestCase
{

    /**
     * Tests creating a new instance of the configuration class and pushing the
     * default 'Twitter' compatible  configuration.
     */
    public function testLoadDefaultConfiguaration()
    {
        $instance = new Configuration();
        $instance->loadDefault();
        $this->assertArrayHasKey('mentions', $instance->get()); // Check that default 'mentions' are added...
        $this->assertArrayHasKey('topics', $instance->get()); // Check that default 'topics' are added...
    }

    /**
     * Tests creating a new instance and adding a new 'assignment' configuration
     * and then test removing the configuration item.
     */
    public function testCustomTagConfiguaration()
    {
        $instance = new Configuration();
        $instance->push('assignment', 'assign>', 'https://exampleapp.com/assign/%s');
        $this->assertArrayHasKey('assignment', $instance->get()); // Check that custom assignment section has been added...
        $instance->drop('assignment');
        $this->assertArrayNotHasKey('assignment', $instance->get()); // Check that the custom config has been removed successfully.
    }

    /**
     * Tests creating a new empty configuration and ensures that the optional
     * default values are not set.
     */
    public function testNoConfiguaration()
    {
        $instance = new Configuration();

        $this->assertArrayNotHasKey('mentions', $instance->get()); // Check that default 'mentions' are added...
        $this->assertArrayNotHasKey('topics', $instance->get()); // Check that default 'topics' are added...
    }
}
