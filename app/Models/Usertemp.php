<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usertemp extends Model
{
    public $fillable = ['name', 'firstname', 'role', 'ajour', 'tel', 'statut', 'email', 'email_verified_at', 'password', 'iduser', 'emailsemblable']; //
}
