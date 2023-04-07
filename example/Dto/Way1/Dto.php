<?php

declare(strict_types=1);

namespace Tsitsulin\Code\Example\Dto\Way1;

class Dto extends BaseDto
{
    /**
     * @var string
     */
    protected string $name;

    /**
     * @var string|null
     */
    protected ?string $phone;

    /**
     * @var string|null
     */
    protected ?string $email;

    /**
     * @var int
     */
    protected int $state;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getState(): int
    {
        return $this->state;
    }
}
