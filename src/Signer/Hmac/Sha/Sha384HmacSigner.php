<?php

namespace Webdevcave\Jwt\Signer\Hmac\Sha;

use Webdevcave\Jwt\Signer\Hmac\HmacSigner;

class Sha384HmacSigner extends HmacSigner
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