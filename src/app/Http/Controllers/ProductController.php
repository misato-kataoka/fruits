<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Date;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // 商品検索機能
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // 商品並び替え機能
        if ($request->filled('sort')) {
            if ($request->sort == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        }

        $products = $query->paginate(6); // 6件ずつ表示

        return view('products.index', compact('products'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); // 検索クエリを取得
        $products = Product::where('name', 'LIKE', '%' . $query . '%')->paginate(6);

        return view('products.show', compact('products')); // 検索結果をビューに渡す
    }

    public function show($id)
    {
        $product = Product::with('seasons')->findOrFail($id);
        $seasons = $product->seasons;
        return view('detail', compact('product', 'seasons'));
    }

    public function create(Request $request)
    {
        if ($request->has('back')) {
            return redirect('/products');
        }

        $seasons = Season::all();

        return view('products.register', compact('seasons'));

    }

    public function store(ProductRequest $request)
    {
        try {
        // 商品登録
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        // 画像の保存
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('fruits-img', 'public');
            $product->image = $path;
        }

        $product->save();

        // 季節の選択肢を中間テーブルに保存
        if ($request->season) {
            $product->seasons()->attach($request->season); // 選択された季節のIDを中間テーブルに保存
        }

        return redirect('/products')->with('success', '商品が登録されました。');
    } catch (\Exception $e) {
        return redirect('/products')->with('error', '商品登録中にエラーが発生しました。');
        }
    }

    public function checkSeason($seasonId) {
        return $this->seasons()->where('season_id', $seasonId)->exists();
    }

    public function update(ProductRequest $request, $id)
    {
        // 商品更新
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        // 画像の保存
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('fruits-img', 'public');
            $product->image = basename($path);
        }

        $product->save();

         // 季節の更新
        if ($request->season) {
            $product->seasons()->sync($request->season); // 季節を更新
        }

        return redirect('/products' . $id)
        ->with('success', '商品が更新されました。')
        ->with('file_name', $product->image);
    }

    public function destroy($productId)
    {
    try {
        $product = Product::findOrFail($productId);
        $product->delete();
        $message = "製品の削除が完了しました。";

        return redirect('/products')->with('success', $message);
    } catch (\Exception $e) {
        // エラーメッセージをログに記録
        Log::error('製品削除中にエラーが発生しました: ' . $e->getMessage());

        return redirect('/products')->with('error', '製品の削除中にエラーが発生しました。');
        }
    }
}