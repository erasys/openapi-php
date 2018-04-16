<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * The object provides metadata about the API. The metadata MAY be used by the clients if needed,
 * and MAY be presented in editing or documentation generation tools for convenience.
 *
 * @see https://swagger.io/specification/#infoObject
 */
class Info extends AbstractObject
{

  /**
   * REQUIRED. The title of the application.
   *
   * @var string
   */
  public $title;

  /**
   * (Optional) A short description of the application. CommonMark syntax MAY be used for rich text representation.
   *
   * @var string
   */
  public $description;

  /**
   * (Optional) A URL to the Terms of Service for the API. MUST be in the format of a URL.
   *
   * @var string
   */
  public $termsOfService;

  /**
   * (Optional) The contact information for the exposed API.
   *
   * @var Contact
   */
  public $contact;

  /**
   * (Optional) The license information for the exposed API.
   *
   * @var License
   */
  public $license;

  /**
   * REQUIRED. The version of this OpenAPI document
   * (which is distinct from the OpenAPI Specification version or the API implementation version).
   *
   *
   * @var string
   */
  public $version;

  /**
   * @param string $title
   * @param string $version
   * @param string|null $description
   * @param string $licenseName
   */
  public function __construct(
    string $title,
    string $version,
    string $description = null,
    string $licenseName = 'Proprietary License'
  ) {
    $this->title = $title;
    $this->version = $version;
    $this->description = $description;
    $this->license = new License(
      [
        'name' => $licenseName,
      ]
    );
  }
}
