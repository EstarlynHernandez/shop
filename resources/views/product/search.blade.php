@extends('../base')
@section('title')
    Search
@endsection

@section('content')
    <main>
        <h1 class="title">Product</h1>
        <form action="{{ route('product.search') }}" class="flexContainer container">
            <label for="category" class="form__label">Category</label>
            <select class="input" name="category" id="category">
                <option value="all">All</option>
                @foreach ($categories as $category)
                    <option @if (Request::get('category') == $category['id']) selected @endif value="{{ $category['id'] }}">
                        {{ $category['name'] }}</option>
                @endforeach
            </select>
            <label for="search" class="form__label">Search</label>
            <input placeholder="Search" value="{{ Request::get('search') }}" type="text" id="search" name="search"
                class="input">
            <input class="link__button" type="submit" value="Search">
        </form>
        <section class="container section">
            <div class="showCard">
                @foreach ($products as $product)
                    <a href="{{ route('product.show', ['product' => $product['name']]) }}">
                        <div class="card--type2">
                            <img class="product__img" src="{{ asset('assets/imgs/' . $product->images()[0] . '.webp') }}"
                                alt="{{ $product->images()[0] }}">
                            <div class="cardText">
                                <h4 class="cardText">{{ Str::limit($product['name'], 15) }}</h4>
                                <p class="card__text">{{ $product['prize'] }}$</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            @if ($products->hasPages())
                <div class="pages">
                    @if(!$products->onFirstPage())
                    <a class="pages__link"
                        href="{{ route('product.search', ['page' => $products->currentPage() - 1, 'category' => Request::get('category'), 'search' => Request::get('search')]) }}"><img
                            src="{{ asset('assets/icons/left.svg') }}" alt="previous"></a>
                    @endif
                    <p class="pages__text">{{ $products->currentPage() }} of {{ $products->lastPage() }}</p>
                    @if ($products->hasMorePages())
                        <a class="pages__link"
                            href="{{ route('product.search', ['page' => $products->currentPage() + 1, 'category' => Request::get('category'), 'search' => Request::get('search')]) }} ">
                            <img src="{{ asset('assets/icons/right.svg') }}" alt="next"></a>
                    @endif
                </div>
            @endif
        </section>
    </main>
@endsection
