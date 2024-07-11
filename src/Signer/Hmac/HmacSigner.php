<?php

namespace Webdevcave\Jwt\Signer\Hmac;

use Webdevcave\Jwt\Signer\Signer;

abstract class HmacSigner extends Signer
{
    /**
     * @var string
     */
    protected string $hmacAlg;

    /**
     * @param string $header
     * @param string $payload
     * @param string $key
     *
     * @return false|mixed|string
     */
    public function sign(string $header, string $payload)
    {
        $secret = $this->getSecret();
        return hash_hmac($this->hmacAlg, "$header.$payload", $secret, true);
    }
}