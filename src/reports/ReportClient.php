<?php

namespace iamgold\facebook\ads\reports;

use Exception;
use iamgold\facebook\ads\AbstractClient;
use iamgold\facebook\ads\handlers\{AdsAccountHandler, AdsCampaignHandler, AdsAdSetsHandler, AdsAdsHandler, AdsReportHandler, CreateRequestHandler, ParamsHandler};
use iamgold\phppipeline\HandlerList;

/**
 * This is a Report client, it's used to access report
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class ReportClient extends AbstractClient implements InterfceReportClient
{
    /**
     * Create account report
     *
     * @param string $accountId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function createAccountReport($accountId = null, arrays $params = [])
    {
        if (empty($accountId))
            throw new Exception("Undefined \$accountId", 404);

        $command = (new HandlerList)->addPathHandler(new AdsAccountHandler)
                                    ->addPathHandler(new AdsReportHandler)
                                    ->add(new ParamsHandler)
                                    ->add(new CreateRequestHandler)
                                    ->resolve();

        return $command->exec([
                'accountId' => $accountId,
                'params' => &$params,
                'credential' => $this->getCredential()
            ]);
    }

    /**
     * Create campaign report
     *
     * @param string $campaignId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function createCampaignReport($campaignId = null, arrays $params = [])
    {
        if (empty($campaignId))
            throw new Exception("Undefined \$campaignId", 404);

        $command = (new HandlerList)->addPathHandler(new AdsCampaignHandler)
                                    ->addPathHandler(new AdsReportHandler)
                                    ->add(new ParamsHandler)
                                    ->add(new CreateRequestHandler)
                                    ->resolve();

        return $command->exec([
                'campaignId' => $campaignId,
                'params' => &$params,
                'credential' => $this->getCredential()
            ]);
    }

    /**
     * Create ads report
     *
     * @param string $adsId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function createAdSetsReport($adsId = null, arrays $params = [])
    {
        if (empty($adsId))
            throw new Exception("Undefined \$adsId", 404);

        $command = (new HandlerList)->addPathHandler(new AdsAdSetsHandler)
                                    ->addPathHandler(new AdsReportHandler)
                                    ->add(new ParamsHandler)
                                    ->add(new CreateRequestHandler)
                                    ->resolve();

        return $command->exec([
                'adsId' => $adsId,
                'params' => &$params,
                'credential' => $this->getCredential()
            ]);
    }

    /**
     * Create ads report
     *
     * @param string $adsId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function createAdsReport($adsId = null, arrays $params = [])
    {
        if (empty($adsId))
            throw new Exception("Undefined \$adsId", 404);

        $command = (new HandlerList)->addPathHandler(new AdsAdsHandler)
                                    ->addPathHandler(new AdsReportHandler)
                                    ->add(new ParamsHandler)
                                    ->add(new CreateRequestHandler)
                                    ->resolve();

        return $command->exec([
                'adsId' => $adsId,
                'params' => &$params,
                'credential' => $this->getCredential()
            ]);
    }

    /**
     * Read ads report
     *
     * @param string $reportId
     * @return iamgold\facebook\ads\Result
     */
    public function read($reportId = null)
    {
        if (empty($reportId))
            throw new Exception("Undefined \$reportId", 404);

        $command = (new HandlerList)->addPathHandler(new AdsReportHandler)
                                    ->resolve();

        return $command->exec([
                'reportId' => $reportId,
                'credential' => $this->getCredential()
            ]);
    }
}
