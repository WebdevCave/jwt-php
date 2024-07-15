<?php

namespace Webdevcave\Jwt\Signer\Hs;

class Hs256Signer extends HsSigner
{
    protected string $hmacAlg = 'sha256';

    /**
     * @inheritDoc
     */
    public function algorithm(): string
    {
        return 'HS256';
    }
}
