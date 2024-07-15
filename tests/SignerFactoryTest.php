<?php

namespace Webdevcave\Jwt\Tests;

use Exception;
use PHPUnit\Framework\Attributes\CoversClass;
use Webdevcave\Jwt\Signer\Hs\Hs256Signer;
use Webdevcave\Jwt\Signer\Hs\Hs384Signer;
use Webdevcave\Jwt\Signer\Hs\Hs512Signer;
use Webdevcave\Jwt\Signer\Rs\Rs256Signer;
use Webdevcave\Jwt\Signer\Rs\Rs384Signer;
use Webdevcave\Jwt\Signer\Rs\Rs512Signer;
use Webdevcave\Jwt\SignerFactory;
use PHPUnit\Framework\TestCase;
use Webdevcave\Jwt\Tests\CustomSigner\MyCustomSigner;

#[CoversClass(SignerFactory::class)]
class SignerFactoryTest extends TestCase
{
    public function testInstanceTypes()
    {
        $this->assertInstanceOf(Hs256Signer::class, SignerFactory::build('HS256'));
        $this->assertInstanceOf(Hs384Signer::class, SignerFactory::build('HS384'));
        $this->assertInstanceOf(Hs512Signer::class, SignerFactory::build('HS512'));
        $this->assertInstanceOf(Rs256Signer::class, SignerFactory::build('RS256'));
        $this->assertInstanceOf(Rs384Signer::class, SignerFactory::build('RS384'));
        $this->assertInstanceOf(Rs512Signer::class, SignerFactory::build('RS512'));
    }

    public function testAssignNewType()
    {
        SignerFactory::assign('CUSTOM', MyCustomSigner::class);
        $this->assertInstanceOf(MyCustomSigner::class, SignerFactory::build('CUSTOM'));
    }

    public function testNotAssignedException()
    {
        $this->expectException(Exception::class);

        SignerFactory::build('WHOOPS');
    }
}
