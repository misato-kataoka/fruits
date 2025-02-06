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
<form method="POST" action="{{ url('/products/' . $product->id . '/update') }}"enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="product-details">
        <img src="{{ asset('storage/fruits-img/' . $product->image) }}" alt="{{ $product->name }}" class="prodct-image">
        <div class="file-selection">
            <input type="file" id="image" name="image" accept="image/*" class="file-input">
            <button type="button" class="select-file-button" onclick="document.getElementById('image').click();">ファイルを選択</button>
            <span>{{ session('file_name', $product->image) }}</span> <!-- 既存の画像名を表示 -->

            @error('image')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="product-info">
            <label for="product-name">商品名</label>
            <input type="text" id="product-name" name="name" value="{{ $product->name }}">

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="price">値段</label>
            <input type="number" id="price" name="price" value="{{ $product->price }}">

            @error('price')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>季節</label>
            <div class="season-options">
                @foreach($product->seasons as $season)
                    <label>
                        <input type="radio" name="season" value="{{ $season->name}}" {{ $product->season === $season->name ? 'checked' : '' }}> {{ $season->name }}
                    </label>

                @endforeach
                @error('season')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <label for="description">商品説明</label>
            <textarea id="description" name="description">{{ $product->description }}</textarea>

            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="button-group">
                <button class="btn back" onclick="history.back()">戻る</button>
                <button class="btn save">変更を保存</button>
                <button type="button" class="btn delete" onclick="confirmDelete()">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    </div>
</form>

</div>

@endsection