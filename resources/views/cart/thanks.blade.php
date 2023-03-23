@extends('./base')

@section('title')
    Thanks for your order
@endsection

@section('content')
    <section class="container">
        <h1 class="title">Your product is in your cart</h1>
        <picture class="thanks__img">
            <img src="{{ asset('assets/imgs/' . $product->images()[0] . '.webp') }}" alt="">
            <h4 class="thans__text">{{ $product->name }}</h4>
        </picture>
        <div class="flexContainer">
            <a href="{{ route('cart.index') }}" class="link__button" title="cart">Go to cart</a>
        </div>
    </section>

    <section class="container section">
        <div class="titleContainer">
            <h2 class="cards__title">You might like</h2>
            <a href="#" class="cards__link link" title="more">More</a>
        </div>
        <div class="cards">
            @foreach ($products as $product)
                <a href="{{ route('product.show', ['product' => $product['name']]) }}" title="product">
                    <div class="card">
                        <img class="card__img product__img"
                            src="{{ asset('assets/imgs/' . $product->images()[0] . '.webp') }}"
                            alt="{{ $product->images()[0] }}">
                        <div class="product__text">
                            <h4 class="card__title">{{ Str::limit($product['name'], 12) }}</h4>
                            <p class="card__text">{{ $product['prize'] }}$</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
