[Back](../README.md)

# Coding convention

### Variables and spaces

### If / ElseIf / Else and Throw / Return logic

1. Operators `elseif` and `else` are not allowed.

#### Throw / Return logic

1. `Exceptions` are threw `first` and `Result` is returned `last`.
2. `Result` is returned `first` and `Exceptions` are threw `last`.

<span style="color:red">Invalid</span>
```php
function area(int $a, int $b): int
{
    if ($a < 0) {
        throw new Exception();
    } elseif ($a > 100) {
        throw new Exception();
    } else {
        return $a * $b;
    }
}
```

<span style="color:green">Correct</span>
```php
function area(int $a, int $b): int
{
    if ($a >= 0 || $a <= 100) {
        return $a * $b;
    }
    
    throw new Exception();
}
```

<span style="color:green">Correct</span>
```php
function area(int $a, int $b): int
{
    if ($a < 0 || $a > 100) {
        throw new Exception();
    }
    
    return $a * $b;
}
```

<span style="color:green">Correct</span>
```php
function area(int $a, int $b): int
{
    if ($a < 0) {
        throw new Exception();
    }
    
    if ($a > 100) {
        throw new Exception();
    }
    
    return $a * $b;
}
```

#### If Array


<span style="color:red">Invalid</span>
```php
if (empty($data)) { ... } // What is data type? Array, string etc.

if ($phones) { ... } // Hidden spell to bool

if (count($phones)) { ... } // Hidden spell to bool
```

<span style="color:green">Correct</span>
```php
if (count($data) === 0) { ... } // Count -> data is array type 

if (empty($phones) === 0) { ... } // It's clear phones is array type

if (!empty($phones)) { ... }

if (count($phones) > 0) { ... }
```

### Ignore tags

1. All tags like `@noinspection` `@phpstan-ignore-*` etc. are not allowed in source code.
2. Any tags are allowed in `tests`.

<span style="color:red">Invalid</span>
```php
/**
 * @return bool
 * @noinspection
 */
function foo(): bool
{
    // @phpstan-ignore-next-line
    $a = '100' + 1;
    // @phpcs:disable [RULE]
    $b = '10' + 10;
}
```

<span style="color:green">Correct</span>
```php
/**
 * @return bool
 */
function foo(): bool
{
    $a = 100 + 1;
    $b = 10 + 10;
}
```

### Comments

1. Smelly code without a strong `TODO` comment is not allowed.

<span style="color:red">Invalid</span>
```php
/**
 * I didn't do it well due some 100 reasons ...
 */
function dont_find_and_dont_kill_me_please()
```

<span style="color:green">Correct</span>
```php
/**
 * @todo #DEBT
 * @link https://github.com/.../issues/100
 * OR
 * @link https://github.com/.../pull/100
 */
function i_know_this_is_bad_but_there_is_a_task_to_solve_it()
```

### Other

<span style="color:red">Invalid</span>

```php
$phone = $phones[0];

$phone = $phones[array_key_first($phones)];

$phone = array_shift($phones);

$phone = array_pop($phones);
```
<span style="color:green">Correct</span>
```php
if (empty($phones)) {
    return;
}

[$phone] = $phones;
```
