<?php

namespace Webdevcave\Jwt\Validator;

use Webdevcave\Jwt\Validator\Validator;

abstract class EqualityValidator extends Validator
{
    /**
     * @param mixed $expected
     */
    public function __construct(
        private mixed $expected
    ) {
    }

    /**
     * @inheritDoc
     */
    public function validate(mixed $value): bool
    {
        return $value === $this->expected;
    }
}
