<?php

declare(strict_types=1);

namespace Tsitsulin\Code\Example\Dto\Way1;

interface DtoValidatorInterface
{
    /**
     * @param BaseDto $instance
     *
     * @return void
     * @throws \Exception
     */
    public function validate(BaseDto $instance): void;
}
