<?php

declare(strict_types=1);

namespace Tsitsulin\Code\Example\Dto\Way4;

/**
 * @psalm-immutable
 */
final class Dto
{
    public string $name;
    public int $state;
    public ?string $phone = null;
    public ?string $email = null;

    public function __construct(
        string $name,
        int $state,
        ?string $phone = null,
        ?string $email = null,
    ) {
        $this->state = $state;
        $this->phone = $phone;
        $this->email = $email;
        $this->name = $name;
    }
}
