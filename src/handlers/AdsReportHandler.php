<?php

namespace iamgold\facebook\ads\handlers;

use iamgold\phppipeline\HandlerInterface;
use iamgold\phppipeline\HandlerTrait;

/**
 * This handler is used to prepare report path.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class AdsReportHandler implements HandlerInterface
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
            $reportId = ($payload['id']) ?: null;

            if ($reportId === null)
                throw new Exception("Undefied report id in \$payload", 404);

            if (empty($reportId))
                throw new Exception("Invalid report id in \$payload", 400);

            if (!isset($payload['path']))
                $payload['path'] = [];

            $payload['path'][] = $reportId;

            if ($this->next)
                return $this->next->handle($payload);

            return $params;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
