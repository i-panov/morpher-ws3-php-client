<?php

namespace Morpher\Ws3\Clients;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Morpher\Ws3\Exceptions\MorpherException;

class MorpherClient extends MorpherClientBase
{
    /** @var string */
    private $baseUrl = 'https://ws3.morpher.ru';

    public static function create(): self {
        return new self();
    }

    public function setBaseUrl(string $value): self {
        $this->baseUrl = require_non_empty_string($value, 'baseUrl');
        return $this;
    }

    public function getBaseUrl(): string {
        return $this->baseUrl;
    }

    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    public function request(string $httpMethod, string $path, array $params = []): array {
        $guzzle = new Guzzle([
            'base_uri' => $this->baseUrl,
            'timeout' => 10,
        ]);

        $headers = [
            'Accept' => 'application/json',
        ];

        if ($token = $this->getToken()) {
            $headers['Authorization'] = 'Basic ' . base64_encode($token);
        }

        $bodyParam = in_array(strtoupper($httpMethod), [
            'GET', 'DELETE', 'HEAD'
        ]) ? RequestOptions::QUERY : RequestOptions::FORM_PARAMS;

        if (!empty($params['text_body'])) {
            $headers['Content-Type'] = 'text/plain; charset=utf-8';
            $bodyParam = RequestOptions::BODY;
            $params = $params['text_body'];
        }

        $response = $guzzle->request($httpMethod, $path, [
            RequestOptions::HEADERS => $headers,
            $bodyParam => $params,
        ]);

        $result = json_decode($response->getBody()->getContents(), true, JSON_THROW_ON_ERROR);

        if (!empty($result['error']) && is_array($result['error'])) {
            $message = $result['error']['message'] ?? $response->getReasonPhrase();
            $code = (int)($result['error']['code'] ?? 0);
            throw new MorpherException($message, $response->getStatusCode(), $code);
        }

        if (($statusCode = $response->getStatusCode()) >= 400) {
            throw new MorpherException($response->getReasonPhrase(), $statusCode);
        }

        return (array)$result;
    }
}
