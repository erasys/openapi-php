# openapi-php

[![Latest Version on Packagist][ico-version]][link-releases]
[![Software License][ico-license]](LICENSE)
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]

Open API 3.0 spec generator for PHP.

[PSR-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[PSR-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[PSR-4]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md


This project is compliant with [PSR-1], [PSR-2] and [PSR-4].
If you notice compliance oversights, please send a patch via pull request.

## Features

- Object-oriented representation of the 
[Open API 3.0+](https://github.com/OAI/OpenAPI-Specification/tree/master/versions) specification.
- Supports Illuminate (Laravel) [`Jsonable`](https://github.com/illuminate/contracts/blob/v5.4.0/Support/Jsonable.php) 
and [`Arrayable`](https://github.com/illuminate/contracts/blob/v5.4.0/Support/Arrayable.php).
- Generates an specification in plain PHP arrays, JSON or YAML.


## Install

Via Composer

``` bash
$ composer require erasys/openapi-php
```

Via Git

``` bash
$ git clone https://github.com/erasys/openapi-php.git
```

## Usage

```php
<?php

// TBD

```

## Testing

``` bash
$ composer test
```

or

``` bash
$ vendor/bin/phpunit
$ vendor/bin/phpcs
```

## Contributing

Please see [CONTRIBUTING](https://github.com/erasys/openapi-php/blob/master/CONTRIBUTING.md) for details.

## License

The MIT License (MIT).
Please see [License File](https://github.com/erasys/openapi-php/blob/master/LICENSE) for more information.


[ico-version]: https://img.shields.io/packagist/v/erasys/openapi-php.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/erasys/openapi-php/master.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/erasys/openapi-php.svg?style=flat-square

[link-releases]: https://packagist.org/packages/erasys/openapi-php
[link-travis]: https://travis-ci.org/erasys/openapi-php
[link-downloads]: https://packagist.org/packages/erasys/openapi-php
