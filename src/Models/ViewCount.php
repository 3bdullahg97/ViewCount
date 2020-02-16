<?php

namespace Luqta\ViewCount\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class ViewCount extends Model
{
    protected $table = 'view_counts';

    protected $fillable = [
        'entity_type',
        'entity_id',
        'vistor_ip',
        'user_agent',
        'browser_language',
        'screen',
        'inner'
    ];
}
