@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')

<div class="product-container">
    <h1>{{ $product->name }}の商品詳細</h1>
    @include('layouts.search')

    <div class="product-card" onclick="location.href='/products/{{ $product->id }}'">
        <img src="{{ asset('storage/fruits-img/' . $product->image) }}" alt="{{ $product->name }}">
        <div class="product-info">
            <label class="product-name">{{ $product->name }}</label>
            <label class="product-price">¥{{ number_format($product->price) }}</label>
        </div>
    </div>
</div>

@endsection