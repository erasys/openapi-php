<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * Marker interface to identify al OpenAPI elements that MAY have
 * specification extension properties "x-".
 *
 * Currently this includes all elements excepting Discriminator and Reference objects.
 */
interface ExtensibleInterface
{

}
