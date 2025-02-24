@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css')}}">
<link rel="stylesheet" href="{{ asset('css/index.css')}}">
@endsection

@section('content')

<div class="container">
        @if (session('success'))
            <div class="alert alert-success text-green-600 text-lg font-bold">
            {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger text-red-600 text-lg font-bold">
            {{ session('error') }}
            </div>
        @endif

    <h1>商品一覧</h1>

    <div class="add-product">
            <a href="{{ url('products/register') }}" class="create-btn"><span>+</span>商品を追加</a>
    </div>

    <div class="content">
        @include('layouts.search')

        <div class="product-container">
            @foreach($products as $product)
            <div class="product-card" onclick="location.href='{{ url('products/' . $product->id . '/detail') }}'">
                <img src="{{ asset('storage/fruits-img/' . $product->image) }}" alt="{{ $product->name }}">
                <div class="product-info">
                    <label class="product-name">{{ $product->name }}</label>
                    <label class="product-price">¥{{ number_format($product->price) }}</label>
                </div>
            </div>
            @endforeach
            @if($products->isEmpty())
            <p>商品が見つかりませんでした。</p>
            @endif
        </div>
    </div>

    <div class="pagination">
        <button class="prev" {{ $products->onFirstPage() ? 'disabled' : '' }} onclick="location.href='{{ $products->previousPageUrl() }}{{ request()->getQueryString() ? '&' . request()->getQueryString() : '' }}'">&lt;</button>
        @foreach (range(1, $products->lastPage()) as $i)
        <button class="{{ $i === $products->currentPage() ? 'active' : '' }}" onclick="location.href='{{ $products->url($i) }}{{ request()->getQueryString() ? '&' . request()->getQueryString() : '' }}'">
            {{ $i }}
        </button>
        @endforeach
        <button class="next" {{ !$products->hasMorePages() ? 'disabled' : '' }} onclick="location.href='{{ $products->nextPageUrl() }}{{ request()->getQueryString() ? '&' . request()->getQueryString() : '' }}'">&gt;</button>
    </div>
</div>

@endsection