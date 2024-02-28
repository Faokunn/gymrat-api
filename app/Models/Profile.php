<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    protected $fillable = [
        'nickname',
        'age',
        'gender',
        'goal',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
