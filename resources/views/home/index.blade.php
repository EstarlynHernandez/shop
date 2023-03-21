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

            <a href="{{ route('product.show', ['product' => $rProduct['name']]) }}">
                <div class="mainItem">
                    <img class="product__img" src="{{ asset('assets/imgs/' . $rProduct->images()[0] . '.png') }}"
                        alt="{{ $rProduct->images()[0] }}">
                    <div class="cardText product__text">
                        <h3 class="card__title">{{ Str::limit($rProduct['name'], 50) }}</h3>
                    </div>
                </div>
            </a>

        </div>
        <div class="twingLink">
            <a href="#" class="twingLink__link link__button">New offers</a>
            <a href="#" class="twingLink__link link__button">For You</a>
        </div>
    </main>

    {{-- <section class="dailyProduct">
        <h1 class="dailyProduct__title">Daily Product</h1>
        <h3 class="mainItem__title">{{ Str::limit($products[$i]['name'], 10) }}</h3>
        <p class="mainItem__text">{{ Str::limit($products[$i]['description'], 15) }}</p>
    </section> --}}

    <section class="container section">
        <div class="titleContainer">
            <h2 class="cards__title">For You</h2>
            <a href="#" class="cards__link link">More</a>
        </div>
        <div class="cards">
            @foreach ($products->take(30) as $product)
                <a href="{{ route('product.show', ['product' => $product['name']]) }}">
                    <div class="card">
                        <img class="product__img" src="{{ asset('assets/imgs/' . $product->images()[0] . '.png') }}"
                            alt="{{ $product->images()[0] }}">
                        <div class="product__text">
                            <h3 class="card__title ">{{ Str::limit($product['name'], 12) }}</h3>
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
            <a href="{{route('product.search')}}" class="cards__link link">More</a>
        </div>
        <div class="cards">
            @foreach ($categories as $category)
                <a href="{{ route('product.search', ['category' => $category['id']]) }}">
                    <div class="card--type3">
                        {{-- <img class="card__img product__img"
                            src="{{ asset('assets/imgs/' . $product->images()[0] . '.png') }}"
                            alt="{{ $product->images()[0] }}"> --}}
                        <div class="product__text">
                            <h3 class="card__title">{{ Str::limit($category['name'], 25) }}</h3>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
    <section class="container section">
        <div class="titleContainer">
            <h2 class="cards__title">All</h2>
        </div>
        <div class="showCard">
            @foreach ($products as $product)
                <a href="{{ route('product.show', ['product' => $product['name']]) }}">
                    <div class="card--type2">
                        <img class="product__img" src="{{ asset('assets/imgs/' . $product->images()[0] . '.png') }}"
                            alt="{{ $product->images()[0] }}">
                        <div class="cardText">
                            <h3 class="card__title">{{ Str::limit($product['name'], 15) }}</h3>
                            <p class="card__text">{{ $product['prize'] }}$</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
