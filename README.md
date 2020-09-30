# Laravel CKEditor4

[![Latest Version on Packagist](https://img.shields.io/packagist/v/juliomotol/laravel-ckeditor4.svg?style=flat-square)](https://packagist.org/packages/juliomotol/laravel-ckeditor4)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/juliomotol/laravel-ckeditor4/run-tests?label=tests)](https://github.com/juliomotol/laravel-ckeditor4/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/juliomotol/laravel-ckeditor4.svg?style=flat-square)](https://packagist.org/packages/juliomotol/laravel-ckeditor4)

CKEditor4 Publisher for Laravel >= 5.5.

## Installation

You can install the package via composer:

```bash
composer require juliomotol/laravel-ckeditor4
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="JulioMotol\CKEditor\CKEdtor4ServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

``` php
$skeleton = new JulioMotol\CKEditor();
echo $skeleton->echoPhrase('Hello, Spatie!');
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Julio Motol](https://github.com/juliomotol)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Package Skeleton Laravel

This package as generated using [Spatie's Package Skeleton Laravel Template](https://github.com/spatie/package-skeleton-laravel)
