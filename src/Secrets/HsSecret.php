<?php

namespace Webdevcave\Jwt\Secrets;

class HsSecret implements Secret
{
    /**
     * @param string $key
     */
    public function __construct(
        public readonly string $key
    ) {
    }
}
