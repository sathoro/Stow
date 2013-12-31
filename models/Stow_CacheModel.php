<?php

namespace Craft;

class Stow_CacheModel extends BaseModel
{
    public function __toString()
    {
        return $this->name;
    }

    public function defineAttributes()
    {
        return array(
            'id'               => AttributeType::Number,
            'key'              => AttributeType::String,
            'hash'             => AttributeType::String,
            'cachedContent'    => AttributeType::String,
            'url'              => AttributeType::String
        );
    }
}