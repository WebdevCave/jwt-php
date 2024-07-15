<?php

namespace Webdevcave\Jwt\Tests;

use Exception;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Webdevcave\Jwt\Secrets\HsSecret;
use Webdevcave\Jwt\Secrets\RsSecret;
use Webdevcave\Jwt\Signer\Hs\Hs256Signer;
use Webdevcave\Jwt\Signer\Hs\Hs384Signer;
use Webdevcave\Jwt\Signer\Hs\Hs512Signer;
use Webdevcave\Jwt\Signer\Hs\HsSigner;
use Webdevcave\Jwt\Signer\Rs\Rs256Signer;
use Webdevcave\Jwt\Signer\Rs\Rs384Signer;
use Webdevcave\Jwt\Signer\Rs\Rs512Signer;
use Webdevcave\Jwt\Signer\Rs\RsSigner;
use Webdevcave\Jwt\Signer\Signer;
use Webdevcave\Jwt\SignerFactory;
use Webdevcave\Jwt\Token;
use Webdevcave\Jwt\Validator\AudValidator;
use Webdevcave\Jwt\Validator\EqualityValidator;
use Webdevcave\Jwt\Validator\ExpValidator;
use Webdevcave\Jwt\Validator\NbfValidator;

#[CoversClass(Token::class)]
#[CoversClass(SignerFactory::class)]
#[CoversClass(Signer::class)]
#[CoversClass(HsSecret::class)]
#[CoversClass(HsSigner::class)]
#[CoversClass(Hs256Signer::class)]
#[CoversClass(Hs384Signer::class)]
#[CoversClass(Hs512Signer::class)]
#[CoversClass(RsSecret::class)]
#[CoversClass(RsSigner::class)]
#[CoversClass(Rs256Signer::class)]
#[CoversClass(Rs384Signer::class)]
#[CoversClass(Rs512Signer::class)]
#[CoversClass(AudValidator::class)]
#[CoversClass(EqualityValidator::class)]
#[CoversClass(ExpValidator::class)]
#[CoversClass(NbfValidator::class)]
class TokenTest extends TestCase
{
    public function testHs256Token()
    {
        $algorithm = 'HS256';
        $secret = new HsSecret('secret');
        $invalidSecret = new HsSecret('invalidSecret');

        $token = Token::create()
            ->withSigner(SignerFactory::build($algorithm))
            ->with('custom', 'value')
            ->sign($secret)
            ->toString();

        $tokenObject = Token::fromString($token);
        $this->assertFalse($tokenObject->validate($invalidSecret));
        $this->assertTrue($tokenObject->validate($secret));
        $this->assertEquals('value', $tokenObject->getPayload('custom'));
        $this->assertEquals($algorithm, $tokenObject->getHeaders('alg'));
    }

    public function testHs384Token()
    {
        $algorithm = 'HS384';
        $secret = new HsSecret('secret');
        $invalidSecret = new HsSecret('invalidSecret');

        $token = Token::create()
            ->withSigner(SignerFactory::build($algorithm))
            ->with('custom', 'value')
            ->sign($secret)
            ->toString();

        $tokenObject = Token::fromString($token);
        $this->assertFalse($tokenObject->validate($invalidSecret));
        $this->assertTrue($tokenObject->validate($secret));
        $this->assertEquals('value', $tokenObject->getPayload('custom'));
        $this->assertEquals($algorithm, $tokenObject->getHeaders('alg'));
    }

    public function testHs512Token()
    {
        $algorithm = 'HS512';
        $secret = new HsSecret('secret');
        $invalidSecret = new HsSecret('invalidSecret');

        $token = Token::create()
            ->withSigner(SignerFactory::build($algorithm))
            ->with('custom', 'value')
            ->sign($secret)
            ->toString();

        $tokenObject = Token::fromString($token);
        $this->assertFalse($tokenObject->validate($invalidSecret));
        $this->assertTrue($tokenObject->validate($secret));
        $this->assertEquals('value', $tokenObject->getPayload('custom'));
        $this->assertEquals($algorithm, $tokenObject->getHeaders('alg'));
    }

    public function testRs256Token()
    {
        $privateKey = file_get_contents(__DIR__.'/Keys/Rsa/example.private_key.pem');
        $publicKey = file_get_contents(__DIR__.'/Keys/Rsa/example.public_key.pem');
        $invalidPublicKey = file_get_contents(__DIR__.'/Keys/Rsa/example.invalid_public_key.pem');

        $algorithm = 'RS256';
        $secret = new RsSecret($privateKey, $publicKey);
        $invalidSecret = new RsSecret($privateKey, $invalidPublicKey);

        $token = Token::create()
            ->withSigner(SignerFactory::build($algorithm))
            ->with('custom', 'value')
            ->sign($secret)
            ->toString();

        $tokenObject = Token::fromString($token);
        $this->assertFalse($tokenObject->validate($invalidSecret));
        $this->assertTrue($tokenObject->validate($secret));
        $this->assertEquals('value', $tokenObject->getPayload('custom'));
        $this->assertEquals($algorithm, $tokenObject->getHeaders('alg'));
    }

