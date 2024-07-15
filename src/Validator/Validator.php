<?php

namespace Webdevcave\Jwt\Validator;

abstract class Validator
{
    /**
     * Must return the validated field name;.
     *
     * @return string
     */
    abstract public function validates(): string;

    /**
     * Validates the field specified by validates().
     * Returns true when valid; false otherwise.
     *
     * @param mixed $value
     *
     * @return bool
     */
    abstract public function validate(mixed $value): bool;
}
