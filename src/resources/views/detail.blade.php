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
            <input type="text" id="product-name" name="name" placeholder="{{ $product->name }}">

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="price">値段</label>
            <input type="text" id="price" name="price" placeholder="{{ $product->price }}">

            @error('price')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>季節</label>
            <div class="season-checkboxes">
                @foreach ($seasons as $season)
                    <label for="season">{{$season->name}}</label>
                    @if($product->checkSeason($season->id) == false)
                        <input type="checkbox" id="season_{{$season->id}}" value="{{$season->id}}">
                    @elseif($product->checkSeason($season->id) == true)
                        <input type="checkbox" id="season_{{$season->id}}" value="{{$season->id}}" checked>
                    @endif
                @endforeach
            </div>

            <label for="description">商品説明</label>
            <textarea id="description" name="description">{{ $product->description }}</textarea>

            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="button-content">
                <a href="/products" class="back">戻る</a>
                <form action="{{ url('/products/' . $product->id . '/update') }}" method="POST" style="display: inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="button-change">変更を保存</button>
                </form>
                <div class="trash-can-content">
                    <form action="{{ url('/products/' . $product->id . '/delete') }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('本当に削除しますか？');" class="delete-button">
                                <img src="{{ asset('/images/trash-can.png') }}" alt="ゴミ箱の画像" class="img-trash-can"/>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>

</div>

@endsection