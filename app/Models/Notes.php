<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Notes extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'user_id',
        'description',
        'title'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'uid');
    }
}
