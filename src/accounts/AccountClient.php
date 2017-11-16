<?php

namespace iamgold\facebook\ads\accounts;

use Exception;
use iamgold\facebook\ads\AbstractClient;
use iamgold\facebook\ads\handlers\{AdsAccountHandler, AdsCampaignsHandler, AdsAdSetsHandler, AdsAdsHandler, CreateGetRequestHandler};

/**
 * This class is provide serveral method to access Facebook Ads
 * Account.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class AccountClient extends AbstractClient implements AccountClientInterface
{
    /**
     * @var string BASE_SERVICE_HANDLER
     */
    const BASE_SERVICE_HANDLER = 'iamgold\\facebook\\ads\\handlers\\AdsAccountHandler';

    /**
     * Find by specific account
     *
     * @param string $accountId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function findOne($accountId = null, array $params = [])
    {
        if (empty($accountId))
            throw new Exception("Undefined \$accountId", 404);

        $command = $this->find()->add(new CreateGetRequestHandler)
                                ->resolve();

        return $command->exec([
                'id' =>  $accountId,
                'credential' => $this->getCredential()
            ]);
    }

    /**
     * Find campaigns by specific account id
     *
     * @param string $accountId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function findCampaigns($accountId = null, array $params = [])
    {
        if (empty($accountId))
            throw new Exception("Undefined \$accountId", 404);

        $command = $this->find()->add(new AdsCampaignsHandler)
                                ->add(new CreateGetRequestHandler)
                                ->resolve();

        return $command->exec([
                'id' => $accountId,
                'params' => &$params,
                'credential' => $this->getCredential()
            ]);
    }

    /**
     * Find adsets by specific account id
     *
     * @param string $accountId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function findAdSets($accountId = null, array $params = [])
    {
        if (empty($accountId))
            throw new Exception("Undefined \$accountId", 404);

        $command = $this->find()->add(new AdsAdSetsHandler)
                                ->add(new CreateGetRequestHandler)
                                ->resolve();

        return $command->exec([
                'id' => $accountId,
                'params' => &$params,
                'credential' => $this->getCredential()
            ]);
    }

    /**
     * Find ads by specific account id
     *
     * @param string $accountId
     * @param array $params
     * @return iamgold\facebook\ads\Result
     */
    public function findAds($accountId = null, array $params = [])
    {
        if (empty($accountId))
            throw new Exception("Undefined \$accountId", 404);

        $command = $this->find()->add(new AdsAdsHandler)
                                ->add(new CreateGetRequestHandler)
                                ->resolve();

        return $command->exec([
                'id' => $accountId,
                'params' => &$params,
                'credential' => $this->getCredential()
            ]);
    }
}
