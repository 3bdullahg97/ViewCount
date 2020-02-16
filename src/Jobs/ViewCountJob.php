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
    protected $data;

    public function __construct(Model $model, $data)
    {
        $this->model = $model;
        $this->data = $data;
    }

    public function handle()
    {   
        if ($this->data['countable'] == 1) {
            unset($this->data['countable']);
            $visitor = array_merge([
                'entity_type' => $this->model->getTable(),
                'entity_id' => $this->model->getKey(),
            ], $this->data);
            $count = count(ViewCount::where($visitor)->get());
            
            if ($count === 0) {
                $countView = ViewCount::create($visitor);
                $this->model->addView();
            }
        }
    }
}
