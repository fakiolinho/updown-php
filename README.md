# updown-php

A PHP wrapper for the [updown.io](https://updown.io/) API.

You need your API_KEY from your account's settings page to use this. Visit updown.io [API documentation](https://updown.io/api) to see all settings you can use.

# Requirements

- PHP 5.4.0 or newer

# Installation

The best way to install this package is through composer by running:

```bash
composer require fakiolinho/updown-php:~1.0
```

You could also add it in your project's `composer.json` file:

```json
"require": {
	"fakiolinho/updown-php": "~1.0"
}
```

Then run:

```bash
composer update
```

# Usage

All examples use the Composer autoloader.

### List all your checks

```php
<?php
require 'vendor/autoload.php';

use Foinikas\Updown\Updown;

$updown = new Updown(API_KEY);

$response = $updown->checks();
```

### Show a single project's checks

```php
<?php
require 'vendor/autoload.php';

use Foinikas\Updown\Updown;

$updown = new Updown(API_KEY);

$response = $updown->check(TOKEN);
```

### Get all the downtimes of a check (paginated, 100 per call)

```php
<?php
require 'vendor/autoload.php';

use Foinikas\Updown\Updown;

$updown = new Updown(API_KEY);

$response = $updown->downtimes(TOKEN);
$response = $updown->downtimes(TOKEN, ['page' => 2]);
```

### Get detailed metrics about the check

```php
<?php
require 'vendor/autoload.php';

use Foinikas\Updown\Updown;

$updown = new Updown(API_KEY);

$response = $updown->metrics(TOKEN);
$response = $updown->metrics(TOKEN, ['group' => 'host']);
```