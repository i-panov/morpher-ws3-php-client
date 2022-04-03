<?php

namespace Morpher\Ws3\Clients;

use Morpher\Ws3\Wrappers\MorpherDeclension;
use Morpher\Ws3\Wrappers\MorpherGenders;
use Morpher\Ws3\Wrappers\MorpherSpell;
use Morpher\Ws3\Wrappers\MorpherSpellDate;
use Morpher\Ws3\Wrappers\MorpherSpellOrdinal;

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

    public function spell(): MorpherSpell {
        return new MorpherSpell($this);
    }

    public function spellOrdinal(): MorpherSpellOrdinal {
        return new MorpherSpellOrdinal($this);
    }

    public function spellDate(): MorpherSpellDate {
        return new MorpherSpellDate($this);
    }

    public function genders(): MorpherGenders {
        return new MorpherGenders($this);
    }
}
