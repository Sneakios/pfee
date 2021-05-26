<?php

namespace App\Models;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interessent extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'post_id',
        'post_user_id',
      
    ];


}
