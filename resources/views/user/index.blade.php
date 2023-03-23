@extends('../base')
@section('title')
    {{ Auth::user()['name'] }}
@endsection

@section('content')
    <main>

        <section class="profile">
            <h1 class="title">{{ Auth::user()->name }}</h1>
            <div class="container">
                {{-- <h2 class="title">My Orders</h2> --}}
                <div class="userLinks">
                    <a href="{{route('order.index')}}" class="user__button">My Orders</a>
                    {{-- <a href="#" class="user__button">Traking</a> --}}
                </div>
            </div>
            <div class="container">
                {{-- <h2 class="title">My Info</h2> --}}
                <div class="userLinks">
                    <a href="{{route('user.show', ['user' => Auth::user()->name])}}" class="user__button">Info</a>
                    <a href="{{ route('user.wallet') }}" class="user__button">Wallet</a>
                </div>
            </div>
            <div class="container">
                <h2 class="title">More</h2>
                <div class="userLinks">
                    {{-- <a href="#" class="user__button">Config</a> --}}
                </div>
                <div class="container">
            </div>
                {{-- <h2 class="title">Help</h2> --}}
                <div class="userLinks">
                    <a href="{{route('questions')}}" class="user__button">Questions</a>
                    <a href="{{route('contact')}}" class="user__button">Contact Us</a>
                    <a href="{{route('privacy')}}" class="user__button">Privacy Politic</a>
                </div>
            </div>

        </section>
    </main>
@endsection
