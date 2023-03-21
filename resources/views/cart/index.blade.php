@extends('../base')
@section('title')
    Cart
@endsection

@section('content')
    <main class="container">
        <section class="flexContainer cart--view">
            <h1 class="title">Cart</h1>
            @if (Session::get('wallet'))
                {!! Session::forget('wallet') !!}
                <p class="error">Your money aren't enought, please <a class="carts__prize--span"
                        href="{{ route('user.wallet') }}">recharge</a></p>
            @endif
            @isset($products)
                @if (count($carts) > 5)
                    <form class="form__section" method="post" action="{{ route('order.store') }}">
                        @csrf
                        <input type="submit" class="link__button button" value="Buy">
                    </form>
                    <h3 class="carts__prize">Total: <span class="carts__prize--span">${{ $prize }}</span></h3>
                @endif
                <div class="products--cart">
                    @foreach ($carts as $cart)
                        <a href="{{ route('product.show', ['product' => $cart->product['name']]) }}">
                            <div class="product--cart">

                                <img class="product__img" src="{{ asset('assets/imgs/' . $cart->product->images[0] . '.png') }}"
                                    alt="{{ $cart->product->name }}">
                                <p class="text">{{ Str::limit($cart->product->name, 20) }}</p>
                                <p class="text">${{ $cart->product->prize }}</p>
                                <form method="post" action="{{ route('cart.destroy', ['cart' => $cart->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="delete__icon" type="submit">
                                        <img src="{{ asset('assets/icons/light-delete.svg') }}" alt="delete">
                                    </button>
                                </form>
                            </div>
                        </a>
                    @endforeach
                </div>
                <h3 class="carts__prize">Total: <span class="carts__prize--span">${{ $prize }}</span></h3>
                <form class="form__section" method="post" action="{{ route('order.store') }}">
                    @csrf
                    <input type="submit" class="link__button" value="Buy">
                </form>
            @else
                <h3 class="title">Your Cart is empty</h3>
                <a href="{{ route('product.index') }}" class="link__button">Buy Something</a>
            @endisset


        </section>

        <section class="container section">
            <div class="titleContainer">
                <h2 class="cards__title">For You</h2>
                <a href="#" class="cards__link link">More</a>
            </div>
            <div class="cards">
                @foreach ($products->take(30) as $product)
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

        <section class="section">
            <div class="titleContainer">
                <h2 class="cards__title">Other Products</h2>
            </div>
            <div class="showCard">
                @foreach ($products->take(60) as $product)
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
    </main>
@endsection
