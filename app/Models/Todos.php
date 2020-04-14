<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user');
    }
}
