<?php

namespace iamgold\facebook\ads\handlers;

use GuzzleHttp\Client;
use iamgold\phppipeline\HandlerInterface;
use iamgold\phppipeline\HandlerTrait;
use iamgold\facebook\ads\Result;

/**
 * This handler is used to send request
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class CreateGetRequestHandler implements HandlerInterface
{
    // use handler trait
    use HandlerTrait;

    /**
     * @var int TIMEOUT
     */
    const TIMEOUT = 300;

    /**
     * @var string API_ENDPOINT
     */
    const API_ENDPOINT = 'https://graph.facebook.com';

    /**
     * Implement execute method
     *
     * @param mixed $payload
     * @return mixed
     */
    public function handle($payload)
    {
        try {
            $path = '/' . $payload['credential']->getVersion();

            if (isset($payload['path']))
                $path .= '/' . implode('/', $payload['path']);

            $query = (isset($payload['params'])) ? $payload['params'] : [];
            $query['access_token'] = $payload['credential']->getAccessToken();


            $headers = ['Accept'=>'application/json'];
            $client = new Client([
                    'base_uri' => static::API_ENDPOINT,
                    'timeout' => static::TIMEOUT
                ]);

            $response = $client->request('GET', $path, [
                'query' => $query,
                'headers' => $headers
            ]);

            if ($response->getStatusCode()!=200) {
                throw new Exception("Request(GET) facebook API error", 500);
            }

            $body = (string) $response->getBody();

            return new Result($body);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
