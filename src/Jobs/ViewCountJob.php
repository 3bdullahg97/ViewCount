<?php

namespace Luqta\ViewCount\Jobs;

use App\Jobs\Job;
use Luqta\ViewCount\Models\ViewCount;
use Jenssegers\Mongodb\Eloquent\Model;

class ViewCountJob extends Job
{
    private $model;
    private $clinetData;

    public function __construct(Model $model, $clinetData)
    {
        $this->model = $model;
        $this->clientData = $clinetData;
    }

    public function handle()
    {
        $visit = array_merge([
            'entity_type' => $this->model->getTable(),
            'entity_id' => $this->model->getKey(),
        ], $this->clinetData);

        $found = empty(ViewCount::where($visit)->get());
        $countView = ViewCount::create($visit);

        
        if ($countView && !$found) {
            $this->model->addView();
        }
    }
}
