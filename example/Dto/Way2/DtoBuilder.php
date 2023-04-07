<?php

declare(strict_types=1);

namespace Tsitsulin\Code\Example\Dto\Way2;

use AllowDynamicProperties;

#[AllowDynamicProperties]
final class DtoBuilder implements DtoBuilderInterface
{
    /**
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        /** @phpstan-ignore-next-line */
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $phone
     *
     * @return self
     */
    public function setPhone(string $phone): self
    {
        /** @phpstan-ignore-next-line */
        $this->phone = $phone;

        return $this;
    }

    /**
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        /** @phpstan-ignore-next-line */
        $this->email = $email;

        return $this;
    }

    /**
     * @param int $state
     *
     * @return self
     */
    public function setState(int $state): self
    {
        /** @phpstan-ignore-next-line */
        $this->state = $state;

        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return Dto
     * @throws \Exception
     */
    public function build(): Dto
    {
        try {
            return new Dto(
                name: $this->name ?? null,
                state: $this->state ?? null,
                phone: $this->phone ?? null,
                email: $this->email ?? null,
            );
        } catch (\Throwable $e) {
            throw new \Exception("Missed required property: '{$e->getMessage()}'");
        }
    }
}
