[Back](../README.md)

# Coding convention

### Variables and spaces

### DTOs, Entities and Object values

#### DTO

1. Always immutable.
2. Has only properties. Has no behaviour, validation or any logic.
3. Arguments can be only a `simple type` or `DTO` to remain immutable. Argument can not be a common class.
4. A `required` argument can not be `Null`.
5. A `not required` argument must have default `Null` value. `Default` value can be only `Null`.
6. Argument passing order:
    - `Required` arguments come `first`, then all the rest.
    - Arguments are passed in `alphabetical` order.
7. `Builder Pattern` is no longer allowed to be used to create `DTO`.
8. The `Constructor` can take any number of arguments.
9. No comments.

##### PHP 7.4

1. Required `PSALM` Level `8` or stricter.
2. Class must have `PHPDoc` tag `@psalm-immutable`.

###### DTO

```php
/**
 * @psalm-immutable
 */
final class Dto
{
    public string $name;
    public int $state;
    public ?string $email = null;
    public ?int $phone = null;

    public function __construct(
        AnotherDto $anotherDto,
        string $name,
        int $state,
        ?string $email = null,
        ?int $phone = null,
    ) {
        $this->state = $state;
        $this->phone = $phone;
        $this->email = $email;
        $this->name = $name;
    }
}
```

```php
$dto = new Dto(
    anotherDto: new AnotherDto('value1');
    'Name',
    100,
    900,
    'mail@test',
);

$dto->phone = 901; // ERROR: InaccessibleProperty - index.php:50:1 - Dto::$phone is marked readonly (see https://psalm.dev/054)
$dto->anotherDto->variable1 = 'value2'; // ERROR: InaccessibleProperty - index.php:51:1 - Dto::$phone is marked readonly (see https://psalm.dev/054)

var_dump($dto->name); // Name

```

##### PHP 8.0

1. Required `named arguments`.
2. Required `constructor property promotion`.

###### DTO

1. Required `PSALM` Level `8` or stricter.
2. Class must have `PHPDoc` tag `@psalm-immutable`.

```php
/**
 * @psalm-immutable
 */
final class Dto
{
    public function __construct(
        public AnotherDto $anotherDto,
        public string $name,
        public int $state,
        public ?int $phone = null,
        public ?string $email = null,
    ) {
    }
}
```

##### PHP 8.1

1. Required `readonly properties`.

###### DTO

```php
final class Dto
{
    public function __construct(
        public readonly AnotherDto $anotherDto,
        public readonly string $name,
        public readonly int $state,
        public readonly ?int $phone = null,
        public readonly ?string $email = null,
    ) {
    }
}
```

##### PHP 8.2

1. Required `readonly classes`.

###### DTO

```php
final readonly class Dto
{
    public function __construct(
        public AnotherDto $anotherDto,
        public string $name,
        public int $state,
        public ?int $phone = null,
        public ?string $email = null,
    ) {
    }
}
```
