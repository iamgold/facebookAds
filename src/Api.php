<?php

namespace iamgold\facebook\ads;

/**
 * This class is used to set common information for facebook api.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class Api
{
    /**
     * @var string ENDPOINT
     */
    const ENDPOINT = 'https://graph.facebook.com';

    /**
     * @var string $app_id
     */
    public static $appId;

    /**
     * @var string $secret
     */
    public static $appSecret;

    /**
     * @var string $access_token
     */
    public static $accessToken;

    /**
     * @var string $version
     */
    public static $version = '2.10';

    /**
     * Initialize
     *
     * @parma array $config
     */
    public static init(array $config = [])
    {
        foreach($config as $name=>$value) {
            static::$name = $value;
        }
    }
}
