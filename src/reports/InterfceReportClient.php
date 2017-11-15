<?php

namespace iamgold\facebook\ads\accounts;

interface InterfaceReportClient
{
    /**
     * Create account report
     *
     * @param string $accountId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function createAccountReport($accountId = null, arrays $params = []);

    /**
     * Create campaign report
     *
     * @param string $campaignId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function createCampaignReport($campaignId = null, arrays $params = []);

    /**
     * Create ads report
     *
     * @param string $adsId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function createAdSetsReport($adsId = null, arrays $params = []);

    /**
     * Create ads report
     *
     * @param string $adsId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function createAdsReport($adsId = null, arrays $params = []);

    /**
     * Read ads report
     *
     * @param string $reportId
     * @return iamgold\facebook\ads\Result
     */
    public function read($reportId = null);
}
