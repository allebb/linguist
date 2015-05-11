<?php
require '../vendor/autoload.php';
use Ballen\Linguist\Parser as TagParser;
use Ballen\Linguist\Configuration as TagConfiguration;

$example_string = "Hey @bobsta63, I just wanted to say @freebsd.... that this #example is pretty simple using @php. #demo #testing #example, we'll set the priority level like !2 and assign:ballen.";

$tags = new TagParser($example_string);

/**
 * Lets set a custom set of tags.
 */
$custom_tags = new TagConfiguration;
$custom_tags->push('assignments', 'assign:', 'http://mysite.com/agent/%s');
$custom_tags->push('priority', '!', null);
$custom_tags->push('mentions', '@', 'http://mysite.com/agent/%s');
$custom_tags->push('topics', '#', 'http://myself.com/search?topic=%s');
$tags->setConfiguration($custom_tags);

// Dump ALL tags that we identified...
var_dump($tags->tags());


// Alternatively we can access specific tag types like so using the PHP magic method __call():
//var_dump($tags->mentions());
//var_dump($tags->topics());
//var_dump($tags->assignments());
//var_dump($tags->priority());