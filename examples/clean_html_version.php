<?php
require '../vendor/autoload.php';
use Ballen\Linguist\Parser as TagParser;
use Ballen\Linguist\Configuration as TagConfiguration;

$example_string = "Hey <a href=\"https://twitter.com/bobsta63\">@bobsta63</a>, I just wanted to say <a href=\"https://twitter.com/freebsd\">@freebsd</a>.... that this #example is pretty simple using <a href=\"https://twitter.com/php\">@php</a>. <a href=\"https://twitter.com/hashtag/demo?src=hash\">#demo</a> <a href=\"https://twitter.com/hashtag/testing?src=hash\">#testing</a> <a href=\"https://twitter.com/hashtag/example?src=hash\">#example</a>. Check this out ya'll http://bbc.in/123dd and secure links like https://myftphost.co.uk/example/";

$plain_text_example = new TagParser($example_string);

echo "<p>The original (HTML) input string that we are using for this example is:</p>";
echo "<p><pre>{$example_string}</pre></p>";

echo "<p>Using the <em>->plain();</em> method, we can clean up all the HTML tags and get the plaintext only version:</p>";
echo "<p><pre>{$plain_text_example->plain()}</pre></p>";

echo "<p>We can then parse it back into HTML if we like too...</p>";
echo "<p><pre>{$plain_text_example->html()}</pre></p>";

echo "<p>Want to output the string to Markdown instead? No problem, hit it like so...</p>";
echo "<p><pre>{$plain_text_example->markdown()}</pre></p>";