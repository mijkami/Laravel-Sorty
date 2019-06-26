<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sor extends Model
{
    protected $fillable = [
        'typ', 'dat', 'comment_sor',
    ];
    public function particip()
    {
        return $this->hasMany('App\Models\Particip');
    }
}
