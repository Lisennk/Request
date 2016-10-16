# :alien: Request
[![Latest Stable Version](https://poser.pugx.org/lisennk/request/v/stable)](https://packagist.org/packages/lisennk/request)
[![License](https://poser.pugx.org/lisennk/laravel-slack-events-api/license)](https://packagist.org/packages/lisennk/request)
[![Build Status](https://travis-ci.org/Lisennk/Slack-Events.svg?branch=1.0.0)](https://travis-ci.org/Lisennk/Request)

*One Request Class To Rule Them All.*

**Lisennk\Request** allow to get data both from HTTP requests (e.g. `$_POST`, `$_GET`) and CLI without changing code. For exmaple, you have a script `love.php`. You can open it in your browser (e.g. `http://localhost/love.php?name=Alice`) or run via console (`php love.php --name="Alice"`) — with **Lisennk\Request** you can read passed data, both `?name=Alice` and `--name="Alice"` in the same way, just like this:
```php
echo Request::input('name'); // outputs "Alice"
```
## :new_moon_with_face: Possibilities and usage
Following the example above, we can also:
```php
<?php

use Lisennk\Request;

$request = Request::instance();
echo $request->input('name'); // outputs "Alice"
```
Or you can do it like this:
```php
echo $request->name; // outputs "Alice"
```
You can use all methods like in Laravel Facades, via static call:
```php
echo Request::input('name'); // outputs "Alice"
```
You can use placeholder (i.e. default value) that will be returned if input doesnt exist:
```php
echo Request::input('name', 'Unknown Name'); // outputs "Unknown Name" if "name" doesnt passed
echo $request->input('name', 'Unknown Name'); // the same same, outputs "Unknown Name" if "name" doesnt passed
```
You can use `has` method to check if value exist:
```php
if (Request::has('name')) echo 'Name passed!'; // outputs "Name passed!" if there is value with "name" key
```
You can use second parameter of "has" method to check if value exist and that its equal to needed
```php
if ($request->has('name', 'Alice')) echo 'The name is Alice!'; // outputs "the name is Alice"
if (Request::has('name', 'Bob')) echo 'Bob is here!'; // we know that name is "Alice", not "Bob", so here we will not get any output
```
You can use `notEmpty` method to check if there is any data passed to the script
```php
if ($request->notEmpty()) echo 'There is something to work with!';
```
## :squirrel: Installation
You can install it with Composer:
```bash
composer require lisennk/request
```

## :last_quarter_moon_with_face: Contributions 

Feel free to create issues and pull requests. Please, star repository, if you like it. 
