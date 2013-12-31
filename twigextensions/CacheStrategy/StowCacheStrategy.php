<?php

namespace Craft;

class StowCacheStrategy
{

    protected $id = "";
    protected $url = "";

    public function generateKey($opts)
    {
        $key = "";

        /*
        if (!isset($opts['entry']) && !isset($opts['entries']) && !isset($opts['section']) && !isset($opts['user']) && !isset($opts['id']))
        {
            throw new Exception(Craft::t("Must specify at least one of the following parameters: entry, entries, section, user, or id!"));
        }

        if (isset($opts['entry']))
        {
            if (!is_object($opts['entry']) || get_class($opts['entry']) != "Craft\EntryModel")
            {
                throw new Exception(Craft::t("The supplied entry is invalid, must be an EntryModel."));
            }

            $key .= $this->hashObject($opts['entry'], "EntryModel");
        }

        if (isset($opts['entries'])) 
        {
            if (!is_array($opts['entries']))
            {
                throw new Exception(Craft::t("Expecting entries to be an array of EntryModel objects, given: " . get_class($opts['entries'])));
            }

            foreach($opts['entries'] as $entry)
            {
                if (!is_object($entry) || get_class($entry) != "Craft\EntryModel")
                {
                    throw new Exception(Craft::t("Elements of the array passed to entries must be EntryModel objects."));
                }

                $key .= $this->hashObject($entry, "EntryModel");
            }
        }

        if (isset($opts['user']))
        {
            if (!is_object($opts['user']) || get_class($opts['user']) != "Craft\UserModel")
            {
                throw new Exception(Craft::t("The supplied user is invalid, must be a UserModel."));
            }

            $key .= $this->hashObject($opts['user'], "UserModel");
        }*/

        if (isset($opts['id']))
        {
            $this->id = $opts['id'];
            $key .= "{$opts['id']}";       
        }
        else 
        {
            throw new Exception("You must supply an ID!");
        }

        if (isset($opts['global']) && !$opts['global'])
        {
            $key .= "{$_SERVER['REQUEST_URI']}";
            $this->url = $_SERVER['REQUEST_URI'];
        }
        return sha1($key);
    }

    public function hashObject($obj, $type = "")
    {
        $id = $obj->id;
        $updated = strtotime($obj->dateUpdated);
        return $id . $updated . $type;
    }

    public function saveBlock($hash, $body)
    {
        craft()->stow->saveCache(
            array(
                'key'           => $this->id,
                'hash'          => $hash,
                'cachedContent' => $body,
                'url'           => $this->url
            )
        );
    }

    public function fetchBlock($key)
    {
        return craft()->stow->fetchCache($key);
    }
}