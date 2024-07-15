<?php

namespace Webdevcave\Jwt\Signer\Rs;

class Rs512Signer extends RsSigner
{
    /**
     * @var int
     */
    protected int $openSslAlgorithm = OPENSSL_ALGO_SHA512;

    /**
     * @return string
     */
    public function algorithm(): string
    {
        return 'RS512';
    }
}
