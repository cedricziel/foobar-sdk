<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace myvendor\mynamespace\Generated\Endpoint;

class ShowPetById extends \myvendor\mynamespace\Generated\Runtime\Client\BaseEndpoint implements \myvendor\mynamespace\Generated\Runtime\Client\Endpoint
{
    use \myvendor\mynamespace\Generated\Runtime\Client\EndpointTrait;
    protected $petId;

    /**
     * @param string $petId The id of the pet to retrieve
     */
    public function __construct(string $petId)
    {
        $this->petId = $petId;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{petId}'], [$this->petId], '/pets/{petId}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return \myvendor\mynamespace\Generated\Model\Pet|\myvendor\mynamespace\Generated\Model\Error|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (false === is_null($contentType) && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'myvendor\mynamespace\Generated\Model\Pet', 'json');
        }
        if (false !== mb_strpos($contentType, 'application/json')) {
            return $serializer->deserialize($body, 'myvendor\mynamespace\Generated\Model\Error', 'json');
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
