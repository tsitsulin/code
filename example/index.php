<?php // phpcs:disable PSR1.Files.SideEffects.FoundWithSymbols

declare(strict_types=1);

namespace Tsitsulin\Code\Example;

use Tsitsulin\Code\Example;

require(__DIR__ . '/../vendor/autoload.php');

echo 'Examples:' . PHP_EOL;

$dto1 = (new Dto\Way1\DtoBuilder())
    ->setName('Name')
    ->setState(100)
    ->setPhone('900')
    ->setEmail('mail@test')
    ->build();
//$dto1->phone = '1';

var_dump($dto1);

$dto2 = (new Dto\Way2\DtoBuilder())
    ->setName('Name')
    ->setState(100)
    ->setPhone('900')
    ->setEmail('mail@test')
    ->build();
//$dto2->phone = '1';

var_dump($dto2);

$dto3 = new Example\Dto\Way3\Dto(
    name: 'Name',
    state: 100,
    phone: 900,
    email: 'mail@test',
);
//$dto3->phone = '1';

var_dump($dto3);

$dto4 = new Example\Dto\Way4\Dto(
    name: 'Name',
    state: 100,
    phone: '900',
    email: 'mail@test',
);

$dto4->phone = '1';

var_dump($dto4);