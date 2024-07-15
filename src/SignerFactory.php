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
        'HS256' => Signer\Hs\Hs256Signer::class,
        'HS384' => Signer\Hs\Hs384Signer::class,
        'HS512' => Signer\Hs\Hs512Signer::class,
        'RS256' => Signer\Rs\Rs256Signer::class,
        'RS384' => Signer\Rs\Rs384Signer::class,
        'RS512' => Signer\Rs\Rs512Signer::class,
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
