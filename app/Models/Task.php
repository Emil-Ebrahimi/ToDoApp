<?php

namespace App\Models;

use App\Http\Traits\TimestampsTrait;
use App\Http\Traits\TasksTrait;
use App\TodoLog;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  use TimestampsTrait;
  use TasksTrait;


    protected $table = 'tasks';

    public function logs()
    {
        return $this->hasMany(TodoLog::class);
    }
}
