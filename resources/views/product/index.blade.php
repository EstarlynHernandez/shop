@extends('../base')
@section('title')
    New Product
@endsection
@section('content')
    <main>
        <section class="item--container container section">
            <h1 class="title">New Product</h1>
            <div class="items showCard">
                @foreach ($new as $product)
                    <a href="{{ route('product.show', ['product' => $product['name']]) }}">
                        <div class="item card--type2">
                            <img class="product__img" src="{{ asset('assets/imgs/' . $product->images()[0] . '.png') }}"
                                alt="{{ $product->images()[0] }}">
                            <div class="cardText">
                                <h4 class="card__title">{{ Str::limit($product['name'], 15) }}</h4>
                                <p class="product__text">{{ $product['prize'] }}$</p>
                            </div>
                        </div>
                    </a>
                @endforeach
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
                                <h4 class="card__title">{{ Str::limit($product['name'], 15) }}</h4>
                                <p class="product__text">{{ $product['prize'] }}$</p>
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
                    <a href="{{ route('product.search', ['category' => $category['id']]) }}"
                        class="cards__link link">More</a>
                </div>
                <div class="cards">
                    @foreach ($products->where('category_id', $category->id)->take(10) as $product)
                        <a href="{{ route('product.show', ['product' => $product['name']]) }}">
                            <div class="card">
                                <img class="product__img"
                                    src="{{ asset('assets/imgs/' . $product->images()[0] . '.png') }}"
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
    </main>
@endsection
