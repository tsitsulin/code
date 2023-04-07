<?php

declare(strict_types=1);

namespace Tsitsulin\Code\Example\Dto\Way2;

interface DtoBuilderInterface
{
    /**
     * @return BaseDto
     */
    public function build(): BaseDto;
}
