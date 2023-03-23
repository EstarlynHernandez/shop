@extends('../base')

@section('title')
    Recharge Account
@endsection

@section('content')
    <main class="flexContainer">
        <h1 class="title">Your wallet</h1>
        <h2 class="title">Yo have: <span class="cart__prize wallet__count">${{Auth::user()->wallet}}</h2>
            <h2 class="title">Recharge</h2>
        <div class="wallet container group">
            <form method="post" class="recharge" action="{{route('user.recharge')}}">
                @csrf
                <input type="number" value="50" name="value" class="dnone">
                <input type='submit' value="$50" class="recharge__text">
            </form>
            <form class="recharge" method="post" action="{{route('user.recharge')}}">
                @csrf
                <input type="number" value="100" name="value" class="dnone">
                <input type="submit" value="$100" class="recharge__text">
            </form>
            <form class="recharge" method="post" action="{{route('user.recharge')}}">
                @csrf
                <input type="number" value="200" name="value" class="dnone">
                <input type="submit" class="recharge__text" value='$200'>
            </form>
            <form class="recharge" method="post" action="{{route('user.recharge')}}">
                @csrf
                <input type="number" value="300" name="value" class="dnone">
                <input type="submit" class="recharge__text" value='$300'>
            </form>
            <form class="recharge" method="post" action="{{route('user.recharge')}}">
                @csrf
                <input type="number" value="400" name="value" class="dnone">
                <input type="submit" class="recharge__text" value='$400'>
            </form>
            <form class="recharge" method="post" action="{{route('user.recharge')}}">
                @csrf
                <input type="number" value="500" name="value" class="dnone">
                <input type="submit" class="recharge__text" value='$500'>
            </form>
            <form class="recharge" method="post" action="{{route('user.recharge')}}">
                @csrf
                <input type="number" value="1000" name="value" class="dnone">
                <input type="submit" class="recharge__text" value='$1000'>
            </form>
            <form class="recharge" method="post" action="{{route('user.recharge')}}">
                @csrf
                <input type="number" value="2000" name="value" class="dnone">
                <input type="submit" class="recharge__text" value='$2000'>
            </form>
        </div>
    </main>
@endsection