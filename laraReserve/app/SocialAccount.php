<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $fillable = ['provider_name', 'provider_id', 'token', 'secret_token_enc'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
