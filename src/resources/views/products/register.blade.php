@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css')}}">
<link rel="stylesheet" href="{{ asset('css/register.css')}}">
@endsection

@section('content')

    <div class="container">
        <h2 class="title">商品登録</h2>
        <form action="/products/{productId}/update" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">商品名 <span class="required">必須</span></label>
                <input type="text" id="name" name="name" class="form-control" placeholder="商品名を入力" value="{{ old('name') }}" required />
            </div>
            @error('name')
                <span class="input_error">
                    @foreach ($errors->get('name') as $message)
                        <p class="input_error_message">{{ $message }}</p>
                    @endforeach
                </span>
            @enderror

            <div class="form-group">
                <label for="price">値段 <span class="required">必須</span></label>
                <input type="text" id="price" name="price" class="form-control" placeholder="値段を入力" value="{{ old('price') }}" required />
            </div>
            @error('price')
                <span class="input_error">
                    @foreach ($errors->get('price') as $message)
                        <p class="input_error_message">{{ $message }}</p>
                    @endforeach
                </span>
            @enderror

            <div class="form-group">
                <label for="image">商品画像 <span class="required">必須</span></label>
                <input type="file" id="image" name="image" class="form-control" required />
            </div>
            @error('image')
                <span class="input_error">
                    @foreach ($errors->get('image') as $message)
                        <p class="input_error_message">{{ $message }}</p>
                    @endforeach
                </span>
            @enderror

            <div class="form-group">
                <label>季節 <span class="required">必須（複数選択可）</span></label>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="season[]" value="春"> 春</label>
                    <label><input type="checkbox" name="season[]" value="夏"> 夏</label>
                    <label><input type="checkbox" name="season[]" value="秋"> 秋</label>
                    <label><input type="checkbox" name="season[]" value="冬"> 冬</label>
                </div>
            </div>
            @error('season')
                <span class="input_error">
                    @foreach ($errors->get('season') as $message)
                        <p class="input_error_message">{{ $message }}</p>
                    @endforeach
                </span>
            @enderror

            <div class="form-group">
                <label for="description">商品説明 <span class="required">必須</span></label>
                <textarea id="description" name="description" class="form-control" rows="4" placeholder="商品の説明を入力" required>{{ old('description') }}</textarea>
            </div>
            @error('description')
                <span class="input_error">
                    @foreach ($errors->get('description') as $message)
                        <p class="input_error_message">{{ $message }}</p>
                    @endforeach
                </span>
            @enderror

            <div class="button-group">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">戻る</a>
                <button type="submit" class="btn btn-primary">登録</button>
            </div>
        </form>
    </div>

@endsection