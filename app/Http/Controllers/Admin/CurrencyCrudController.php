<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\CurrencyRequest as StoreRequest;
use App\Http\Requests\CurrencyRequest as UpdateRequest;

class CurrencyCrudController extends CrudController
{
    public function __construct()
    {

        parent::__construct();
        /*
      |--------------------------------------------------------------------------
      | BASIC CRUD INFORMATION
      |--------------------------------------------------------------------------
      */
        $this->crud->setModel("App\Models\Currency");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin') . '/currency');
        $this->crud->setEntityNameStrings('currency', 'currency');
        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */
        $this->crud->addColumn([
            'name' => 'dollar',
            'label' => 'Dollar ($)',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'ruble',
            'label' => 'Ruble',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'euro',
            'label' => 'Euro',
            'type' => 'text',
        ]);
        // ------ CRUD FIELDS
        $this->crud->addField([    // QUESTION
            'name' => 'dollar',
            'label' => 'Dollar (1 prefered)',
            'type' => 'text',
            'placeholder' => 'Enter dollar value here',
        ]);
        $this->crud->addField([    // QUESTION
            'name' => 'ruble',
            'label' => 'Ruble',
            'type' => 'text',
            'placeholder' => 'Enter ruble value here',
        ]);
        $this->crud->addField([    // QUESTION
            'name' => 'euro',
            'label' => 'Euro',
            'type' => 'text',
            'placeholder' => 'Enter euro value here',
        ]);

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
