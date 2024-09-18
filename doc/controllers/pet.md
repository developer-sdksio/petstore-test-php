# Pet

Everything about your Pets

Find out more: [http://swagger.io](http://swagger.io)

```php
$petController = $client->getPetController();
```

## Class Name

`PetController`

## Methods

* [Add Pet](../../doc/controllers/pet.md#add-pet)
* [Find Pets by Tags](../../doc/controllers/pet.md#find-pets-by-tags)
* [Delete Pet](../../doc/controllers/pet.md#delete-pet)
* [Get Pet by Id](../../doc/controllers/pet.md#get-pet-by-id)
* [Update Pet With Form](../../doc/controllers/pet.md#update-pet-with-form)
* [Upload File](../../doc/controllers/pet.md#upload-file)
* [Update Pet](../../doc/controllers/pet.md#update-pet)
* [Find Pets by Status](../../doc/controllers/pet.md#find-pets-by-status)


# Add Pet

Add a new pet to the store

:information_source: **Note** This endpoint does not require authentication.

```php
function addPet(
    string $name,
    array $photoUrls,
    ?int $id = null,
    ?Category $category = null,
    ?array $tags = null,
    ?string $petStatus = null
): Pet
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `name` | `string` | Form, Required | - |
| `photoUrls` | `string[]` | Form, Required | - |
| `id` | `?int` | Form, Optional | - |
| `category` | [`?Category`](../../doc/models/category.md) | Form, Optional | - |
| `tags` | [`?(Tag[])`](../../doc/models/tag.md) | Form, Optional | - |
| `petStatus` | [`?string(PetStatusEnum)`](../../doc/models/pet-status-enum.md) | Form, Optional | pet status in the store |

## Response Type

[`Pet`](../../doc/models/pet.md)

## Example Usage

```php
$name = 'doggie';

$photoUrls = [
    'https://example.com/photo2.jpg'
];

$id = 10;

$category = CategoryBuilder::init()
    ->id(232)
    ->name('name2')
    ->build();

$tags = [
    TagBuilder::init()
        ->id(26)
        ->name('name0')
        ->build()
];

$petStatus = PetStatusEnum::SOLD;

$result = $petController->addPet(
    $name,
    $photoUrls,
    $id,
    $category,
    $tags,
    $petStatus
);
```

## Example Response *(as JSON)*

```json
{
  "name": "Rex",
  "photoUrls": [
    "https://example.com/photo1.jpg",
    "https://example.com/photo2.jpg"
  ],
  "id": 123,
  "category": {
    "id": 1,
    "name": "Dogs"
  },
  "tags": [
    {
      "id": 1,
      "name": "friendly"
    },
    {
      "id": 2,
      "name": "playful"
    }
  ],
  "petStatus": "available"
}
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 405 | Invalid input | `ApiException` |


# Find Pets by Tags

Multiple tags can be provided with comma separated strings. Use tag1, tag2, tag3 for testing.

:information_source: **Note** This endpoint does not require authentication.

```php
function findPetsByTags(?array $tags = null): array
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `tags` | `?(string[])` | Query, Optional | Tags to filter by |

## Response Type

[`Pet[]`](../../doc/models/pet.md)

## Example Usage

```php
$result = $petController->findPetsByTags();
```

## Example Response *(as JSON)*

```json
[
  {
    "id": 10,
    "name": "doggie",
    "photoUrls": [
      "photoUrls5",
      "photoUrls6"
    ],
    "category": {
      "id": 232,
      "name": "name2"
    },
    "tags": [
      {
        "id": 26,
        "name": "name0"
      }
    ],
    "petStatus": "sold"
  },
  {
    "id": 11,
    "name": "kitty",
    "photoUrls": [
      "photoUrls7",
      "photoUrls8"
    ],
    "category": {
      "id": 233,
      "name": "name3"
    },
    "tags": [
      {
        "id": 27,
        "name": "name1"
      }
    ],
    "petStatus": "available"
  }
]
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 400 | Invalid tag value | `ApiException` |


# Delete Pet

delete a pet

:information_source: **Note** This endpoint does not require authentication.

```php
function deletePet(int $petId, ?string $apiKey = null): void
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `petId` | `int` | Template, Required | Pet id to delete |
| `apiKey` | `?string` | Header, Optional | - |

## Response Type

`void`

## Example Usage

```php
$petId = 152;

$petController->deletePet($petId);
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 400 | Invalid pet value | `ApiException` |


# Get Pet by Id

Returns a single pet

```php
function getPetById(int $petId): Pet
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `petId` | `int` | Template, Required | ID of pet to return |

## Response Type

[`Pet`](../../doc/models/pet.md)

## Example Usage

```php
$petId = 152;

$result = $petController->getPetById($petId);
```

## Example Response *(as JSON)*

```json
{
  "name": "Rex",
  "photoUrls": [
    "https://example.com/photo1.jpg",
    "https://example.com/photo2.jpg"
  ],
  "id": 123,
  "category": {
    "id": 1,
    "name": "Dogs"
  },
  "tags": [
    {
      "id": 1,
      "name": "friendly"
    },
    {
      "id": 2,
      "name": "playful"
    }
  ],
  "petStatus": "available"
}
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 400 | Invalid ID supplied | `ApiException` |
| 404 | Pet not found | `ApiException` |


# Update Pet With Form

:information_source: **Note** This endpoint does not require authentication.

```php
function updatePetWithForm(int $petId, ?string $name = null, ?string $status = null): void
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `petId` | `int` | Template, Required | ID of pet that needs to be updated |
| `name` | `?string` | Query, Optional | Name of pet that needs to be updated |
| `status` | `?string` | Query, Optional | Status of pet that needs to be updated |

## Response Type

`void`

## Example Usage

```php
$petId = 152;

$petController->updatePetWithForm($petId);
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 405 | Invalid input | `ApiException` |


# Upload File

:information_source: **Note** This endpoint does not require authentication.

```php
function uploadFile(int $petId, ?string $additionalMetadata = null, ?FileWrapper $body = null): PetImage
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `petId` | `int` | Template, Required | ID of pet to update |
| `additionalMetadata` | `?string` | Query, Optional | Additional Metadata |
| `body` | `?FileWrapper` | Form, Optional | - |

## Response Type

[`PetImage`](../../doc/models/pet-image.md)

## Example Usage

```php
$petId = 152;

$result = $petController->uploadFile($petId);
```

## Example Response *(as JSON)*

```json
{
  "code": 200,
  "type": "unknown",
  "message": "additionalMetadata"
}
```


# Update Pet

Update an existing pet by Id

:information_source: **Note** This endpoint does not require authentication.

```php
function updatePet(
    string $name,
    array $photoUrls,
    ?int $id = null,
    ?Category $category = null,
    ?array $tags = null,
    ?string $petStatus = null
): Pet
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `name` | `string` | Form, Required | - |
| `photoUrls` | `string[]` | Form, Required | - |
| `id` | `?int` | Form, Optional | - |
| `category` | [`?Category`](../../doc/models/category.md) | Form, Optional | - |
| `tags` | [`?(Tag[])`](../../doc/models/tag.md) | Form, Optional | - |
| `petStatus` | [`?string(PetStatusEnum)`](../../doc/models/pet-status-enum.md) | Form, Optional | pet status in the store |

## Response Type

[`Pet`](../../doc/models/pet.md)

## Example Usage

```php
$name = 'doggie';

$photoUrls = [
    'photoUrls5',
    'photoUrls6',
    'photoUrls7'
];

$id = 10;

$category = CategoryBuilder::init()
    ->id(1)
    ->name('Dogs')
    ->build();

$tags = [
    TagBuilder::init()->build()
];

$result = $petController->updatePet(
    $name,
    $photoUrls,
    $id,
    $category,
    $tags
);
```

## Example Response *(as JSON)*

```json
{
  "name": "Rex",
  "photoUrls": [
    "https://example.com/photo1.jpg",
    "https://example.com/photo2.jpg"
  ],
  "id": 123,
  "category": {
    "id": 1,
    "name": "Dogs"
  },
  "tags": [
    {
      "id": 1,
      "name": "friendly"
    },
    {
      "id": 2,
      "name": "playful"
    }
  ],
  "petStatus": "available"
}
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 400 | Invalid ID supplied | `ApiException` |
| 404 | Pet not found | `ApiException` |
| 405 | Validation exception | `ApiException` |


# Find Pets by Status

Multiple status values can be provided with comma separated strings

:information_source: **Note** This endpoint does not require authentication.

```php
function findPetsByStatus(?string $status = StatusEnum::AVAILABLE): array
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `status` | [`?string(StatusEnum)`](../../doc/models/status-enum.md) | Query, Optional | Status values that need to be considered for filter<br>**Default**: `StatusEnum::AVAILABLE` |

## Response Type

[`Pet[]`](../../doc/models/pet.md)

## Example Usage

```php
$status = StatusEnum::AVAILABLE;

$result = $petController->findPetsByStatus($status);
```

## Example Response *(as JSON)*

```json
[
  {
    "id": 10,
    "name": "doggie",
    "photoUrls": [
      "photoUrls5",
      "photoUrls6"
    ],
    "category": {
      "id": 232,
      "name": "name2"
    },
    "tags": [
      {
        "id": 26,
        "name": "name0"
      }
    ],
    "petStatus": "sold"
  },
  {
    "id": 11,
    "name": "kitty",
    "photoUrls": [
      "photoUrls7",
      "photoUrls8"
    ],
    "category": {
      "id": 233,
      "name": "name3"
    },
    "tags": [
      {
        "id": 27,
        "name": "name1"
      }
    ],
    "petStatus": "available"
  }
]
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 400 | Invalid status value | `ApiException` |

