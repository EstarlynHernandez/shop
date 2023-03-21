@extends('./base')

@section('title')
    Thanks for your order
@endsection

@section('content')
    <section class="container">
        <h1 class="title">Your product is in your cart</h1>
        <picture class="thanks__img">
            <img src="{{ asset('assets/imgs/' . $product->images[0] . '.png') }}" alt="">
            <h3 class="thans__text">{{ $product->name }}</h3>
        </picture>
        <div class="flexContainer">
            <a href="{{ route('cart.index') }}" class="link__button">Go to cart</a>
            <a href="{{ route('home') }}" class="link__button">Continue</a>
        </div>
    </section>

    <section class="container section">
        <div class="titleContainer">
            <h2 class="cards__title">Maybe you might like</h2>
            <a href="#" class="cards__link link">More</a>
        </div>
        <div class="cards">
            @foreach ($products as $product)
                <a href="{{ route('product.show', ['product' => $product['name']]) }}">
                    <div class="card">
                        <img class="card__img product__img"
                            src="{{ asset('assets/imgs/' . $product->images()[0] . '.png') }}"
                            alt="{{ $product->images()[0] }}">
                        <div class="product__text">
                            <h3 class="card__title">{{ Str::limit($product['name'], 12) }}</h3>
                            <p class="card__text">{{ $product['prize'] }}$</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
