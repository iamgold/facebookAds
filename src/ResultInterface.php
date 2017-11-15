<?php

namespace iamgold\facebook\ads;

interface ResultInterface
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
     * Check has previous
     *
     * @return bool
     */
    public function hasPrevious();

    /**
     * Get result of next page
     *
     * @return iamgold\facebook\ads\Result
     */
    public function getNext();

    /**
     * Get result of previous page
     *
     * @return iamgold\facebook\ads\Result
     */
    public function getPrevious();
}
