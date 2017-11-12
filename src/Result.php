<?php

namespace iamgold\facebook\ads;

use Exception;

/**
 * This class is used to represent a Result
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class Result implements InterfaceResult
{
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
        $this->attributes = json_encode($responseBody, true);
    }


}
