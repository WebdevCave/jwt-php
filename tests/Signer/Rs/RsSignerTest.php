<?php

namespace Webdevcave\Jwt\Tests\Signer\Rs;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use Webdevcave\Jwt\Secrets\RsSecret;
use Webdevcave\Jwt\Signer\Rs\Rs256Signer;
use Webdevcave\Jwt\Signer\Rs\RsSigner;
use Webdevcave\Jwt\Signer\Signer;

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
