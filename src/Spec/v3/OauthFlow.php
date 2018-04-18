<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * Configuration details for a supported OAuth Flow
 *
 * @see https://swagger.io/specification/#oauthFlowObject
 */
class OauthFlow extends AbstractObject implements ExtensibleInterface
{
    /**
     * REQUIRED. The authorization URL to be used for this flow. This MUST be in the form of a URL.
     *
     * Applies To: oauth2 ("implicit", "authorizationCode")
     *
     * @var string
     */
    public $authorizationUrl;

    /**
     * REQUIRED. The token URL to be used for this flow. This MUST be in the form of a URL.
     *
     * Applies To: oauth2 ("password", "clientCredentials", "authorizationCode")
     *
     * @var string
     */
    public $tokenUrl;

    /**
     * REQUIRED. The available scopes for the OAuth2 security scheme. A map between the scope name and a short
     * description for it.
     *
     * Applies To: oauth2
     *
     * @var string[] array<string,string>
     */
    public $scopes;

    /**
     * The URL to be used for obtaining refresh tokens. This MUST be in the form of a URL.
     *
     * Applies To: oauth2
     *
     * @var string
     */
    public $refreshUrl;

    /**
     * @param string   $authorizationUrl
     * @param string   $tokenUrl
     * @param string[] $scopes
     * @param array    $additionalProperties
     */
    public function __construct(
        string $authorizationUrl,
        string $tokenUrl,
        array $scopes,
        array $additionalProperties = []
    ) {
        parent::__construct($additionalProperties);
        $this->authorizationUrl = $authorizationUrl;
        $this->tokenUrl         = $tokenUrl;
        $this->scopes           = $scopes;
    }
}
