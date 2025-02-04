@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css')}}">
@endsection

@section('content')

<div class="container">
    <h1>商品一覧</h1>

    <div class="add-product">
            <a href="/products/register" class="create-btn">+ 商品を追加</a>
    </div>

@include('layouts.search')

    <div class="product-grid">
    @foreach($products as $product)
    <div class="product-card" onclick="location.href='/products/{{ $product->id }}'">
        <img src="{{ asset('storage/fruits-img/' . $product->image) }}" alt="{{ $product->name }}">
        <h3>{{ $product->name }}</h3>
        <p>¥{{ number_format($product->price) }}</p>
    </div>
    @endforeach
    @if($products->isEmpty())
    <p>商品が見つかりませんでした。</p>
    @endif
</div>

    <div class="pagination">
        <button class="prev" {{ $products->onFirstPage() ? 'disabled' : '' }} onclick="location.href='{{ $products->previousPageUrl() }}'">&lt;</button>
        @foreach (range(1, $products->lastPage()) as $i)
        <button class="{{ $i === $products->currentPage() ? 'active' : '' }}" onclick="location.href='{{ $products->url($i) }}'">
            {{ $i }}
        </button>
        @endforeach
        <button class="next" {{ !$products->hasMorePages() ? 'disabled' : '' }} onclick="location.href='{{ $products->nextPageUrl() }}'">&gt;</button>
    </div>
</div>
@endsection