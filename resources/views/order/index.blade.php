@extends('../base')

@section('title')
    Your Orders
@endsection

@section('content')
    <main>
        <h2 class="title">Your Orders</h2>

        @foreach ($orders as $order)
            @if (!isset($number))
                <div class="orders container">
                    <a href="#"
                        class="text cart__link link__button">{{ $number = $order->number }}<span>{{ $order->items }}</span><span
                            class="cart__prize" title="prize">${{ $order->prize }}</span></a>
                    <p class="order__date" href="#" title="date">{{ $order->created_at->format('d-M-Y H:i') }}</p>
            @endif

            {{-- if change the order number close the old div an open a new div --}}
            @if ($number != $order->number)
                </div>
                <div class="orders container">
                    <a href="#"
                        class="text cart__link link__button">{{ $number = $order->number }}<span>{{ $order->items }}</span><span
                            class="cart__prize" title="prize"> ${{ $order->prize }}</span></a>
                    <p class="order__date" >{{ $order->created_at->format('d-M-Y H:i') }}</p>
            @endif

            <div class="product--cart">
                <a href="{{ route('product.show', ['product' => $order->product['name']]) }}"><img class="product__img"
                        src="{{ asset('assets/imgs/' . $order->product->images()[0] . '.webp') }}"
                        alt="{{ $order->product->name }}"></a>
                <p class="text">{{ Str::limit($order->product->name, 20) }}</p>
                <p class="text cart__prize">${{ $order->product->prize }}</p>
            </div>
        @endforeach
        {{-- close the last div --}}
        </div>
    </main>
@endsection
