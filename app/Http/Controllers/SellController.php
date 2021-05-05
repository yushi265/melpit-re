<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellRequest;
use App\Models\Item;
use App\Models\ItemCondition;
use App\Models\PrimaryCategory;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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

        $imageName = $this->saveImage($request->file('item-image'));

        $item = new Item();
        $item->image_file_name = $imageName;
        $item->seller_id = $user->id;
        $item->fill($request->all());
        $item->secondary_category_id = $request->category;
        $item->item_condition_id = $request->condition;
        $item->state = Item::STATE_SELLING;
        $item->save();

        return redirect()->back()
                ->with('status', '商品を出品しました。');
    }

    /**
     * 商品画像をリサイズして保存します
     *
     * @param UploadedFile $file アップロードされた商品画像
     * @return string ファイル名
     */
    public function saveImage(UploadedFile $file): string
    {
        $tempPath = $this->makeTempPath();

        Image::make($file)->fit(300, 300)->save($tempPath);

        $filePath = Storage::disk('public')->putFile('item-images', new File($tempPath));

        return basename($filePath);
    }

    /**
     * 一時的なファイルを生成してパスを返します。
     *
     * @return string ファイルパス
     */
    public function makeTempPath(): string
    {
        $tmp_fp = tmpfile();
        $meta = stream_get_meta_data($tmp_fp);
        return $meta['uri'];
    }
}
