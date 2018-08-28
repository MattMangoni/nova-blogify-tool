# Nova Blogify Tool

[![Latest Stable Version](https://poser.pugx.org/mattmangoni/nova-blogify-tool/v/stable)](https://packagist.org/packages/mattmangoni/nova-blogify-tool) 
[![Total Downloads](https://poser.pugx.org/mattmangoni/nova-blogify-tool/downloads)](https://packagist.org/packages/mattmangoni/nova-blogify-tool) 
[![StyleCI](https://github.styleci.io/repos/146213757/shield?branch=master)](https://github.styleci.io/repos/146213757)

## Description

This tool will create a simple blogging system inside Laravel Nova in just one click.
It currently features Category and Post resources, complete with a migration and rollback tool.

In the future I plan to add `tags` and other custom fields as well.

#### Our Next Steps

* Make the entire content configurable
* Enhance post resource and migration
* Add tag system


 ## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require mattmangoni/nova-blogify-tool
```

Next, you must register the card with Nova. This is typically done in the `tools` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvder.php

// ...
public function tools()
{
    return [
        // ...

        new \Mattmangoni\NovaBlogifyTool\NovaBlogifyTool()
}
```

## How to use the blog content in your applications

```php

use Mattmangoni\NovaBlogifyTool\Models\Post;
use Mattmangoni\NovaBlogifyTool\Models\Category;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    return Post::all();
});

Route::get('/posts', function () {
    return Category::all();
});
```
