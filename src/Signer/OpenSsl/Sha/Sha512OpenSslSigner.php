<?php

namespace Webdevcave\Jwt\Signer\OpenSsl\Sha;

use Webdevcave\Jwt\Signer\OpenSsl\OpenSslSigner;

class Sha512OpenSslSigner extends OpenSslSigner
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
