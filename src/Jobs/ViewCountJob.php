<?php

namespace Luqta\ViewCount\Jobs;

use App\Jobs\Job;
use Luqta\Models\ViewCount;
use Jenssegers\Mongodb\Eloquent\Model;

class ViewCountJob extends Job
{
    private $model;
    private $vistorIp;

    public function __construct(Model $model, $vistorIp)
    {
        $this->model = $model;
        $this->vistorIp = $vistorIp;
    }

    public function handle()
    {
        $countView = ViewCount::create([
            'entity_type' => $this->model->getTable(),
            'entity_id' => $this->model->getKey(),
            'vistor_ip' => $this->vistorIp
        ]);
        
        if ($countView) {
            $this->model->addView();
        }
    }
}
