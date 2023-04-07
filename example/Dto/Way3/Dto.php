<?php

declare(strict_types=1);

namespace Tsitsulin\Code\Example\Dto\Way3;

final readonly class Dto
{
    public function __construct(
        public string $name,
        public int $state,
        public ?int $phone = null,
        public ?string $email = null,
    ) {
    }
}
