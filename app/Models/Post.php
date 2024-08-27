<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $primaryKey = 'idpost';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'title',
        'content',
        'date',
        'username'
    ];
    public function account()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }
}
