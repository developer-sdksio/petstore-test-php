<?php

declare(strict_types=1);

/*
 * SwaggerPetstoreOpenAPI30Lib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace SwaggerPetstoreOpenAPI30Lib\Controllers;

use Core\Request\Parameters\BodyParam;
use Core\Request\Parameters\FormParam;
use Core\Request\Parameters\HeaderParam;
use Core\Request\Parameters\QueryParam;
use Core\Request\Parameters\TemplateParam;
use Core\Response\Types\ErrorType;
use CoreInterfaces\Core\Request\RequestMethod;
use SwaggerPetstoreOpenAPI30Lib\Exceptions\ApiException;
use SwaggerPetstoreOpenAPI30Lib\Models\User;

class UserController extends BaseController
{
    /**
     * @return void Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function logoutUser(): void
    {
        $_reqBuilder = $this->requestBuilder(RequestMethod::GET, '/user/logout');

        $this->execute($_reqBuilder);
    }

    /**
     * Creates list of users with given input array
     *
     * @param User[]|null $body
     *
     * @return User Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function createUsersWithListInput(?array $body = null): User
    {
        $_reqBuilder = $this->requestBuilder(RequestMethod::POST, '/user/createWithList')
            ->parameters(HeaderParam::init('Content-Type', 'application/json'), BodyParam::init($body));

        $_resHandler = $this->responseHandler()
            ->throwErrorOn('0', ErrorType::init('successful operation'))
            ->type(User::class);

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * This can only be done by the logged in user.
     *
     * @param int|null $id
     * @param string|null $username
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $email
     * @param string|null $password
     * @param string|null $phone
     * @param int|null $userStatus User Status
     *
     * @return User Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function createUser(
        ?int $id = null,
        ?string $username = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $email = null,
        ?string $password = null,
        ?string $phone = null,
        ?int $userStatus = null
    ): User {
        $_reqBuilder = $this->requestBuilder(RequestMethod::POST, '/user')
            ->parameters(
                HeaderParam::init('Content-Type', 'application/x-www-form-urlencoded'),
                FormParam::init('id', $id),
                FormParam::init('username', $username),
                FormParam::init('firstName', $firstName),
                FormParam::init('lastName', $lastName),
                FormParam::init('email', $email),
                FormParam::init('password', $password),
                FormParam::init('phone', $phone),
                FormParam::init('userStatus', $userStatus)
            );

        $_resHandler = $this->responseHandler()->type(User::class);

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * @param string|null $username The user name for login
     * @param string|null $password The password for login in clear text
     *
     * @return string Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function loginUser(?string $username = null, ?string $password = null): string
    {
        $_reqBuilder = $this->requestBuilder(RequestMethod::GET, '/user/login')
            ->parameters(QueryParam::init('username', $username), QueryParam::init('password', $password));

        $_resHandler = $this->responseHandler()
            ->throwErrorOn('400', ErrorType::init('Invalid username/password supplied'));

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * @param string $name The name that needs to be fetched. Use user1 for testing.
     *
     * @return User Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function getUserByName(string $name): User
    {
        $_reqBuilder = $this->requestBuilder(RequestMethod::GET, '/user/{name}')
            ->parameters(TemplateParam::init('name', $name));

        $_resHandler = $this->responseHandler()
            ->throwErrorOn('400', ErrorType::init('Invalid username supplied'))
            ->throwErrorOn('404', ErrorType::init('User not found'))
            ->type(User::class);

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * This can only be done by the logged in user.
     *
     * @param string $name name that need to be deleted
     * @param int|null $id
     * @param string|null $username
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $email
     * @param string|null $password
     * @param string|null $phone
     * @param int|null $userStatus User Status
     *
     * @return void Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function updateUser(
        string $name,
        ?int $id = null,
        ?string $username = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $email = null,
        ?string $password = null,
        ?string $phone = null,
        ?int $userStatus = null
    ): void {
        $_reqBuilder = $this->requestBuilder(RequestMethod::PUT, '/user/{name}')
            ->parameters(
                TemplateParam::init('name', $name),
                HeaderParam::init('Content-Type', 'application/x-www-form-urlencoded'),
                FormParam::init('id', $id),
                FormParam::init('username', $username),
                FormParam::init('firstName', $firstName),
                FormParam::init('lastName', $lastName),
                FormParam::init('email', $email),
                FormParam::init('password', $password),
                FormParam::init('phone', $phone),
                FormParam::init('userStatus', $userStatus)
            );

        $this->execute($_reqBuilder);
    }

    /**
     * This can only be done by the logged in user.
     *
     * @param string $name The name that needs to be deleted
     *
     * @return void Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function deleteUser(string $name): void
    {
        $_reqBuilder = $this->requestBuilder(RequestMethod::DELETE, '/user/{name}')
            ->parameters(TemplateParam::init('name', $name));

        $_resHandler = $this->responseHandler()
            ->throwErrorOn('400', ErrorType::init('Invalid username supplied'))
            ->throwErrorOn('404', ErrorType::init('User not found'));

        $this->execute($_reqBuilder, $_resHandler);
    }
}
