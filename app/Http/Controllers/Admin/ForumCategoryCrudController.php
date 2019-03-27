<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ForumCategoryRequest as StoreRequest;
use App\Http\Requests\ForumCategoryRequest as UpdateRequest;


class ForumCategoryCrudController extends CrudController
{
    public function __construct()
    {

        parent::__construct();
        /*
      |--------------------------------------------------------------------------
      | BASIC CRUD INFORMATION
      |--------------------------------------------------------------------------
      */
        $this->crud->setModel("DevDojo\Chatter\Models\Category");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin') . '/forums');
        $this->crud->setEntityNameStrings('forum Category', 'forum Caregories');
        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
            'name' => 'date',
            'label' => 'Date',
            'type' => 'date',
        ]);

        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Category Name',
        ]);

        // ------ CRUD FIELDS
        $this->crud->addField([    // QUESTION
            'name' => 'name',
            'label' => 'Category Name',
            'type' => 'text',
            'placeholder' => 'New category name',
        ]);
        $this->crud->addField([
            'name' => 'slug',
            'label' => 'Slug (URL)',
            'type' => 'text',
            'hint' => 'Will be automatically generated from your title, if left empty.',
            // 'disabled' => 'disabled'
        ]);

        $this->crud->addField([    // TEXT
            'name' => 'date',
            'label' => 'Date',
            'type' => 'date',
            'value' => date('Y-m-d'),
        ], 'create');
        $this->crud->addField([    // TEXT
            'name' => 'date',
            'label' => 'Date',
            'type' => 'date',
        ], 'update');

        // $this->crud->addButtonFromModelFunction('line', 'open_blog', 'openBlog', 'last');

        $this->crud->enableAjaxTable();
    }


    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud();
    }
}

