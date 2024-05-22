# Laravel ZeroBounce

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sarfrazrizwan/laravel-zerobounce.svg?style=flat-square)](https://packagist.org/packages/sarfrazrizwan/laravel-zerobounce)
[![Total Downloads](https://img.shields.io/packagist/dt/sarfrazrizwan/laravel-zerobounce.svg?style=flat-square)](https://packagist.org/packages/sarfrazrizwan/laravel-zerobounce)
[![Build Status](https://img.shields.io/travis/sarfrazrizwan/laravel-zerobounce/master.svg?style=flat-square)](https://travis-ci.org/sarfrazrizwan/laravel-zerobounce)
[![Quality Score](https://img.shields.io/scrutinizer/g/sarfrazrizwan/laravel-zerobounce.svg?style=flat-square)](https://scrutinizer-ci.com/g/sarfrazrizwan/laravel-zerobounce)

## Introduction

The `sarfrazrizwan/laravel-zerobounce` package provides an easy way to integrate the ZeroBounce email validation service into your Laravel applications. This package utilizes the official [ZeroBounce PHP SDK](https://github.com/zerobounce/zero-bounce-php-sdk-setup) to ensure reliable and efficient email validation.

## Features

- Easy integration with ZeroBounce email validation API.
- Seamless configuration through Laravel environment settings.
- Comprehensive validation results for your email addresses.
- Supports Laravel 9 and later versions.

## Installation

You can install the package via Composer:

```bash
composer require sarfrazrizwan/laravel-zerobounce
```

##  Configuration

To use this package, you need to set your ZeroBounce API key in your .env file:

```bash
ZEROBOUNCE_API_KEY=your_api_key_here

```

##  Usage

Here's an example of how to use the ZeroBounce email validation in your Laravel application:

```bash
use Sarfrazrizwan\ZeroBounce\Facades\ZeroBounce;

$email = 'example@example.com';
$response = ZeroBounce::validate($email);

if ($response->status === 'valid') {
    echo "The email address is valid.";
} else {
    echo "The email address is invalid.";
}


```
### Validation Rule

The package also includes a custom validation rule real_email that you can use in your Laravel validation logic:

```bash

$request->validate([
    'email' => 'required|real_email',
]);

```
##  API Reference

For detailed information about the available methods and their usage, please refer to the ZeroBounce PHP SDK documentation.

##  Contributing

Contributions are welcome! Please submit a pull request or create an issue to contribute to this package.

##  Conclusion

The `sarfrazrizwan/laravel-zerobounce` package simplifies the integration of ZeroBounce email validation into your Laravel applications, ensuring that you can easily validate email addresses with minimal configuration. Get started today to enhance your email data quality!