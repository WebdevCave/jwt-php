<?php

namespace Webdevcave\Jwt\Secrets;

use OpenSSLAsymmetricKey;
use OpenSSLCertificate;

class RsSecret implements Secret
{
    /**
     * @param OpenSSLAsymmetricKey|OpenSSLCertificate|array|string|null $privateKey
     * @param OpenSSLAsymmetricKey|OpenSSLCertificate|array|string|null $publicKey
     */
    public function __construct(
        public readonly OpenSSLAsymmetricKey|OpenSSLCertificate|array|string|null $privateKey = null,
        public readonly OpenSSLAsymmetricKey|OpenSSLCertificate|array|string|null $publicKey = null,
    ) {
    }
}
