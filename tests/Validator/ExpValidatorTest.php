<?php

namespace Webdevcave\Jwt\Tests;

use PHPUnit\Framework\TestCase;
use Webdevcave\Jwt\Validator\ExpValidator;

#[CoversClass(ExpValidator::class)]
class ExpValidatorTest extends TestCase
{
    public function testValidate()
    {
        $validator = new ExpValidator();
        /*$this->assertTrue($validator->validate(time() + 100));
        $this->assertFalse($validator->validate(time() - 100));*/
        $this->assertFalse($validator->validate(time() - 100));
    }
}
