Stow
====

A plug-in for [Craft CMS](http://buildwithcraft.com/).

With Stow you can cache parts of your webpage for later retrieval. This allows your server to do less processing and your visitors to see your content faster. Everyone is happier with Stow :)

    {% cache {global: false, id: 'home-page'} %}
        {% for entry in craft.entries.find() %}
            {{ entry.title }}
        {% endfor %}
    {% endcache %}

Currently Stow can take up to 2 parameters: **global** and **id**. **id** is required.

Parameter                | Type    | Default     | Description
:----------------------- | :------ | :---------- | :------------------------------------------------------
`global`                 | boolean  | true | If set to true the cache will be globally accessible, if set to false the cache will be dependent on the URL.
`id`                     | string | NULL        | Cached items are tied to their ID. If the ID is not found in the database then a new cache is created.

Setup
====

Upload all files to a folder named 'stow' in the plugin directory and then activate from your control panel. No further set-up required.
