@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="container">
    <nav class="info">
        <a href="/products">商品一覧</a> &gt; {{ $product->name }}
    </nav>
    <div class="product-details">
        <img src="{{ asset('storage/fruits-img/' . $product->image) }}" alt="{{ $product->name }}">
        <div class="product-info">
            <label for="product-name">商品名</label>
            <input type="text" id="product-name" value="{{ $product->name }}" readonly>

            <label for="price">値段</label>
            <input type="number" id="price" value="{{ $product->price }}" readonly>

            <label>季節</label>
            <div class="season-options">
                @foreach($product->seasons as $season)
                    <label>
                        <input type="radio" name="season" value="{{ $season->name}}" disabled> {{ $season->name }}
                    </label>
                @endforeach
            </div>

            <label for="description">商品説明</label>
            <textarea id="description" readonly>{{ $product->description }}</textarea>

            <div class="button-group">
                <button class="btn back" onclick="history.back()">戻る</button>
                <button class="btn save">変更を保存</button>
                <button class="btn delete">削除</button>
            </div>
        </div>
    </div>
</div>

@endsection