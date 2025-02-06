<div class="search-container">
    <div class="sidebar">
        <div class="search-bar">
            <form method="GET" action="/products">
                <input type="text" name="search" placeholder="商品名で検索" value="{{ request('search') }}">
                <button type="submit" class="search-btn">検索</button>
            </form>
        </div>

        <div class="sort-options">
            <form method="GET" action="/products">
                <label for="sort">価格順で並べ替え</label>
                <select id="sort" name="sort" onchange="this.form.submit()">
                    <option value="">選択してください</option>
                    <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>価格が低い順</option>
                    <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>価格が高い順</option>
                </select>
            </form>
        </div>
    </div>
</div>