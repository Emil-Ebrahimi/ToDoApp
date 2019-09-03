<?php

namespace App;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TodoLog
 * @property int $id
 * @property string $old_name
 * @property string $new_name
 * @property string $old_description
 * @property string $new_description
 * @property string $old_priority
 * @property string $new_priority
 * @property string $old_progress
 * @property string $new_progress
 * @property int $task_id
 * @package App
 */
class TodoLog extends Model
{
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
