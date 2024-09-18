
# Getting Started with Swagger Petstore - OpenAPI 3.0

## Introduction

This is a sample Pet Store Server based on the OpenAPI 3.0 specification.  You can find out more about
Swagger at [https://swagger.io](https://swagger.io). In the third iteration of the pet store, we've switched to the design first approach!
You can now help us improve the API whether it's by making changes to the definition itself or to the code.
That way, with time, we can improve the API in general, and expose some of the new features in OAS3.

_If you're looking for the Swagger 2.0/OAS 2.0 version of Petstore, then click [here](https://editor.swagger.io/?url=https://petstore.swagger.io/v2/swagger.yaml). Alternatively, you can load via the `Edit > Load Petstore OAS 2.0` menu option!_

Some useful links:

- [The Pet Store repository](https://github.com/swagger-api/swagger-petstore)
- [The source API definition for the Pet Store](https://github.com/swagger-api/swagger-petstore/blob/master/src/main/resources/openapi.yaml)

Find out more about Swagger: [http://swagger.io](http://swagger.io)

## Install the Package

Run the following command to install the package and automatically add the dependency to your composer.json file:

```php
composer require "testorg/petstore-test-sdk:1.1.2"
```

Or add it to the composer.json file manually as given below:

```php
"require": {
    "testorg/petstore-test-sdk": "1.1.2"
}
```

You can also view the package at:
https://packagist.org/packages/testorg/petstore-test-sdk#1.1.2

## Test the SDK

Unit tests in this SDK can be run using PHPUnit.

1. First install the dependencies using composer including the `require-dev` dependencies.
2. Run `vendor\bin\phpunit --verbose` from commandline to execute tests. If you have installed PHPUnit globally, run tests using `phpunit --verbose` instead.

You can change the PHPUnit test configuration in the `phpunit.xml` file.

## Initialize the API Client

**_Note:_** Documentation for the client can be found [here.](https://www.github.com/developer-sdksio/petstore-test-php/tree/1.1.2/doc/client.md)

The following parameters are configurable for the API Client:

| Parameter | Type | Description |
|  --- | --- | --- |
| `timeout` | `int` | Timeout for API calls in seconds.<br>*Default*: `0` |
| `enableRetries` | `bool` | Whether to enable retries and backoff feature.<br>*Default*: `false` |
| `numberOfRetries` | `int` | The number of retries to make.<br>*Default*: `0` |
| `retryInterval` | `float` | The retry time interval between the endpoint calls.<br>*Default*: `1` |
| `backOffFactor` | `float` | Exponential backoff factor to increase interval between retries.<br>*Default*: `2` |
| `maximumRetryWaitTime` | `int` | The maximum wait time in seconds for overall retrying requests.<br>*Default*: `0` |
| `retryOnTimeout` | `bool` | Whether to retry on request timeout.<br>*Default*: `true` |
| `httpStatusCodesToRetry` | `array` | Http status codes to retry against.<br>*Default*: `408, 413, 429, 500, 502, 503, 504, 521, 522, 524` |
| `httpMethodsToRetry` | `array` | Http methods to retry against.<br>*Default*: `'GET', 'PUT'` |
| `customHeaderAuthenticationCredentials` | [`CustomHeaderAuthenticationCredentials`](https://www.github.com/developer-sdksio/petstore-test-php/tree/1.1.2/doc/auth/custom-header-signature.md) | The Credentials Setter for Custom Header Signature |

The API client can be initialized as follows:

```php
$client = SwaggerPetstoreOpenAPI30ClientBuilder::init()
    ->customHeaderAuthenticationCredentials(
        CustomHeaderAuthenticationCredentialsBuilder::init(
            'api_key'
        )
    )
    ->build();
```

## Authorization

This API uses the following authentication schemes.

* [`api_key (Custom Header Signature)`](https://www.github.com/developer-sdksio/petstore-test-php/tree/1.1.2/doc/auth/custom-header-signature.md)

## List of APIs

* [Pet](https://www.github.com/developer-sdksio/petstore-test-php/tree/1.1.2/doc/controllers/pet.md)
* [Store](https://www.github.com/developer-sdksio/petstore-test-php/tree/1.1.2/doc/controllers/store.md)
* [User](https://www.github.com/developer-sdksio/petstore-test-php/tree/1.1.2/doc/controllers/user.md)

## Classes Documentation

* [Utility Classes](https://www.github.com/developer-sdksio/petstore-test-php/tree/1.1.2/doc/utility-classes.md)
* [ApiException](https://www.github.com/developer-sdksio/petstore-test-php/tree/1.1.2/doc/api-exception.md)
* [HttpRequest](https://www.github.com/developer-sdksio/petstore-test-php/tree/1.1.2/doc/http-request.md)
* [HttpResponse](https://www.github.com/developer-sdksio/petstore-test-php/tree/1.1.2/doc/http-response.md)

