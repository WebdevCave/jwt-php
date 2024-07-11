<?php

namespace Webdevcave\Jwt\Secrets;

class HmacSecret implements Secret
{
    /**
     * @param string $key
     */
    public function __construct(
        public readonly string $key
    ) {
    }
}
