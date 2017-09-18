<?php

namespace iamgold\facebook\ads;

use ArrayAccess;
use Exception;

/**
 * This class is represented a base model.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class Model implements ArrayAccess
{
    /**
     * @var array $attributes
     */
    private $attributes = [];

    /**
     * Returns the value of an object property.
     *
     * @param string $name the property name
     * @return mixed the property value
     * @see __set()
     */
    public function __get($name)
    {
        if (!isset($this->attributes[$name]))
            throw new Exception("Get unknown property($name)", 400);

        return $this->attributes[$name];
    }

    /**
     * PHP setter magic method.
     *
     * @param string $name property name
     * @param mixed $value property value
     */
    public function __set($name, $value)
    {
        if (isset($this->attributes($name)))
            $this->attributes[$name] = $value;

        throw new Exception("Set invalid property($name)", 400);
    }

    /**
     * set offset to
     *
     * @param mixed $offset
     * @param
     */
    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->attributes[] = $value;
        } else {
            $this->attributes[$offset] = $value;
        }
    }

    /**
     * Check the offset is exists
     *
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset) {
        return isset($this->attributes[$offset]);
    }

    /**
     * Unset offset
     *
     * @param mixed $offset
     */
    public function offsetUnset($offset) {
        $this->attributes[$offset] = null;
    }

    /**
     * Get offset
     *
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset) {
        return isset($this->attributes[$offset]) ? $this->attributes[$offset] : null;
    }

    /**
     * Set attributes
     *
     * @param array $attributes
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
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
}
