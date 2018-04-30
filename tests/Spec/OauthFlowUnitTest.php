<?php

namespace erasys\OpenApi\Tests\Spec;

use erasys\OpenApi\Spec\v3\ExtensibleInterface;
use erasys\OpenApi\Spec\v3\OauthFlow;
use PHPUnit\Framework\TestCase;

class OauthFlowUnitTest extends TestCase
{
    public function testConstructorRequiredAssignments()
    {
        $authorizationUrl = 'http://xyz.com/auth';
        $tokenUrl         = 'http://xyz.com/token';
        $scopes           = [];
        $additional       = [
            'tokenUrl' => 'http://xyz.com',
        ];

        $obj = new OauthFlow($authorizationUrl, $tokenUrl, $scopes, $additional);

        $this->assertInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertEquals($authorizationUrl, $obj->authorizationUrl);
        $this->assertEquals($tokenUrl, $obj->tokenUrl);
        $this->assertEquals($scopes, $obj->scopes);
    }
}
