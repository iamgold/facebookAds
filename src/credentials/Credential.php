<?php

namespace iamgold\facebook\ads\credentials;

use Exception;

/**
 * This class is used to define configuration.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class Credential
{
    /**
     * @var string $appId
     */
    private $appId;

    /**
     * @var string $appSecret
     */
    private $appSecret;

    /**
     * @var string $accessToken
     */
    private $accessToken;

    /**
     * @var string $version
     */
    private $version;

    /**
     * Contruct
     *
     * @param array $config [appId, appSecret, accessToken, version]
     */
    public function __construct(array $config)
    {
        $attrs = ['appId', 'appSecret', 'accessToken', 'version'];
        while($attr = array_shift($attrs)) {
            if (!isset($config[$attr]))
                throw new Exception("Undefined \$config[$attr]", 404);

            if (empty($config[$attr]) || !is_string($config[$attr]))
                throw new Exception("Invalid \$config[$attr]", 400);

            $this->{$attr} = $config[$attr];
        }
    }

    /**
     * Get application identity
     *
     * @return string
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * Get application secret
     *
     * @return string
     */
    public function getAppSecret()
    {
        return $this->appSecret;
    }

    /**
     * Get access token
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Get version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }
}
