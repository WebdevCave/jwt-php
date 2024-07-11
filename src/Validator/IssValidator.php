<?php

namespace Webdevcave\Jwt\Validator;

class IssValidator extends EqualityValidator
{
    /**
     * @return string
     */
    public function validates(): string
    {
        return 'iss';
    }
}
