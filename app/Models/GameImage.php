<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class GameImage extends Model
{
    use CrudTrait;

    /*
   |--------------------------------------------------------------------------
   | GLOBAL VARIABLES
   |--------------------------------------------------------------------------
   */

    protected $table = 'game_images';
    protected $primaryKey = 'id';
    protected $appends = ['thumbnail'];
    // public $timestamps = false;
    // protected $guarded = ['id'];
    // protected $fillable = ['name'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function game()
    {
        return $this->belongsTo('App\Models\Game');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |
    | Get Thumbnail
    |
    */
    public function getThumbnailAttribute()
    {
        return url('images/avatar_square/' . $this->filename);
    }

    /*
    |
    | Get URL
    |
    */
    public function getUrlAttribute()
    {
        return url('images/picture/' . $this->filename);
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
