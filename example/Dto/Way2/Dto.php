<?php

declare(strict_types=1);

namespace Tsitsulin\Code\Example\Dto\Way2;

final class Dto extends BaseDto
{
    public function __construct(
        /**
         * @var string
         */
        public readonly string $name,

        /**
         * @var int
         */
        public readonly int $state,

        /**
         * @var string|null
         */
        public readonly ?string $phone,

        /**
         * @var string|null
         */
        public readonly ?string $email,
    ) {
    }
}
