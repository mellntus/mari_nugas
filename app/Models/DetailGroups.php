<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DetailGroups extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'title',
        'description',
        'owner_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id', 'uid');
    }
}
