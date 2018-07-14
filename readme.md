# Infakt API Client

|        Style-CI         |        Travis CI         |         Coverage        |        Downloads        |         Release         |
|:-----------------------:|:-----------------------:|:-----------------------:|:-----------------------:|:-----------------------:|
| [![StyleCI](https://styleci.io/repos/114299937/shield?branch=master)](https://styleci.io/repos/114299937) | [![Travis CI](https://travis-ci.org/miisieq/InfaktClient.svg?branch=master)](https://travis-ci.org/miisieq/InfaktClient) | [![Coverage Status](https://coveralls.io/repos/github/miisieq/InfaktClient/badge.svg?branch=master)](https://coveralls.io/github/miisieq/InfaktClient?branch=master) | [![Total Downloads](https://poser.pugx.org/miisieq/infakt-client/downloads?format=flat-square)](https://packagist.org/packages/miisieq/infakt-client) | [![Latest Stable Version](https://poser.pugx.org/miisieq/infakt-client/v/stable?format=flat-square)](https://packagist.org/packages/miisieq/infakt-client) |

InfaktClient is a PHP library for the third version of [Infakt REST API](https://www.infakt.pl/developers/) that makes it easy to perform CRUD (create, read, update and delete) operations on invoices, clients and products.

## Quick start

### Step 1: Install the package

Install [Composer](https://getcomposer.org/download/) and run the following command to get the latest version:

```
composer require miisieq/infakt-client
```

### Step 2: Create an instance of the client

```php
$infakt = new \Infakt\Infakt(
    '7e2356a0a400d6ec3d2ced911991f3e8',
    new \GuzzleHttp\Client()
);
```

## Resources reference

### Clients
#### Get all
```php
$clients = $infakt->getRepository(\Infakt\Model\Client::class)->getAll();
```
#### Get by ID
```php
$client = $infakt->getRepository(\Infakt\Model\Client::class)->get(2887744);
```
See more: [Infakt API Documentation](https://www.infakt.pl/developers/clients.html#def)

### Bank Accounts
#### Get all
```php
$bankAccounts = $infakt->getRepository(\Infakt\Model\BankAccount::class)->getAll();
```
#### Get by ID
```php
$bankAccount = $infakt->getRepository(\Infakt\Model\BankAccount::class)->get(4786512);
```
See more: [Infakt API Documentation](https://www.infakt.pl/developers/bank_accounts.html#def)

### VAT Rate
#### Get all

```php
$infakt->getRepository(\Infakt\Model\VatRate::class)->getAll()
```

See more: [Infakt API Documentation](https://www.infakt.pl/developers/vat_rates.html)

## Contributing
### Running tests ([phpunit/phpunit](https://github.com/sebastianbergmann/phpunit))

```bash
$ composer tests
```

### Running code style fixer ([friendsofphp/php-cs-fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer))
```bash
$ composer phpcs
```

## License
This package is released under the MIT license. See the included
[LICENSE](LICENSE) file for more information.
