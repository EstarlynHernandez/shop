@extends('../base')
@section('title')
    Category
@endsection

@section('content')
    <main>
        <h1 class="title">Product</h1>
        <details class="container">
            <summary class="summary">Filter</summary>
            <form action="{{ route('product.search') }}" class="flexContainer">
                <label for="category" class="form__label">Category</label>
                <select class="input" name="category" id="category">
                    <option value="all">All</option>
                    @foreach ($categories as $category)
                        <option @if (Request::get('category') == $category['id']) selected @endif value="{{ $category['id'] }}">
                            {{ $category['name'] }}</option>
                    @endforeach
                </select>
                <label for="category" class="form__label">Search</label>
                <input placeholder="Search" value="{{ Request::get('search') }}" type="text" name="search" class="input">
                <input class="link__button" type="submit" value="Search">
            </form>
        </details>
        <section class="container section">
            <div class="showCard">
                @foreach ($products as $product)
                    <a href="{{ route('product.show', ['product' => $product['name']]) }}">
                        <div class="card--type2">
                            <img class="product__img" src="{{ asset('assets/imgs/' . $product->images()[0] . '.png') }}"
                                alt="{{ $product->images()[0] }}">
                            <div class="cardText">
                                <h3 class="cardText">{{ Str::limit($product['name'], 15) }}</h3>
                                <p class="card__text">{{ $product['prize'] }}$</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    </main>
@endsection
