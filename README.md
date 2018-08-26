# Nova Blogify Tool

[![Latest Stable Version](https://poser.pugx.org/mattmangoni/nova-blogify-tool/v/stable)](https://packagist.org/packages/mattmangoni/nova-blogify-tool) [![Total Downloads](https://poser.pugx.org/mattmangoni/nova-blogify-tool/downloads)](https://packagist.org/packages/mattmangoni/nova-blogify-tool)

## Description

This tool will create a simple blogging system inside Laravel Nova in just one click.
It currently features Category and Post resources, complete with a migration and rollback tool.

In the future I plan to add `tags` and other custom fields as well.

 ## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require mattmangoni/nova-blogify-tool
```

Next, you must register the card with Nova. This is typically done in the `tools` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvder.php

// ...
public function cards()
{
    return [
        // ...

        new \Mattmangoni\NovaBlogifyTool\NovaBlogifyTool()
}
```
