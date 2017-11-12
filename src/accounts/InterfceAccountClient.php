<?php

namespace iamgold\facebook\ads\accounts;

interface InterfaceAccountClient
{
    /**
     * Find by specific account
     *
     * @param string $accountId
     * @return iamgold\facebook\ads\Result
     */
    public function find($accountId = null);

    /**
     * Find campaigns by specific account id
     *
     * @param string $accountId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function findCampaigns($accountId = null, arrays $params = []);

    /**
     * Find adsets by specific account id
     *
     * @param string $accountId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function findAdSets($accountId = null, arrays $params = []);

    /**
     * Find ads by specific account id
     *
     * @param string $accountId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function findAds($accountId = null, arrays $params = []);

    /**
     * Create an async report
     *
     * @param string $accountId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function createAsyncReport($accountId = null, array $params = []);
}
