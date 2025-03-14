<link rel="stylesheet" href="{{ asset('css/common.css') }}">

<div class="search-container">
    <div class="sidebar">
        <div class="search-bar">
            <form method="GET" action="/products">
                <input type="text" name="query" placeholder="商品名で検索" value="{{ request('query') }}">
                <button type="submit" class="search-btn">検索</button>
            </form>
        </div>

        <div class="sort-options">
            <form method="GET" action="/products">
                <label for="sort">価格順で表示</label>
                <select id="sort" name="sort" onchange="this.form.submit()">
                    <option value="">価格で並べ替え</option>
                    <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>低い順に表示</option>
                    <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>高い順に表示</option>
                </select>
                <input type="hidden" name="query" value="{{ request('query') }}">
            </form>
            @if(@isset($sort)&& $sort != "")
                <div class="sort_contents">
                    <p class="searched_data">{{$sort}}</p>
                    <div class="close-content">
                        <a href="/products">
                            <img src="{{ asset('/images/close-icon.png') }}"  alt="閉じるアイコン" class="img-close-icon"/>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>