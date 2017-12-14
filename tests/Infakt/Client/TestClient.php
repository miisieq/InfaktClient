<?php

declare(strict_types=1);

namespace Infakt\Tests\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class TestClient extends Client
{
    public function request($method, $uri = '', array $options = [])
    {
        return new Response(200, [], '{}');
    }
}
