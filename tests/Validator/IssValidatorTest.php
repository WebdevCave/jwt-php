<?php

namespace Webdevcave\Jwt\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Webdevcave\Jwt\Validator\IssValidator;
use Webdevcave\Jwt\Validator\EqualityValidator;

#[CoversClass(IssValidator::class)]
#[CoversClass(EqualityValidator::class)]
class IssValidatorTest extends TestCase
{
    public function testValidate()
    {
        $validator = new IssValidator('issuer');
        
        $this->assertEquals('iss', $validator->validates());
        $this->assertTrue($validator->validate('issuer'));
        $this->assertFalse($validator->validate('not-issuer'));
    }

}
