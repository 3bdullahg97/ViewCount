<?php
namespace luqta\ViewCount;

use Jenssegers\Mongodb\Eloquent\Model as Model;

class ViewCount extends Model
{
    protected $table = 'view_counts';

    protected $fillable = [
        'entity_type', 'id', 'ip'
    ];
}