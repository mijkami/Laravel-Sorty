<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Particip extends Model
{


       protected $fillable = [
        'sor_id', 'user_id', 'comment_particip','typ','created_at','inscription'];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

        public function sor()
    {
        return $this->belongsTo('App\Models\Sor');
    }



}
