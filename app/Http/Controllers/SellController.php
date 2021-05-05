<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellRequest;
use App\Models\Item;
use App\Models\ItemCondition;
use App\Models\PrimaryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function sellItem(SellRequest $request)
    {
        $user = Auth::user();

        $item = new Item();
        $item->seller_id = $user->id;
        $item->fill($request->all());
        $item->secondary_category_id = $request->category;
        $item->item_condition_id = $request->condition;
        $item->state = Item::STATE_SELLING;
        $item->save();

        return redirect()->back()
                ->with('status', '商品を出品しました。');
    }
}
