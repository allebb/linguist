<?php namespace Ballen\Linguist\Entities;

class Tags
{

    /**
     * The array of extracted tags.
     * @var array
     */
    private $tags;

    public function __construct(array $tags)
    {
        $this->tags = $tags;
    }

    /**
     * Return the extracted tags as an array.
     * @return array
     */
    public function toArray()
    {
        return $this->tags;
    }

    /**
     * Return the extracted tags as a JSON object.
     * @return jsonObject
     */
    public function toJson()
    {
        return (object) $this->tags;
    }
}
