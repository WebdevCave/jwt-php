<?php

namespace Webdevcave\Jwt\Signer;

use InvalidArgumentException;
use Webdevcave\Jwt\Secrets\Secret;

abstract class Signer
{
    /**
     * @var Secret|null
     */
    private ?Secret $secret = null;

    /**
     * @return string
     */
    abstract public function algorithm(): string;

    /**
     * @return Secret|null
     */
    public function getSecret(): Secret|null
    {
        return $this->secret;
    }

    /**
     * @param Secret $secret
     *
     * @return void
     */
    public function setSecret(Secret $secret): void
    {
        if (!$this->validateSecret($secret)) {
            throw new InvalidArgumentException("Invalid secret provided");
        }

        $this->secret = $secret;
    }

    /**
     * @param string $header
     * @param string $payload
     *
     * @return mixed
     */
    abstract public function sign(string $header, string $payload): mixed;

    /**
     * @param string $header
     * @param string $payload
     * @param string $signature
     *
     * @return bool
     */
    abstract public function verify(string $header, string $payload, string $signature): bool;

    /**
     * @param Secret $secret
     *
     * @return bool
     */
    abstract protected function validateSecret(Secret $secret): bool;
}
