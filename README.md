# openapi-php

[![Latest Version on Packagist][ico-version]][link-releases]
[![Software License][ico-license]](LICENSE)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-coverage]][link-coverage]
[![Quality Score][ico-scrutinizer]][link-scrutinizer]
[![Total Downloads][ico-downloads]][link-downloads]

Open API 3.0 builder and validation library for PHP that helps you write valid specs.

[PSR-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[PSR-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[PSR-4]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md


This project is compliant with [PSR-1], [PSR-2] and [PSR-4].
If you notice compliance oversights, please send a patch via pull request.

## Features

- Fully documented object-oriented representation of the 
[Open API 3.0+](https://github.com/OAI/OpenAPI-Specification/tree/master/versions) specification with helper methods
to write valid documents.
- Supports Illuminate (Laravel) [`Jsonable`](https://github.com/illuminate/contracts/blob/v5.4.0/Support/Jsonable.php) 
and [`Arrayable`](https://github.com/illuminate/contracts/blob/v5.4.0/Support/Arrayable.php).
- Generates an specification in plain PHP arrays, plain objects, JSON or YAML.
- Validates Open API documents against the Open API 3.0.x JSON Schema.


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

Basic example:

```php
<?php

use erasys\OpenApi\Spec\v3 as OASv3;

$doc = new OASv3\Document(
    new OASv3\Info('My API', '1.0.0', 'My API description'),
    [
        '/foo/bar' => new OASv3\PathItem(
            [
                'get' => new OASv3\Operation(
                    [
                        '200' => new OASv3\Response('Successful response.'),
                        'default' => new OASv3\Response('Default error response.'),
                    ]
                ),
            ]
        ),
    ]
);

$yaml = $doc->toYaml();
$json = $doc->toJson();
$arr  = $doc->toArray();
$obj  = $doc->toObject();

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
[ico-coverage]: https://img.shields.io/scrutinizer/coverage/g/erasys/openapi-php.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/g/erasys/openapi-php.svg?style=flat-square
[link-releases]: https://packagist.org/packages/erasys/openapi-php
[link-travis]: https://travis-ci.org/erasys/openapi-php
[link-downloads]: https://packagist.org/packages/erasys/openapi-php
[link-coverage]: https://scrutinizer-ci.com/g/erasys/openapi-php/code-structure
[link-scrutinizer]: https://scrutinizer-ci.com/g/erasys/openapi-php
