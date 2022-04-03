<?php

namespace Morpher\Ws3\Clients;

use Morpher\Ws3\Wrappers\MorpherDeclension;

abstract class MorpherClientBase {
    /** @var string */
    private $token;

    public function setToken(string $value): self {
        $this->token = require_non_empty_string($value, 'token');
        return $this;
    }

    public function getToken(): ?string {
        return $this->token;
    }

    public function isAuthorized(): bool {
        return !empty($this->token);
    }

    public abstract function request(string $httpMethod, string $path, array $params = []): array;

    public function declension(): MorpherDeclension {
        return new MorpherDeclension($this);
    }
}
