<?php

namespace Webdevcave\Jwt\Validator;

class AudValidator extends EqualityValidator
{
    /**
     * @return string
     */
    public function validates(): string
    {
        return 'aud';
    }
}
