<?php

namespace iamgold\facebook\ads;

use Exception;

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
    public static $app_id;

    /**
     * @var string $secret
     */
    public static $secret;

    /**
     * @var string $access_token
     */
    public static $access_token;

    /**
     * @var string $version
     */
    public static $version = '2.10';

    /**
     * Initialize
     *
     * @parma array $config
     */
    public static init($config = [])
    {
        foreach($config as $name=>$value) {
            static::$name = $value;
        }
    }
}
