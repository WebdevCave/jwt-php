<?php

namespace Webdevcave\Jwt\Validator;

class SubValidator extends EqualityValidator
{
    /**
     * @return string
     */
    public function validates(): string
    {
        return 'sub';
    }
}
