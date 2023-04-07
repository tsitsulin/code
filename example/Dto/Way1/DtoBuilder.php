<?php

declare(strict_types=1);

namespace Tsitsulin\Code\Example\Dto\Way1;

final class DtoBuilder extends Dto implements DtoBuilderInterface
{
    private Dto $instance;
    private DtoValidator $validator;

    public function __construct()
    {
        $this->instance = new Dto();
        $this->validator = new DtoValidator();
    }

    /**
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->instance->name = $name;

        return $this;
    }

    /**
     * @param string $phone
     *
     * @return self
     */
    public function setPhone(string $phone): self
    {
        $this->instance->phone = $phone;

        return $this;
    }

    /**
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->instance->email = $email;

        return $this;
    }

    /**
     * @param int $state
     *
     * @return self
     */
    public function setState(int $state): self
    {
        $this->instance->state = $state;

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
        $this->validator->validate($this->instance);

        return $this->instance;
    }
}
