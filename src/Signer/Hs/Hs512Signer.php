<?php

namespace Webdevcave\Jwt\Signer\Hs;

class Hs512Signer extends HsSigner
{
    protected string $hmacAlg = 'sha512';

    /**
     * @inheritDoc
     */
    public function algorithm(): string
    {
        return 'HS512';
    }
}