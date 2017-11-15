<?php

namespace iamgold\facebook\ads\reports;

use Exception;
use iamgold\facebook\ads\AbstractClient;
use iamgold\facebook\ads\handlers\{AdsAccountHandler, AdsCampaignHandler, AdsAdSetsHandler, AdsAdsHandler, AdsInsightsHandler, AdsReportHandler, CreateDeleteRequestHandler, CreateGetRequestHandler, CreatePostRequestHandler};
use iamgold\phppipeline\HandlerList;

/**
 * This is a Report client, it's used to access report
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class ReportClient extends AbstractClient implements ReportClientInterface
{
    /**
     * @var string BASE_SERVICE_HANDLER
     */
    const BASE_SERVICE_HANDLER = 'iamgold\\facebook\\ads\\handlers\\AdsReportHandler';

    /**
     * Find report by specific id
     *
     * @param string $reportId
     * @return iamgold\facebook\ads\Result
     */
    public function findOne($reportId)
    {
        $command = $this->find()->add(new CreateGetRequestHandler)
                                ->resolve();

        return $command->exec([
                'id' => $reportId,
                'credential' => $this->getCredential()
            ]);
    }

    /**
     * Read report by specific id
     *
     * @param string $reportId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function read($reportId, array $params = [])
    {
        $command = $this->find()->add(new AdsInsightsHandler)
                                ->add(new CreateGetRequestHandler)
                                ->resolve();

        return $command->exec([
                'id' => $reportId,
                'params' => &$params,
                'credential' => $this->getCredential()
            ]);
    }

    /**
     * Delete report by specific report id
     *
     * @param string $reportId
     * @return iamgold\facebook\ads\Result
     */
    public function delete($reportId)
    {
        $command = $this->find()->add(new CreateDeleteRequestHandler)
                                ->resolve();

        return $command->exec([
                'id' => $reportId,
                'credential' => $this->getCredential()
            ]);
    }

    /**
     * Create account report
     *
     * @param string $accountId
     * @param array $params
     * @param array $data
     * @return iamgold\facebook\ads\Result
     */
    public function createAccountReport($accountId = null, array $params = [], array $data = [])
    {
        if (empty($accountId))
            throw new Exception("Undefined \$accountId", 404);

        $command = (new HandlerList)->add(new AdsAccountHandler)
                                    ->add(new AdsInsightsHandler)
                                    ->add(new CreatePostRequestHandler)
                                    ->resolve();

        return $command->exec([
                'id' => $accountId,
                'params' => &$params,
                'data' => &$data,
                'credential' => $this->getCredential()
            ]);
    }

    /**
     * Create campaign report
     *
     * @param string $campaignId
     * @param array $params
     * @param array $data
     * @return iamgold\facebook\ads\Result
     */
    public function createCampaignReport($campaignId = null, array $params = [], array $data = [])
    {
        if (empty($campaignId))
            throw new Exception("Undefined \$campaignId", 404);

        $command = (new HandlerList)->add(new AdsCampaignHandler)
                                    ->add(new AdsInsightsHandler)
                                    ->add(new CreatePostRequestHandler)
                                    ->resolve();

        return $command->exec([
                'id' => $campaignId,
                'params' => &$params,
                'data' => &$data,
                'credential' => $this->getCredential()
            ]);
    }

    /**
     * Create report by specific adSetsId
     *
     * @param string $adSetsId
     * @param array $params
     * @param array $data
     * @return iamgold\facebook\ads\Result
     */
    public function createAdSetsReport($adSetsId = null, array $params = [], array $data = [])
    {
        if (empty($adSetsId))
            throw new Exception("Undefined \$adSetsId", 404);

        $command = (new HandlerList)->add(new AdsAdSetsHandler)
                                    ->add(new AdsInsightsHandler)
                                    ->add(new CreatePostRequestHandler)
                                    ->resolve();

        return $command->exec([
                'id' => $adSetsId,
                'params' => &$params,
                'data' => &$data,
                'credential' => $this->getCredential()
            ]);
    }

    /**
     * Create ads report
     *
     * @param string $adsId
     * @param array $params
     * @param array $data
     * @return iamgold\facebook\ads\Result
     */
    public function createAdsReport($adsId = null, array $params = [], array $data = [])
    {
        if (empty($adsId))
            throw new Exception("Undefined \$adsId", 404);

        $command = (new HandlerList)->add(new AdsAdsHandler)
                                    ->add(new AdsInsightsHandler)
                                    ->add(new CreatePostRequestHandler)
                                    ->resolve();

        return $command->exec([
                'id' => $adSetsId,
                'params' => &$params,
                'data' => &$data,
                'credential' => $this->getCredential()
            ]);
    }

    /**
     * Create report
     *
     * @param string $level
     * @param string $id
     * @param array $params
     */
    private function create($level, $id, array $params = [])
    {
        if (empty($id))
            throw new Exception("Undefined \$$level id", 404);

        switch($level) {
            case 'account':
                $handler = new AdsAccountHandler;
                break;
            case 'campaign':
                $handler = new AdsCampaignHandler;
                break;
            case 'adsets':
                $handler = new AdsAdSetsHandler;
                break;
            case 'ads':
                $handler = new AdsAdsHandler;
                break;
            default:
                throw new Exception("Invalid ", 400);
                break;
        }

        $command = (new HandlerList)->add($handler)
                                    ->add(new AdsInsightsHandler)
                                    ->add(new CreateRequestHandler)
                                    ->resolve();

        return $command->exec([
                'id' => $adsId,
                'params' => &$params,
                'credential' => $this->getCredential()
            ]);
    }
}
