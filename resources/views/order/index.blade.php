@extends('../base')

@section('title')
    Your Orders
@endsection

@section('content')
    <main>
        <h2 class="title">Your Orders</h2>

        @foreach ($orders as $order)
            <div class="orders container">
                <a href="#" class="text link__button">{{ $order->number }}</a>
            </div>
        @endforeach
    </main>
@endsection
