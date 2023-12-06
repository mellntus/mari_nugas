<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailGroups;
use App\Models\User;

class DetailTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'owner_id',
        'group_id',
        'title',
        'description',
        'due_date',
        'task_sample'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id', 'uid');
    }

    public function group()
    {
        return $this->belongsTo(DetailGroups::class, 'group_id', 'uid');
    }
}
