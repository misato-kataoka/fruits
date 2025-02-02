<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

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

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function register()
    {
        return view('products.register');
    }

    public function store(ProductRequest $request)
    {
        // 商品登録ロジック
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->season = $request->season;
        $product->description = $request->description;

        // 画像の保存
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('fruits-img', 'public');
            $product->image = $path;
        }

        $product->save();

        return redirect('/products')->with('success', '商品が登録されました。');
    }

    public function update(ProductRequest $request, $id)
    {
        // 商品更新ロジック
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->season = $request->season;
        $product->description = $request->description;

        // 画像の保存
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('fruits-img', 'public');
            $product->image = $path;
        }

        $product->save();

        return redirect('/products/' . $id)->with('success', '商品が更新されました。');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('success', '商品が削除されました。');
    }
}