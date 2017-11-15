<?php

namespace iamgold\facebook\ads;

interface InterfaceResult
{
    /**
     * Get Result
     *
     * @return array
     */
    public function getData();

    /**
     * Check has next
     *
     * @return bool
     */
    public function hasNext();

    /**
     * Get result of next page
     *
     * @return iamgold\facebook\ads\Result
     */
    public function getNext();
}
