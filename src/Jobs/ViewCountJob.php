<?php

namespace Luqta\ViewCount\Jobs;

use App\Jobs\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Luqta\ViewCount\Models\ViewCount;
use Jenssegers\Mongodb\Eloquent\Model;

class ViewCountJob extends Job implements ShouldQueue
{
    use SerializesModels, Queueable, InteractsWithQueue;

    protected $model;
    protected $clinetData;

    public function __construct(Model $model, $clinetData)
    {
        $this->model = $model;
        $this->clientData = $clinetData;
    }

    public function handle()
    {   
        if ($this->clinetData['countable'] == 1) {

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
}
