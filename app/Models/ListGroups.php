<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailGroups;
use App\Models\User;

class ListGroups extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'participant_id'
    ];

    public function participant()
    {
        return $this->belongsTo(User::class, 'participant_id', 'uid');
    }

    public function group()
    {
        return $this->belongsTo(DetailGroups::class, 'group_id', 'uid');
    }
}
