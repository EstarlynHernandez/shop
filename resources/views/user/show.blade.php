@extends('../base')
@section('title')
    {{ Auth::user()['name'] }}
@endsection

@section('content')
    <main>

        <section class="flexContainer container">
            <h1 class="title">{{ Auth::user()->name }}</h1>
            <div class="flexContainer">
                <h2 class="title">My Info</h2>
                <p class="text">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</p>
                <p class="text">{{ Auth::user()->email }}</p>
                <p class="text">{{ Auth::user()->birtdate }}</p>
            </div>
            <a href="#" class="link__button">Edit</a>
            <div class="flexContainer">
                <h2 class="title">Address</h2>
                @isset($address)
                    <p class="text">{{ $address['address'] }}</p>
                @endisset
            </div>
            <div class="flexContainer">
                <a href="{{ route('user.address') }}" class="link__button">@if(isset($address))edit Address @else Add Address @endif</a>
            </div>
            <div class="flexContainer">
                <h2 class="title">Help</h2>
                <a href="{{ route('questions') }}" class="link__button">Questions</a>
                <a href="{{ route('contact') }}" class="link__button">Contact Us</a>
                <a href="{{ route('privacy') }}" class="link__button">Privacy Politic</a>
            </div>

        </section>
    </main>
@endsection
