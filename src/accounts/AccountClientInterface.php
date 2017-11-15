<?php

namespace iamgold\facebook\ads\accounts;

interface AccountClientInterface
{
    /**
     * Find by specific account
     *
     * @param string $accountId
     * @return iamgold\facebook\ads\Result
     */
    public function findOne($accountId = null);

    /**
     * Find campaigns by specific account id
     *
     * @param string $accountId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function findCampaigns($accountId = null, array $params = []);

    /**
     * Find adsets by specific account id
     *
     * @param string $accountId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function findAdSets($accountId = null, array $params = []);

    /**
     * Find ads by specific account id
     *
     * @param string $accountId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function findAds($accountId = null, array $params = []);
}
