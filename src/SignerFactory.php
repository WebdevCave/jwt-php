<?php

namespace Webdevcave\Jwt;

use Exception;
use Webdevcave\Jwt\Signer\Hmac\Sha as Hmac;
use Webdevcave\Jwt\Signer\OpenSsl\Sha as OpenSsl;
use Webdevcave\Jwt\Signer\Signer;

abstract class SignerFactory
{
    /**
     * @var string[]
     */
    private static array $algorithmMap = [
        'HS256' => Hmac\Sha256HmacSigner::class,
        'HS384' => Hmac\Sha384HmacSigner::class,
        'HS512' => Hmac\Sha512HmacSigner::class,
        'RS256' => OpenSsl\Sha256OpenSslSigner::class,
        'RS384' => OpenSsl\Sha384OpenSslSigner::class,
        'RS512' => OpenSsl\Sha512OpenSslSigner::class,
    ];

    /**
     * @param string $algorithm
     * @param string $className
     *
     * @return void
     */
    public static function assign(string $algorithm, string $className): void
    {
        self::$algorithmMap[$algorithm] = $className;
    }

    /**
     * @param string $algorithm
     *
     * @throws Exception
     * @return Signer
     */
    public static function build(string $algorithm): Signer
    {
        if (!isset(self::$algorithmMap[$algorithm])) {
            throw new Exception("Algorithm not assigned: $algorithm. See SignerFactory::assign()");
        }

        $className = self::$algorithmMap[$algorithm];
        return new $className;
    }
}