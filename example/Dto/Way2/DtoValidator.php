<?php

declare(strict_types=1);

namespace Tsitsulin\Code\Example\Dto\Way1;

final class DtoValidator implements DtoValidatorInterface
{
    /**
     * {@inheritDoc}
     */
    public function validate(BaseDto $instance): void
    {
        $reflection = new \ReflectionClass($instance);
        foreach ($reflection->getProperties() as $property) {
            $isNullType = (bool) $property->getType()?->allowsNull();
            $isProtected = $property->getModifiers() === \ReflectionProperty::IS_PROTECTED;

            if (!$isNullType && $isProtected && !$property->isInitialized($instance)) {
                throw new \Exception("Missed required '{$property->getName()}'");
            }
        }
    }
}
