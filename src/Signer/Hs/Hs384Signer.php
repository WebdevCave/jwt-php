<?php

namespace Webdevcave\Jwt\Signer\Hs;

class Hs384Signer extends HsSigner
{
    protected string $hmacAlg = 'sha384';

    /**
     * @inheritDoc
     */
    public function algorithm(): string
    {
        return 'HS384';
    }
}