    public function testRs384Token()
    {
        $privateKey = file_get_contents(__DIR__.'/Keys/Rsa/example.private_key.pem');
        $publicKey = file_get_contents(__DIR__.'/Keys/Rsa/example.public_key.pem');
        $invalidPublicKey = file_get_contents(__DIR__.'/Keys/Rsa/example.invalid_public_key.pem');

        $algorithm = 'RS384';
        $secret = new RsSecret($privateKey, $publicKey);
        $invalidSecret = new RsSecret($privateKey, $invalidPublicKey);

        $token = Token::create()
            ->withSigner(SignerFactory::build($algorithm))
            ->with('custom', 'value')
            ->sign($secret)
            ->toString();

        $tokenObject = Token::fromString($token);
        $this->assertFalse($tokenObject->validate($invalidSecret));
        $this->assertTrue($tokenObject->validate($secret));
        $this->assertEquals('value', $tokenObject->getPayload('custom'));
        $this->assertEquals($algorithm, $tokenObject->getHeaders('alg'));
    }

    public function testRs512Token()
    {
        $privateKey = file_get_contents(__DIR__.'/Keys/Rsa/example.private_key.pem');
        $publicKey = file_get_contents(__DIR__.'/Keys/Rsa/example.public_key.pem');
        $invalidPublicKey = file_get_contents(__DIR__.'/Keys/Rsa/example.invalid_public_key.pem');

        $algorithm = 'RS512';
        $secret = new RsSecret($privateKey, $publicKey);
        $invalidSecret = new RsSecret($privateKey, $invalidPublicKey);

        $token = Token::create()
            ->withSigner(SignerFactory::build($algorithm))
            ->with('custom', 'value')
            ->sign($secret)
            ->toString();

        $tokenObject = Token::fromString($token);
        $this->assertFalse($tokenObject->validate($invalidSecret));
        $this->assertTrue($tokenObject->validate($secret));
        $this->assertEquals('value', $tokenObject->getPayload('custom'));
        $this->assertEquals($algorithm, $tokenObject->getHeaders('alg'));
    }

    public function testRemoveHeaderAndPayload()
    {
        $token = Token::create()
            ->withHeader('customHeader', 'value')
            ->with('custom', 'value2');

        $this->assertEquals('value', $token->getHeaders('customHeader'));
        $this->assertEquals('value2', $token->getPayload('custom'));

        $token->removeHeader('customHeader');
        $token->remove('custom');

        $this->assertNull($token->getHeaders('customHeader'));
        $this->assertNull($token->getPayload('custom'));
    }

    public function testInvalidSecretProvided()
    {
        $this->expectException(Exception::class);

        $signer = new Hs256Signer();
        $signer->setSecret(new RsSecret('...', '...'));
    }

    public function testHeaderValidation()
    {
        $secret = new HsSecret('secret');
        $token = Token::create()
            ->withSigner(SignerFactory::build('HS256'))
            ->withHeader('aud', 'production')
            ->assignHeaderValidator(new AudValidator('tests'))
            ->sign($secret);

        $this->assertNull($token->getLastValidationIssue());
        $this->assertFalse($token->validate($secret));
        $this->assertStringContainsString('aud', $token->getLastValidationIssue());
    }

    public function testPayloadValidation()
    {
        $secret = new HsSecret('secret');
        $token = Token::create()
            ->withSigner(SignerFactory::build('HS256'))
            ->with('aud', 'production')
            ->assignValidator(new AudValidator('tests'))
            ->sign($secret);

        $this->assertNull($token->getLastValidationIssue());
        $this->assertFalse($token->validate($secret));
        $this->assertStringContainsString('aud', $token->getLastValidationIssue());
    }

    public function testInvalidFormatToken()
    {
        $this->expectException(Exception::class);

        Token::fromString('not a token');
    }

    public function testGetData()
    {
        $token = Token::create()
            ->withHeader('example', 'value2')
            ->with('example2', 'value2');

        $this->assertNotEmpty($token->getPayload());
        $this->assertNotEmpty($token->getHeaders());
    }

    public function testTokenMustHaveAlgHeader()
    {
        $this->expectException(Exception::class);

        $secret = new HsSecret('secret');
        $token = Token::create()
            ->withSigner(SignerFactory::build('HS256'))
            ->removeHeader('alg')
            ->sign($secret)
            ->toString();

        Token::fromString($token);
    }

    public function testFromQueryString()
    {
        $secret = new HsSecret('secret');
        $_GET['token'] = Token::create()
            ->withSigner(SignerFactory::build('HS256'))
            ->sign($secret)
            ->toString();

        $tokenObject = Token::fromQueryString();
        $this->assertInstanceOf(Token::class, $tokenObject);
    }
}
