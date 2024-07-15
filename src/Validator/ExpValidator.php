<?php

namespace Webdevcave\Jwt\Validator;

class ExpValidator extends Validator
{
    /**
     * @inheritDoc
     */
    public function validates(): string
    {
        return 'exp';
    }

    /**
     * @inheritDoc
     */
    public function validate(mixed $value): bool
    {
        return $value > time();
    }
}
