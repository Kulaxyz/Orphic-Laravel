<?php

namespace DevDojo\Chatter\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Backpack\CRUD\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Category extends Model
{
    use CrudTrait;
    use Sluggable, SluggableScopeHelpers;

    protected $table = 'chatter_categories';
    public $timestamps = true;
    public $with = 'parents';
    protected $fillable = ['slug', 'name'];


    public function discussions()
    {
        return $this->hasMany(Models::className(Discussion::class),'chatter_category_id');
    }

    public function parents()
    {
        return $this->hasMany(Models::classname(self::class), 'parent_id')->orderBy('order', 'asc');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug_or_title',
            ],
        ];
    }

    public function getSlugOrTitleAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->name;
    }


    /*
    |
    | Get URL
    |
    */
    public function getUrlSlugAttribute()
    {
        return url('forums/' . str_slug($this->slug) . '-' . $this->id);
    }
}
