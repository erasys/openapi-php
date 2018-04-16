<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * Allows configuration of the supported OAuth Flows.
 *
 * @see https://swagger.io/specification/#oauthFlowsObject
 */
class OaOauthFlowsObject
{

  /**
   * Configuration for the OAuth Implicit flow
   *
   * @var OaOauthFlowObject
   */
  public $implicit;

  /**
   * Configuration for the OAuth Resource Owner Password flow
   *
   * @var OaOauthFlowObject
   */
  public $password;

  /**
   * Configuration for the OAuth Client Credentials flow. Previously called application in OpenAPI 2.0.
   *
   * @var OaOauthFlowObject
   */
  public $clientCredentials;

  /**
   * Configuration for the OAuth Authorization Code flow. Previously called accessCode in OpenAPI 2.0.
   *
   * @var OaOauthFlowObject
   */
  public $authorizationCode;
}
