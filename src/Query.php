<?php

namespace iamgold\facebook\ads;

use Exception;

/**
 * This is an query class for create a facebook API qeury.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class Query
{
    /**
     * @var array $paths
     */
    private $paths = [];

    /**
     * @var array $params
     */
    private $params = [];

    /**
     * Add Parameter
     *
     * @param string $name
     * @param mixed $value
     */
    public function addParam($name, $value = null)
    {
        if (!is_string($name))
            throw new Exception("Invalid name of parameter", 400);

        $this->params[$name] = $value;
    }

    /**
     * Execute this query, it will use Api::access_token if $accessToken is null.
     *
     * @param string $accessToken
     * @return iamgold\facebook\ads\Response
     */
    public function execute($accessToken = null)
    {
        if ($accessToken===null) {
            $accessToken = Api::access_token;
        } else {
            if (!is_string($accessToken))
                throw new Exception("Invalid access token type", 400);
        }
    }

    /**
     * Get path
     *
     * @return array
     */
    public function getPaths()
    {
        return $this->paths;
    }

    /**
     * Create command
     *
     * @return iamgold\facebook\ads\Command
     */
    public function createCommand()
    {
        $cmd = (new Command)->bindPath($this->comPath())
                            ->bindParams($this->getParams());

        return $cmd;
    }

    /**
     * Set path
     *
     * @param string $path
     */
    public function setPath($path = null)
    {
        if (!is_string($path))
            throw new Exception("Invalid path type", 400);

        $this->paths[] = trim($path, '/');
    }


}
