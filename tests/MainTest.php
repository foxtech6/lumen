<?php

namespace Tests;

class MainTest extends TestCase
{
    public function test_that_base_endpoint_returns_a_successful_response(): void
    {
        $this->get('/');

        self::assertEquals(json_encode(config('documentation')), $this->response->getContent());
    }
}
