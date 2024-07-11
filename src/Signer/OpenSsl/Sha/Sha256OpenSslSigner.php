<?php

namespace Webdevcave\Jwt\Signer\OpenSsl\Sha;

use RuntimeException;
use Webdevcave\Jwt\Secrets\OpenSslSecret;
use Webdevcave\Jwt\Secrets\Secret;
use Webdevcave\Jwt\Signer\OpenSsl\OpenSslSigner;
use Webdevcave\Jwt\Signer\Signer;

class Sha256OpenSslSigner extends OpenSslSigner
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
