<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Backpack\CRUD\CrudTrait;
use Config;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Currency extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'currency_value';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['dollar', 'ruble', 'euro'];
    // protected $hidden = [];
    // protected $dates = [];
    protected $casts = [
        'date'      => 'date',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopePublished($query)
    {
        return $query->where('date', '<=', date('Y-m-d'))
            ->orderBy('date', 'DESC');
    }




    /*
    |
    | Return "Open Blog" Button for admin panel
    |
    */
//    public function openBlog($crud = false)
//    {
//        return '<a class="btn btn-xs btn-default" target="_blank" href="' . $this->url_slug . '"><i class="fa fa-newspaper-o"></i> Open Article</a>';
//    }
}
