<?php

namespace Webdevcave\Jwt\Tests\CustomSigner;

use Webdevcave\Jwt\Signer\Hs\Hs256Signer;

class MyCustomSigner extends Hs256Signer
{
    public function algorithm(): string
    {
        return 'CUSTOM';
    }
}
