<?php

namespace Webdevcave\Jwt\Signer\Hs;

use Webdevcave\Jwt\Secrets\HsSecret;
use Webdevcave\Jwt\Secrets\Secret;
use Webdevcave\Jwt\Signer\Signer;

abstract class HsSigner extends Signer
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
        /* @var $secret HsSecret */
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
        return $secret instanceof HsSecret;
    }
}
