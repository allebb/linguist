<?php namespace Ballen\Linguist\Transformers;

use Ballen\Linguist\Transformers\TransformerInitTrait;
use Ballen\Linguist\Transformers\TransformerInterface;
use Ballen\Linguist\Transformers\Transformer;

class HtmlTransformer extends Transformer implements TransformerInterface
{

    use TransformerInitTrait;

    private function transform($string)
    {
        $this->formatted = strip_tags($string);
    }
}
