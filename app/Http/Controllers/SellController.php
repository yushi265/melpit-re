<?php

namespace App\Http\Controllers;

use App\Models\ItemCondition;
use App\Models\PrimaryCategory;
use Illuminate\Http\Request;

class SellController extends Controller
{
    public function showSellForm()
    {
        $categories = PrimaryCategory::with([
            'secondaryCategories' => function($query) {
                $query->orderBy('sort_no');
            }
            ])->orderBy('sort_no')->get();
        $conditions = ItemCondition::orderBy('sort_no')->get();

        return view('sell', [
            'conditions' => $conditions,
            'categories' => $categories
        ]);
    }
}
