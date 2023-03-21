@extends('../base')

@section('title')
    Recharge Account
@endsection

@section('content')
    <main class="flexContainer">
        <h1 class="title">Your wallet</h1>
        <h2 class="title">Yo have: <span>${{Auth::user()->wallet}}</h2>
            <h2 class="title">Recharge</h2>
        <div class="wallet container flexContainer">
            <form method="post" class="form__section" action="{{route('user.recharge')}}">
                @csrf
                <input type="number" value="50" name="value" class="dnone">
                <input type='submit' href="#" value="$50" class="link__button">
            </form>
            <form class="form__section" method="post" action="{{route('user.recharge')}}">
                @csrf
                <input type="number" value="200" name="value" class="dnone">
                <input type="submit" value="$200" href="#" class="link__button">
            </form>
            <form class="form__section" method="post" action="{{route('user.recharge')}}">
                @csrf
                <input type="number" value="500" name="value" class="dnone">
                <input type="submit" href="#" class="link__button" value='$500'>
            </form>
            <form class="form__section" method="post" action="{{route('user.recharge')}}">
                @csrf
                <input type="number" value="500" name="value" class="dnone">
                <input type="submit" href="#" class="link__button" value='$500'>
            </form>
            <form class="form__section" method="post" action="{{route('user.recharge')}}">
                @csrf
                <input type="number" value="500" name="value" class="dnone">
                <input type="submit" href="#" class="link__button" value='$500'>
            </form>
            <form class="form__section" method="post" action="{{route('user.recharge')}}">
                @csrf
                <input type="number" value="500" name="value" class="dnone">
                <input type="submit" href="#" class="link__button" value='$500'>
            </form>
            <form class="form__section" method="post" action="{{route('user.recharge')}}">
                @csrf
                <input type="number" value="500" name="value" class="dnone">
                <input type="submit" href="#" class="link__button" value='$500'>
            </form>
            <form class="form__section" method="post" action="{{route('user.recharge')}}">
                @csrf
                <input type="number" value="500" name="value" class="dnone">
                <input type="submit" href="#" class="link__button" value='$500'>
            </form>
        </div>
    </main>
@endsection