@extends('../base')
@section('title')
    New Product
@endsection
@section('content')
    <main>
        <section class="item--container container section">
            <h1 class="title">New Product</h1>
            <div class="items showCard">
                @for ($i = 0; $i < 3; $i++)
                    <a href="{{ route('product.show', ['product' => $products[$i]['name']]) }}">
                        <div class="item card--type2">
                            <img class="product__img" src="{{ asset('assets/imgs/' . $products[$i]->images()[0] . '.png') }}"
                                alt="{{ $products[$i]->images()[0] }}">
                            <div class="cardText">
                                <h3 class="card__title">{{ Str::limit($products[$i]['name'], 15) }}</h3>
                                <p class="product__text">{{ $products[$i]['prize'] }}$</p>
                            </div>
                        </div>
                    </a>
                @endfor
            </div>
        </section>

        <section class="container section">
            <div class="titleContainer">
                <h2 class="cards__title">Categories</h2>
                <a href="#" class="cards__link link">More</a>
            </div>
            <div class="cards">
                @foreach ($products as $product)
                    <a href="{{ route('product.show', ['product' => $product['name']]) }}">
                        <div class="card">
                            <img class="card__img product__img"
                                src="{{ asset('assets/imgs/' . $product->images()[0] . '.png') }}"
                                alt="{{ $product->images()[0] }}">
                            <div class="cardText">
                                <h3 class="card__title">{{ Str::limit($product['name'], 15) }}</h3>
                                <p class="product__text">{{ $product['prize'] }}$</p>
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
                            <img class="card__img product__img"
                                src="{{ asset('assets/imgs/' . $product->images()[0] . '.png') }}"
                                alt="{{ $product->images()[0] }}">
                            <div class="cardText">
                                <h3 class="card__title">{{ Str::limit($product['name'], 15) }}</h3>
                                <p class="product__text">{{ $product['prize'] }}$</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    </main>
@endsection
