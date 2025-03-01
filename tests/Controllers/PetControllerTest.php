<?php

declare(strict_types=1);

/*
 * SwaggerPetstoreOpenAPI30Lib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace SwaggerPetstoreOpenAPI30Lib\Tests\Controllers;

use Core\TestCase\BodyMatchers\KeysBodyMatcher;
use Core\TestCase\TestParam;
use SwaggerPetstoreOpenAPI30Lib\Controllers\PetController;
use SwaggerPetstoreOpenAPI30Lib\Exceptions;
use SwaggerPetstoreOpenAPI30Lib\Models;

class PetControllerTest extends BaseTestController
{
    /**
     * @var PetController PetController instance
     */
    protected static $controller;

    /**
     * Setup test class
     */
    public static function setUpBeforeClass(): void
    {
        self::$controller = parent::getClient()->getPetController();
    }

    public function testFindPetsByTags()
    {
        // Parameters for the API call
        $tags = null;

        // Perform API call
        $result = null;
        try {
            $result = self::$controller->findPetsByTags($tags);
        } catch (Exceptions\ApiException $e) {
        }

        $headers = [];
        $headers['Content-Type'] = ['application/json', true];

        // Assert result with expected response
        $this->newTestCase($result)
            ->expectStatus(200)
            ->allowExtraHeaders()
            ->expectHeaders($headers)
            ->bodyMatcher(KeysBodyMatcher::init(TestParam::object(
                '[{"id":10,"name":"doggie","photoUrls":["photoUrls5","photoUrls6"],"category":{' .
                '"id":232,"name":"name2"},"tags":[{"id":26,"name":"name0"}],"petStatus":"sold"},' .
                '{"id":11,"name":"kitty","photoUrls":["photoUrls7","photoUrls8"],"category":{"id' .
                '":233,"name":"name3"},"tags":[{"id":27,"name":"name1"}],"petStatus":"available"' .
                '}]'
            )))
            ->assert();
    }

    public function testFindPetsByStatus()
    {
        // Parameters for the API call
        $status = Models\StatusEnum::AVAILABLE;

        // Perform API call
        $result = null;
        try {
            $result = self::$controller->findPetsByStatus($status);
        } catch (Exceptions\ApiException $e) {
        }

        $headers = [];
        $headers['Content-Type'] = ['application/json', true];

        // Assert result with expected response
        $this->newTestCase($result)
            ->expectStatus(200)
            ->allowExtraHeaders()
            ->expectHeaders($headers)
            ->bodyMatcher(KeysBodyMatcher::init(TestParam::object(
                '[{"id":10,"name":"doggie","photoUrls":["photoUrls5","photoUrls6"],"category":{' .
                '"id":232,"name":"name2"},"tags":[{"id":26,"name":"name0"}],"petStatus":"sold"},' .
                '{"id":11,"name":"kitty","photoUrls":["photoUrls7","photoUrls8"],"category":{"id' .
                '":233,"name":"name3"},"tags":[{"id":27,"name":"name1"}],"petStatus":"available"' .
                '}]'
            )))
            ->assert();
    }
}
