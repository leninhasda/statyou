<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $table = 'status';

    const Public = 1;
    const Private = 0;

    protected $fillable = ['user_id', 'content', 'type'];
}
