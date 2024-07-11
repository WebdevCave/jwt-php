<?php

namespace Webdevcave\Jwt\Signer\Hmac\Sha;

use Webdevcave\Jwt\Signer\Hmac\HmacSigner;

class Sha256HmacSigner extends HmacSigner
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