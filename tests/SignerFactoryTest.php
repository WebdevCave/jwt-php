<?php

namespace Webdevcave\Jwt\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use Webdevcave\Jwt\SignerFactory;
use PHPUnit\Framework\TestCase;

#[CoversClass(SignerFactory::class)]
class SignerFactoryTest extends TestCase
{
    public function testExample()
    {
        $this->assertTrue(true);
    }
}
