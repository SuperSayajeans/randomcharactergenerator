<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Characters extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'characters';
    protected $fillable = [
        'name', 'race', 'sex', 'self-esteem', 'lawfulness', 'optimism', 'risk', 'emotional', 'arrogance', 'selfishness', 'introversion', 'fat', 'height', 'description', 'personal_charct_array', 'social_charct_array', 'strenght'
    ];
}
