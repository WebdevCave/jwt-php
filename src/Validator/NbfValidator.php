<?php

namespace Webdevcave\Jwt\Validator;

class NbfValidator extends Validator
{
    /**
     * @inheritDoc
     */
    public function validates(): string
    {
        return 'nbf';
    }

    /**
     * @inheritDoc
     */
    public function validate(mixed $value): bool
    {
        return $value <= time();
    }
}
