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
            @error('name')
                <span class="input_error">
                    @foreach ($errors->get('name') as $message)
                        <p class="input_error_message">{{ $message }}</p>
                    @endforeach
                </span>
            @enderror
            </div>

            <div class="form-group">
                <label for="price">値段 <span class="required">必須</span></label>
                <input type="text" id="price" name="price" class="form-control" placeholder="値段を入力" value="{{ old('price') }}" required />
            @error('price')
                <span class="input_error">
                    @foreach ($errors->get('price') as $message)
                        <p class="input_error_message">{{ $message }}</p>
                    @endforeach
                </span>
            @enderror
            </div>

            <div class="form-group">
                <label for="image">商品画像 <span class="required">必須</span></label>
                <input type="file" id="image" name="image" class="form-control" required />
            @error('image')
                <span class="input_error">
                    @foreach ($errors->get('image') as $message)
                        <p class="input_error_message">{{ $message }}</p>
                    @endforeach
                </span>
            @enderror
            </div>

            <div class="form-group">
                <label>季節 <span class="required">必須</span><span class="note">複数選択可</span></label>
                <div class="season-checkboxes">
                    @foreach ($seasons as $season)
                        <div class="checkbox-item">
                            <input type="checkbox" id="season_{{ $season->id }}" value="{{$season->id}}" name="season[]">
                            <label for="season_{{ $season->id }}">{{$season->name}}</label>
                        </div>
                    @endforeach
                </div>
                @error('season')
                    <span class="input_error">
                        @foreach ($errors->get('season') as $message)
                            <p class="input_error_message">{{ $message }}</p>
                        @endforeach
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">商品説明 <span class="required">必須</span></label>
                <textarea id="description" name="description" class="form-control" rows="4" placeholder="商品の説明を入力" required>{{ old('description') }}</textarea>
            @error('description')
                <span class="input_error">
                    @foreach ($errors->get('description') as $message)
                        <p class="input_error_message">{{ $message }}</p>
                    @endforeach
                </span>
            @enderror
            </div>

            <div class="button-group">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">戻る</a>
                <button type="submit" class="btn btn-primary">登録</button>
            </div>
        </form>
    </div>

@endsection