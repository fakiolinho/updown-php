# updown-php

A PHP wrapper for the [updown.io](https://updown.io/) API.

# Installation

- Grab your API_KEY from your account's settings page
- Visit updown.io [API documentation](https://updown.io/api) to see all settings you can use

# Usage

### List all your checks

```php
$updown = new Updown(API_KEY);

$response = $updown->checks();
```

### Show a single project's checks

```php
$updown = new Updown(API_KEY);

$response = $updown->check(TOKEN);
```

### Get all the downtimes of a check (paginated, 100 per call)

```php
$updown = new Updown(API_KEY);

$response = $updown->downtimes(TOKEN);
$response = $updown->downtimes(TOKEN, ['page' => 2]);
```

### Get detailed metrics about the check

```php
$updown = new Updown(API_KEY);

$response = $updown->metrics(TOKEN);
$response = $updown->metrics(TOKEN, ['group' => 'host']);
```