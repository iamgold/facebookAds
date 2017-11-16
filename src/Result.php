<?php

namespace iamgold\facebook\ads;

use Exception;
use iamgold\facebook\ads\handlers\CreateGetRequestHandler;
use iamgold\phppipeline\HandlerList;

/**
 * This class is used to represent a Result
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class Result implements ResultInterface, ArrayAccess
{
    /**
     * @var string INDEX_NEXT
     */
    const KEY_NEXT = 'next';

    /**
     * @var string INDEX_PREVIOUS
     */
    const KEY_PREVIOUS = 'previous';

    /**
     * @var array $response
     */
    private $attributes = [];

    /**
     * Construct
     *
     * @param string $responseBody
     */
    public function __construct($responseBody = '')
    {
        $this->attributes = json_decode($responseBody, true);
    }

    /**
     * Get Result
     *
     * @return array
     */
    public function getData()
    {
        return ($this->data) ?: [];
    }

    /**
     * Check has next
     *
     * @return bool
     */
    public function hasNext()
    {
        if (!$this->paging)
            return false;

        return array_key_exists(static::KEY_NEXT, $this->paging);
    }

    /**
     * Check has previous
     *
     * @return bool
     */
    public function hasPrevious()
    {
        if (!$this->paging)
            return false;

        return array_key_exists(static::KEY_PREVIOUS, $this->paging);
    }

    /**
     * Get result of next page
     *
     * @return iamgold\facebook\ads\Result|false
     */
    public function getNext()
    {
        if (!$this->hasNext())
            return false;

        $body = file_get_contents($this->paging[static::KEY_NEXT]);
        return new self($body);
    }

    /**
     * Get result of previous page
     *
     * @return iamgold\facebook\ads\Result|false
     */
    public function getPrevious()
    {
        if (!$this->hasPrevious())
            return false;

        $body = file_get_contents($this->paging[static::KEY_PREVIOUS]);
        return new self($body);
    }

    /**
     * Get attributes
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Implement offset set of arrayaccess
     *
     * @param string $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->attributes[] = $value;
        } else {
            $this->attributes[$offset] = $value;
        }
    }

    /**
     * Implement offset exists
     *
     * @param string $offset
     * @return bool
     */
    public function offsetExists($offset) {
        return isset($this->attributes[$offset]);
    }

    /**
     * Implement offset unset
     *
     * @param string $offset
     */
    public function offsetUnset($offset) {
        unset($this->attributes[$offset]);
    }

    /**
     * Implement offset get
     *
     * @param string $offset
     * @return mixed
     */
    public function offsetGet($offset) {
        return isset($this->attributes[$offset]) ? $this->attributes[$offset] : null;
    }

    /**
     * Implement __get
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        if (!isset($this->{$name}))
            return null;

        return $this->attributes[$name];
    }

    /**
     * Implement __isset
     *
     * @param string $name
     * @return bool
     */
    public function __isset($name)
    {
        return (isset($this->attributes[$name]));
    }
}
