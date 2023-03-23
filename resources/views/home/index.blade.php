@extends('../base')

@section('title')
    home
@endsection

@section('content')
    <main class="mainContent container">
        <picture class="pageName">
            <img src="{{ asset('assets/icons/name.svg') }}" alt="">
        </picture>
        <div class="mainProduct">
            @isset($random)
                <a href="{{ route('product.show', ['product' => $random['name']]) }}" title="product">
                    <div class="mainItem">
                        <img class="product__img" src="{{ asset('assets/imgs/' . $random->images()[0] . '.webp') }}"
                            alt="{{ $random->images()[0] }}">
                        <div class="cardText product__text">
                            <h4 class="card__title">{{ Str::limit($random['name'], 50) }}</h4>
                        </div>
                    </div>
                </a>
            @endisset
        </div>
        <div class="twingLink">
            <a href="{{route('product.index')}}" class="twingLink__link link__button" title="new">New Products</a>
            <a href="#" class="twingLink__link link__button" title="for You">For You</a>
        </div>
    </main>

    <section class="container section">
        <div class="titleContainer">
            <h2 class="cards__title">For You</h2>
            <a href="#" class="cards__link link" title="more">More</a>
        </div>
        <div class="cards">
            @foreach ($products->take(12) as $product)
                <a href="{{ route('product.show', ['product' => $product['name']]) }}" title="product">
                    <div class="card">
                        <img class="product__img" src="{{ asset('assets/imgs/' . $product->images()[0] . '.webp') }}"
                            alt="{{ $product->images()[0] }}">
                        <div class="product__text">
                            <h4 class="card__title ">{{ Str::limit($product['name'], 12) }}</h4>
                            <p class="card__text">{{ $product['prize'] }}$</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
    <section class="container section">
        <div class="titleContainer">
            <h2 class="cards__title">Categories</h2>
            <a href="{{ route('product.search') }}" class="cards__link link" title="more">More</a>
        </div>
        <div class="cards">
            @foreach ($categories as $category)
                <a href="{{ route('product.search', ['category' => $category['id']]) }}" title="category">
                    <div class="card--type3">
                        <div class="product__text">
                            <h4 class="card__title">{{ Str::limit($category['name'], 25) }}</h4>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    @foreach ($categories->take(4) as $category)
        <section class="container section">
            <div class="titleContainer">
                <h2 class="cards__title">{{ $category->name }}</h2>
                <a href="{{ route('product.search', ['category' => $category['id']]) }}" class="cards__link link" title="more">More</a>
            </div>
            <div class="cards">
                @foreach ($products->where('category_id', $category->id)->take(10) as $product)
                    <a href="{{ route('product.show', ['product' => $product['name']]) }}" title="product">
                        <div class="card">
                            <img class="product__img" src="{{ asset('assets/imgs/' . $product->images()[0] . '.webp') }}"
                                alt="{{ $product->images()[0] }}">
                            <div class="product__text">
                                <h4 class="card__title ">{{ Str::limit($product['name'], 12) }}</h4>
                                <p class="card__text">{{ $product['prize'] }}$</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    @endforeach
    
    <section class="container section">
        <div class="titleContainer">
            <h2 class="cards__title">More</h2>
        </div>
        <div class="showCard">
            @foreach ($products->take(30) as $product)
                <a href="{{ route('product.show', ['product' => $product['name']]) }}" title="product">
                    <div class="card--type2">
                        <img class="product__img" src="{{ asset('assets/imgs/' . $product->images()[0] . '.webp') }}"
                            alt="{{ $product->images()[0] }}">
                        <div class="cardText">
                            <h4 class="card__title">{{ Str::limit($product['name'], 15) }}</h4>
                            <p class="card__text">{{ $product['prize'] }}$</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
