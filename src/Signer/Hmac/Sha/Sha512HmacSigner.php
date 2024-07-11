<?php

namespace Webdevcave\Jwt\Signer\Hmac\Sha;

use Webdevcave\Jwt\Signer\Hmac\HmacSigner;

class Sha512HmacSigner extends HmacSigner
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