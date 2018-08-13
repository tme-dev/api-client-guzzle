<?php

namespace TMEApi;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use TMEApi\Hmac\Credentials;
use TMEApi\Hmac\HmacSignMiddleware;

class ClientFactory
{
    /**
     * Factories Guzzle Client with HmacSignMiddleware handler
     *
     * @param string $token
     * @param string $secret
     *
     * @return Client
     */
    public static function factoryForCredentials($token, $secret)
    {
        $credentials = new Credentials($token, $secret);
        $middleware = new HmacSignMiddleware($credentials);

        // Register the middleware.
        $stack = HandlerStack::create();
        $stack->push($middleware);

        // Create a client
        return new Client([
            'base_uri' => 'https://api.tme.eu',
            'handler' => $stack,
        ]);
    }
}
