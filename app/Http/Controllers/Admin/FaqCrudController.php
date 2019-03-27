<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\FaqRequest as StoreRequest;
use App\Http\Requests\FaqRequest as UpdateRequest;

class FaqCrudController extends CrudController
{

    public function __construct()
    {

        parent::__construct();
        /*
      |--------------------------------------------------------------------------
      | BASIC CRUD INFORMATION
      |--------------------------------------------------------------------------
      */
        $this->crud->setModel("App\Models\Faq");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/faq');
        $this->crud->setEntityNameStrings('faq', 'faqs');
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
            'name' => 'status',
            'label' => 'Status',
        ]);
        $this->crud->addColumn([
            'name' => 'question',
            'label' => 'Question',
        ]);
        $this->crud->addColumn([
            'name' => 'answer',
            'label' => 'Answer',
        ]);
        // ------ CRUD FIELDS
        $this->crud->addField([    // QUESTION
            'name' => 'question',
            'label' => 'Question',
            'type' => 'text',
            'placeholder' => 'Your question here',
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

        $this->crud->addField([    // WYSIWYG
            'name' => 'answer',
            'label' => 'Answer',
            'type' => 'ckeditor',
            'placeholder' => 'Your answer text here',
            'extra_plugins' => ['oembed', 'widget', 'justify'],
        ]);

        $this->crud->addField([    // ENUM
            'name' => 'status',
            'label' => 'Status',
            'type' => 'enum',
        ]);
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
