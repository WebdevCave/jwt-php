<?php

namespace Webdevcave\Jwt\Signer\Rs;

class Rs256Signer extends RsSigner
{
    /**
     * @var int
     */
    protected int $openSslAlgorithm = OPENSSL_ALGO_SHA256;

    /**
     * @return string
     */
    public function algorithm(): string
    {
        return 'RS256';
    }
}
