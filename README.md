# Legalesign SDK PHP API library

> [!NOTE]
> The Legalesign SDK PHP API Library is currently in **beta** and we're excited for you to experiment with it!
>
> This library has not yet been exhaustively tested in production environments and may be missing some features you'd expect in a stable release. As we continue development, there may be breaking changes that require updates to your code.
>
> **We'd love your feedback!** Please share any suggestions, bug reports, feature requests, or general thoughts by [filing an issue](https://www.github.com/legalesign/legalesign-rest-php/issues/new).

The Legalesign SDK PHP library provides convenient access to the Legalesign SDK REST API from any PHP 8.1.0+ application.

It is generated with [Stainless](https://www.stainless.com/).

## Documentation

The REST API documentation can be found on [legalesign.com](https://legalesign.com/contact/).

## Installation

To use this package, install via Composer by adding the following to your application's `composer.json`:

<!-- x-release-please-start-version -->

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "git@github.com:legalesign/legalesign-rest-php.git"
    }
  ],
  "require": {
    "org-placeholder/legalesign-sdk": "dev-main"
  }
}
```

<!-- x-release-please-end -->

## Usage

This library uses named parameters to specify optional arguments.
Parameters with a default value must be set by name.

```php
<?php

use LegalesignSDK\Client;

$client = new Client(apiKey: getenv("LEGALESIGN_SDK_API_KEY") ?: "My API Key");

$documents = $client->document->list(group: "REPLACE_ME");

var_dump($documents->meta);
```

### Value Objects

It is recommended to use the static `with` constructor `Dog::with(name: "Joey")`
and named parameters to initialize value objects.

However, builders are also provided `(new Dog)->withName("Joey")`.

### Handling errors

When the library is unable to connect to the API, or if the API returns a non-success status code (i.e., 4xx or 5xx response), a subclass of `LegalesignSDK\Core\Exceptions\APIException` will be thrown:

```php
<?php

use LegalesignSDK\Core\Exceptions\APIConnectionException;

try {
  $documents = $client->document->list(group: "REPLACE_ME");
} catch (APIConnectionException $e) {
  echo "The server could not be reached", PHP_EOL;
  var_dump($e->getPrevious());
} catch (RateLimitError $_) {
  echo "A 429 status code was received; we should back off a bit.", PHP_EOL;
} catch (APIStatusError $e) {
  echo "Another non-200-range status code was received", PHP_EOL;
  echo $e->getMessage();
}
```

Error codes are as follows:

| Cause            | Error Type                     |
| ---------------- | ------------------------------ |
| HTTP 400         | `BadRequestException`          |
| HTTP 401         | `AuthenticationException`      |
| HTTP 403         | `PermissionDeniedException`    |
| HTTP 404         | `NotFoundException`            |
| HTTP 409         | `ConflictException`            |
| HTTP 422         | `UnprocessableEntityException` |
| HTTP 429         | `RateLimitException`           |
| HTTP >= 500      | `InternalServerException`      |
| Other HTTP error | `APIStatusException`           |
| Timeout          | `APITimeoutException`          |
| Network error    | `APIConnectionException`       |

### Retries

Certain errors will be automatically retried 2 times by default, with a short exponential backoff.

Connection errors (for example, due to a network connectivity problem), 408 Request Timeout, 409 Conflict, 429 Rate Limit, >=500 Internal errors, and timeouts will all be retried by default.

You can use the `maxRetries` option to configure or disable this:

```php
<?php

use LegalesignSDK\Client;
use LegalesignSDK\RequestOptions;

// Configure the default for all requests:
$client = new Client(maxRetries: 0);

// Or, configure per-request:
$result = $client->document->list(
  group: "REPLACE_ME", requestOptions: RequestOptions::with(maxRetries: 5)
);
```

## Advanced concepts

### Making custom or undocumented requests

#### Undocumented properties

You can send undocumented parameters to any endpoint, and read undocumented response properties, like so:

Note: the `extra*` parameters of the same name overrides the documented parameters.

```php
<?php

use LegalesignSDK\RequestOptions;

$documents = $client->document->list(
  group: "REPLACE_ME",
  requestOptions: RequestOptions::with(
    extraQueryParams: ["my_query_parameter" => "value"],
    extraBodyParams: ["my_body_parameter" => "value"],
    extraHeaders: ["my-header" => "value"],
  ),
);

var_dump($documents["my_undocumented_property"]);
```

#### Undocumented request params

If you want to explicitly send an extra param, you can do so with the `extra_query`, `extra_body`, and `extra_headers` under the `request_options:` parameter when making a request, as seen in the examples above.

#### Undocumented endpoints

To make requests to undocumented endpoints while retaining the benefit of auth, retries, and so on, you can make requests using `client.request`, like so:

```php
<?php

$response = $client->request(
  method: "post",
  path: '/undocumented/endpoint',
  query: ['dog' => 'woof'],
  headers: ['useful-header' => 'interesting-value'],
  body: ['hello' => 'world']
);
```

## Versioning

This package follows [SemVer](https://semver.org/spec/v2.0.0.html) conventions. As the library is in initial development and has a major version of `0`, APIs may change at any time.

This package considers improvements to the (non-runtime) PHPDoc type definitions to be non-breaking changes.

## Requirements

PHP 8.1.0 or higher.

## Contributing

See [the contributing documentation](https://github.com/legalesign/legalesign-rest-php/tree/main/CONTRIBUTING.md).
