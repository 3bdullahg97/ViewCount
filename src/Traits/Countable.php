<?php

namespace Luqta\ViewCount\Traits;

trait Countable
{
    public function views() : int
    {
        return $this->view_count;
    }

    public function addView() : bool
    {
        $count = $this->view_count ?? 0;
        return $this->update(['view_count' => ++$count]);
    }

    public static function boot()
    {
        static::$fillable[] = 'view_count';
    }
}