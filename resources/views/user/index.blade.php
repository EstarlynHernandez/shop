@extends('../base')
@section('title')
    {{ Auth::user()['name'] }}
@endsection

@section('content')
    <main>

        <section class="profile">
            <h1 class="title">{{ Auth::user()->name }}</h1>
            <div class="container flexContainer">
                <h2 class="title">My Orders</h2>
                <a href="{{route('order.index')}}" class="link__button">My Orders</a>
                <a href="#" class="link__button">Traking</a>
            </div>
            <div class="container flexContainer">
                <h2 class="title">My Info</h2>
                <a href="{{route('user.show', ['user' => Auth::user()->name])}}" class="link__button">Info</a>
                <a href="#" class="link__button">Wallet</a>
            </div>
            <div class="container flexContainer">
                <h2 class="title">Config</h2>
                <a href="#" class="link__button">Config</a>
            </div>
            <div class="container flexContainer">
                <h2 class="title">Help</h2>
                <a href="{{route('questions')}}" class="link__button">Questions</a>
                <a href="{{route('contact')}}" class="link__button">Contact Us</a>
                <a href="{{route('privacy')}}" class="link__button">Privacy Politic</a>
            </div>

        </section>
    </main>
@endsection
