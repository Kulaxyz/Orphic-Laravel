<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\App;
use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Models\Category;

class NavigationComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $сategories;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->categories = Category::orderBy('created_at', 'desc')->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categories);
    }
}