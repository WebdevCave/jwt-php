<?php

namespace Webdevcave\Jwt\Signer\Hmac;

use Webdevcave\Jwt\Secrets\HmacSecret;
use Webdevcave\Jwt\Secrets\Secret;
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
     *
     * @return mixed
     */
    public function sign(string $header, string $payload): mixed
    {
        /* @var $secret HmacSecret */
        $secret = $this->getSecret();

        return hash_hmac($this->hmacAlg, "$header.$payload", $secret->key, true);
    }

    /**
     * @param string $header
     * @param string $payload
     * @param string $signature
     *
     * @return bool
     */
    public function verify(string $header, string $payload, string $signature): bool
    {
        return $this->sign($header, $payload) === $signature;
    }

    /**
     * @param Secret $secret
     *
     * @return bool
     */
    protected function validateSecret(Secret $secret): bool
    {
        return $secret instanceof HmacSecret;
    }
}
