<?php

namespace iamgold\facebook\ads;

use Exception;
use iamgold\facebook\ads\credentials\Credential;
use iamgold\phppipeline\HandlerList;

/**
 * This is an abstract class, all client class must extending this class.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
abstract Class AbstractClient
{
    /**
     * @var iamgold\facebook\ads\credentials\Credential $credential
     */
    private $credential;

    /**
     * Construct
     *
     * @param array|iamgold\facebook\ads\credentials\Credential $config
     */
    public function __construct($config = null)
    {
        if (empty($config))
            throw new Exception("Undefined \$config", 404);

        if (is_array($config)) {
            $credential = new Credential($config);
        } elseif ($config instanceof Credential) {
            $credential = $config;
        } else {
            throw new Exception("Invalid \$config", 400);
        }

        $this->credential = &$credential;
    }

    /**
     * Get creadential
     *
     * @return iamgold\facebook\ads\credentials\Credential
     */
    public function getCredential()
    {
        return $this->credential;
    }

    /**
     * Create handler list when finding
     *
     * @return iamgold\facebook\ads\HandlerList
     */
    public function find()
    {
        $className = static::BASE_SERVICE_HANDLER;
        return (new HandlerList)->add(new $className);
    }
}
