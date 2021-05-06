<?php

namespace App\View\Components;

use App\Models\PrimaryCategory;
use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user = Auth::user();

        $categories = PrimaryCategory::with(['secondaryCategories' => function($query) {
            $query->orderBy('sort_no');
        }])->orderBy('sort_no')->get();

        $defaults = [
            'category' => Request::input('category', ''),
            'keyword' => Request::input('keyword', ''),
        ];

        return view('components.header', [
            'user' => $user,
            'categories' => $categories,
            'defaults' => $defaults,
        ]);
    }
}
