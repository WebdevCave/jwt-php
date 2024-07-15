<?php

namespace Webdevcave\Jwt\Signer\Rs;

class Rs384Signer extends RsSigner
{
    /**
     * @var int
     */
    protected int $openSslAlgorithm = OPENSSL_ALGO_SHA384;

    /**
     * @return string
     */
    public function algorithm(): string
    {
        return 'RS384';
    }
}
