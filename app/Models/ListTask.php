<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailTask;
use App\Models\DetailGroups;
use App\Models\User;

class ListTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'user_id',
        'file_submitted',
        'submitted_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'uid');
    }

    public function task()
    {
        return $this->belongsTo(DetailTask::class, 'task_id', 'uid');
    }

    public function group()
    {
        return $this->belongsTo(DetailGroups::class, 'group_id', 'uid');
    }
}
