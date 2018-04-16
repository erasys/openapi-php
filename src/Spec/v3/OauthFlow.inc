<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * Configuration details for a supported OAuth Flow
 *
 * @see https://swagger.io/specification/#oauthFlowObject
 */
class OauthFlow
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
   * The URL to be used for obtaining refresh tokens. This MUST be in the form of a URL.
   *
   * Applies To: oauth2
   *
   * @var string
   */
  public $refreshUrl;

  /**
   * REQUIRED. The available scopes for the OAuth2 security scheme. A map between the scope name and a short
   * description for it.
   *
   * Applies To: oauth2
   *
   * @var string[] array<string,string>
   */
  public $scopes;
}
