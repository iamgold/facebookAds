<?php

namespace iamgold\facebook\ads\reports;

interface ReportClientInterface
{
    /**
     * Find report by specific id
     *
     * @param string $reportId
     * @return iamgold\facebook\ads\Result
     */
    public function findOne($reportId);

    /**
     * Read report by specific id
     *
     * @param string $reportId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function read($reportId, array $params = []);

    /**
     * Create account report
     *
     * @param string $accountId
     * @param array $params
     * @param array $data
     * @return iamgold\facebook\ads\Result
     */
    public function createAccountReport($accountId = null, array $params = [], array $data = []);

    /**
     * Create campaign report
     *
     * @param string $campaignId
     * @param array $params
     * @param array $data
     * @return iamgold\facebook\ads\Result
     */
    public function createCampaignReport($campaignId = null, array $params = [], array $data = []);

    /**
     * Create report by specific adSetsId
     *
     * @param string $adSetsId
     * @param array $params
     * @param array $data
     * @return iamgold\facebook\ads\Result
     */
    public function createAdSetsReport($adSetsId = null, array $params = [], array $data = []);

    /**
     * Create ads report
     *
     * @param string $adsId
     * @param array $params
     * @param array $data
     * @return iamgold\facebook\ads\Result
     */
    public function createAdsReport($adsId = null, array $params = [], array $data = []);
}
