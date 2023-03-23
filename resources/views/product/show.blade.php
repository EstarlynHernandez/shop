@extends('../base')

@section('title')
    product
@endsection

@section('content')
    <main>
        <section class="product container">
            <picture class="product__img">
                <img src="{{ asset('assets/imgs/' . $product->images()[0] . '.png') }}"
                    alt="{{ Str::limit($product['name'], 10) }}">
            </picture>
            <div class="productDescription">
                <h2 class="title" title="{{ $product['name'] }}">{{ Str::limit($product['name'], 50) }}</h2>
                <p class="text">{{ Str::limit($product['description'], 100) }}</p>
                <a href="#description" class="link">More</a>
            </div>
            @if ($product->amount < 200)
                <p class="text">Remains: <span class="link">{{ $product->amount }}</span></p>
            @endif
            <div class="twingLink">
                @if ($product->amount > 0)
                    <form method="post" action="{{ route('order.one') }}">
                        <input type="number" class="dnone" name="product" value="{{ $product['id'] }}">
                        @csrf
                        <input type="submit" value="Buy" class="link__button twingLink__link">
                    </form>
                    <form method="post" action="{{ route('cart.store') }}">
                        <input type="number" class="dnone" name="product" value="{{ $product['id'] }}">
                        @csrf
                        <input type="submit" value="Add to Cart" class="link__button twingLink__link">
                    </form>
                @else
                    <p class="button link__button">Out of stock</p>
                @endif
            </div>
        </section>

        <section class="container section">
            <div class="titleContainer">
                <h2 class="card__title">Buy Togeter</h2>
            </div>
            <div class="cards">
                @foreach ($products->where('type_id', $product->type_id) as $produc)
                    <a href="{{ route('product.show', ['product' => $produc['name']]) }}">
                        <div class="card">
                            <img class="product__img" src="{{ asset('assets/imgs/' . $produc->images()[0] . '.png') }}"
                                alt="{{ $produc->images()[0] }}">
                            <div class="cardText">
                                <h4 class="card__title">{{ Str::limit($produc['name'], 15) }}</h4>
                                <p class="text">{{ $produc['prize'] }}$</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        <section class="specifications container">
            <h2 class="title">Specifications</h2>
            <table class="specificationsTable">
                @for ($i = 1; $i < count((array) $product->table) - 15; $i++)
                    <tr class="table">
                        <td class="table__text text">{{ $product->type->table['field_' . $i] }}</td>
                        <td class="table__text text">{{ $product->table['field_' . $i] }}</td>
                    </tr>
                @endfor
            </table>
        </section>

        <section class="description container">
            <h2 class="title" id='description'>Description</h2>
            <p class="text">{{ $product['description'] }}</p>
        </section>
    </main>

    <section class="container">
        <div class="tittleContainer">
            <h2 class="cards__title">Others</h2>
        </div>
        <div class="cards">
            @foreach ($products->where('category_id', $product->category_id) as $product)
                <a href="{{ route('product.show', ['product' => $product['name']]) }}">
                    <div class="card">
                        <img class="product__img" src="{{ asset('assets/imgs/' . $product->images()[0] . '.png') }}"
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
