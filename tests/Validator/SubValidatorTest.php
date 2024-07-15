<?php

namespace Webdevcave\Jwt\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Webdevcave\Jwt\Validator\SubValidator;
use Webdevcave\Jwt\Validator\EqualityValidator;

#[CoversClass(SubValidator::class)]
#[CoversClass(EqualityValidator::class)]
class SubValidatorTest extends TestCase
{
    public function testValidate()
    {
        $validator = new SubValidator('sub');
        
        $this->assertEquals('sub', $validator->validates());
        $this->assertTrue($validator->validate('sub'));
        $this->assertFalse($validator->validate('not-sub'));
    }

}
