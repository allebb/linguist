<?php
require '../vendor/autoload.php';
use Ballen\Linguist\Parser as TagParser;
use Ballen\Linguist\Configuration as TagConfiguration;

$tweet = "Hey @bobsta63, this example is for parsing plain-text tweet strings into HTML right? #questions #howto";

$conversion = new TagParser($tweet);

echo "<p>The example Twitter string (in realworld scenario, this would probably pulled from the Twitter API or maybe you're aggregating and retreieving tweets from a backend database), you can retrieve these and then converted to HTML like so....</p>";
echo "This is a plain-text version example of the tweet that we have pulled from the API or database:";
echo "<p><pre>{$tweet}</pre></p>";

echo "Using the ->html() on the string will, by default will redender is for use with Twitter... ";
echo "<p><pre>{$conversion->html()}</pre></p>";
