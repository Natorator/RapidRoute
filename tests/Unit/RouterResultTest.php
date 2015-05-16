<?php

namespace RapidRoute\Tests\Unit;

use RapidRoute\InvalidRouteDataException;
use RapidRoute\RouterResult;
use RapidRoute\Tests\RapidRouteTest;

/**
 * @author Elliot Levin <elliotlevin@hotmail.com>
 */
class RouterResultTest extends RapidRouteTest
{
    public function testFound()
    {
        $result = RouterResult::found(['some_data'], ['param' => 'value']);

        $this->assertSame($result->status(), RouterResult::FOUND);

        $this->assertTrue($result->isFound());
        $this->assertFalse($result->isNotFound());
        $this->assertFalse($result->isDisallowedHttpMethod());

        $this->assertNull($result->getAllowedHttpMethods());
        $this->assertSame(['param' => 'value'], $result->getParameters());
        $this->assertSame(['some_data'], $result->getRouteData());
    }

    public function testNotFound()
    {
        $result = RouterResult::notFound();

        $this->assertSame($result->status(), RouterResult::NOT_FOUND);

        $this->assertTrue($result->isNotFound());
        $this->assertFalse($result->isFound());
        $this->assertFalse($result->isDisallowedHttpMethod());

        $this->assertNull($result->getAllowedHttpMethods());
        $this->assertNull($result->getParameters());
        $this->assertNull($result->getRouteData());
    }

    public function testHttpMethodNotAllowed()
    {
        $result = RouterResult::httpMethodNotAllowed(['PUT', 'DELETE']);

        $this->assertSame($result->status(), RouterResult::HTTP_METHOD_NOT_ALLOWED);

        $this->assertTrue($result->isDisallowedHttpMethod());
        $this->assertFalse($result->isFound());
        $this->assertFalse($result->isNotFound());

        $this->assertSame(['PUT', 'DELETE'], $result->getAllowedHttpMethods());
        $this->assertNull($result->getParameters());
        $this->assertNull($result->getRouteData());
    }
}