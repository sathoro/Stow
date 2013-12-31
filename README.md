Stow
====

With Stow you can cache parts of your webpage for later retrieval. This allows your server to do less processing and your visitors to see your content faster. Everyone is happier with Stow :)

Currently Stow can take up to 2 parameters: global and id. You must provide at least an id.

*Global* - optional

- Type: boolean (true or false)
- Default: true
- Description: If set to true the cache will be globally accessible, if set to false the cache will be dependent on the URL.

*ID* - required

- Type: string
- Description: Cached items are tied to their ID. If the ID is not found in the database then a new cache is created.

Example of caching all your entries:

    {% cache {global: true, id: 'all the entries'} %}
        {% for entry in craft.entries.find() %}
            {{ entry.title }}
        {% endfor %}
    {% endcache %}

Setup
====

Upload all files to a folder named 'stow' in the plugin directory and then activate from your control panel. No further set-up required.
