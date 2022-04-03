<?php

namespace Morpher\Ws3\Functions;

use GuzzleHttp\Exception\GuzzleException;
use Morpher\Ws3\Clients\MorpherClient;
use Morpher\Ws3\Exceptions\MorpherException;
use Morpher\Ws3\Languages\MorpherLanguage;

abstract class MorpherFunctionBase
{
    /** @var MorpherClient */
    private $client;

    /** @var MorpherLanguage */
    private $language;

    /** @return MorpherLanguage[] */
    public abstract static function getAvailableLanguages(): array;

    public function __construct(MorpherClient $client, MorpherLanguage $language) {
        if (!$language->inArray(static::getAvailableLanguages())) {
            throw new \InvalidArgumentException('Not available language');
        }

        $this->client = $client;
        $this->language = $language;
    }

    public function getLanguage(): MorpherLanguage {
        return $this->language;
    }

    public function getName(): string {
        $classParts = explode('\\', get_class($this));
        $name = current(explode('Function', end($classParts)));
        return strtolower(implode('-', preg_split('/\B(?=[A-Z])/s', $name)));
    }

    public function getPath(): string {
        return strtolower(implode('/', [
            $this->language->getName(),
            $this->getName(),
        ]));
    }

    public function getHttpMethod(): string {
        return 'GET';
    }

    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    protected function request(array $params): array {
        return $this->client->request($this->getHttpMethod(), $this->getPath(), $params);
    }
}
