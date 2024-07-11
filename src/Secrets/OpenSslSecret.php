<?php

namespace Webdevcave\Jwt\Secrets;

use OpenSSLAsymmetricKey;
use OpenSSLCertificate;

class OpenSslSecret implements Secret
{
    /**
     * @param OpenSSLAsymmetricKey|OpenSSLCertificate|array|string $privateKey
     * @param OpenSSLAsymmetricKey|OpenSSLCertificate|array|string $publicKey
     */
    public function __construct(
        public readonly OpenSSLAsymmetricKey|OpenSSLCertificate|array|string $privateKey,
        public readonly OpenSSLAsymmetricKey|OpenSSLCertificate|array|string $publicKey,
    ) {
    }
}
