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
                <p class="error">Your money aren't enought, please <a class="cart__prize"
                        href="{{ route('user.wallet') }}" title="Recharge">recharge</a></p>
            @endif
            @isset($carts)
                @if (count($carts) > 5)
                    <form class="form__section" method="post" action="{{ route('order.store') }}">
                        @csrf
                        <input type="submit" class="link__button button" value="Buy">
                    </form>
                    <h4 class="carts__prize">Total: <span class="cart__prize">${{ $prize }}</span></h4>
                @endif
                <div class="products--cart">
                    @foreach ($carts as $cart)
                        <a href="{{ route('product.show', ['product' => $cart->product['name']]) }}" title="product">
                            <div class="product--cart">

                                <img class="product__img" src="{{ asset('assets/imgs/' . $cart->product->images()[0] . '.webp') }}"
                                    alt="{{ $cart->product->name }}">
                                <p class="text">{{ Str::limit($cart->product->name, 20) }}</p>
                                <p class="text cart__prize">${{ $cart->product->prize }}</p>
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
                <h4 class="carts__prize">Total: <span class="cart__prize">${{ $prize }}</span></h4>
                <form class="form__section" method="post" action="{{ route('order.store') }}">
                    @csrf
                    <input type="submit" class="link__button" value="Buy">
                </form>
            @else
                <h4 class="title">Your Cart is empty</h4>
                <a href="{{ route('product.index') }}" class="link__button" title="Buy">Buy Something</a>
            @endisset


        </section>

        <section class="container section">
            <div class="titleContainer">
                <h2 class="cards__title">For You</h2>
                <a href="#" class="cards__link link" title="more">More</a>
            </div>
            <div class="cards">
                @foreach ($products->take(30) as $product)
                    <a href="{{ route('product.show', ['product' => $product['name']]) }}" title="Product">
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

        <section class="section">
            <div class="titleContainer">
                <h2 class="cards__title">Other Products</h2>
            </div>
            <div class="showCard">
                @foreach ($products->take(60) as $product)
                    <a href="{{ route('product.show', ['product' => $product['name']]) }}" title="Product">
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
    </main>
@endsection
