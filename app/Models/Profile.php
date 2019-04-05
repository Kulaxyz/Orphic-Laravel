<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['first_name', 'surname', 'age', 'gender', 'skype', 'discord', 'about', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
