<?php

namespace Webdevcave\Jwt\Tests\Signer\Rs;

use PHPUnit\Framework\Attributes\CoversClass;
use RuntimeException;
use Webdevcave\Jwt\Secrets\RsSecret;
use Webdevcave\Jwt\Signer\Rs\Rs256Signer;
use Webdevcave\Jwt\Signer\Rs\RsSigner;
use PHPUnit\Framework\TestCase;
use Webdevcave\Jwt\Signer\Signer;
use Webdevcave\Jwt\SignerFactory;
use Webdevcave\Jwt\Token;

#[CoversClass(RsSecret::class)]
#[CoversClass(RsSigner::class)]
#[CoversClass(Signer::class)]
class RsSignerTest extends TestCase
{
    public function testInvalidSignature()
    {
        $this->expectException(RuntimeException::class);

        $signer = new Rs256Signer();
        $signer->setSecret(new RsSecret('', ''));
        @$signer->sign('', ''); //@ WARNING IS EXPECTED because the public/private keys were empty
    }
}
