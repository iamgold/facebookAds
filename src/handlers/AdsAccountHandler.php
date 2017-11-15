<?php

namespace iamgold\facebook\ads\handlers;

use iamgold\phppipeline\HandlerInterface;
use iamgold\phppipeline\HandlerTrait;

/**
 * This handler is used to prepare account path.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class AdsAccountHandler implements HandlerInterface
{
    // use handler trait
    use HandlerTrait;

    /**
     * Implement execute method
     *
     * @param mixed $payload
     * @return mixed
     */
    public function handle($payload)
    {
        try {
            $accountId = ($payload['accountId']) ?: null;

            if ($accountId === null)
                throw new Exception("Undefied accountId in \$payload", 404);

            if (empty($accountId))
                throw new Exception("Invalid accountId in \$payload", 400);

            $accountId = 'act_' . $accountId;

            if (!isset($payload['path']))
                $payload['path'] = [];

            $payload['path'][] = $accountId;

            if ($this->next)
                return $this->next->handle($payload);

            return $params;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
