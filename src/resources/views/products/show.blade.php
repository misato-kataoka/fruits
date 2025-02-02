@extends('layouts.app')

@section('content')
<div class="container">
    <h1>"{{ $product->name }}"の商品一覧</h1>

@include('layouts.search')

        <img src="{{ asset('storage/fruits-img/' . $product->image) }}" alt="{{ $product->name }}">
        <p>価格: ¥{{ number_format($product->price) }}</p>
        <p>{{ $product->description }}</p>
</div>
@endsection