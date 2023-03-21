@extends('../base')
@section('title')
    Login
@endsection
@section('content')
    <main>
        <div class="login container">
            <h1 class="title">Login</h1>
            <form action="{{ route('user.auth') }}" class="form flexContainer" method="post">
                @csrf
                @if (Session()->has('email'))
                {!! Session()->forget('email') !!}
                {!! Session()->forget('password') !!}
                    <p class="error">Your email or password are wrong</p>
                @endif
                <fieldset class="form__section">
                    <label  for="email" class="form__label">Email</label>
                    <input required value="{{$user['email']}}" placeholder="Your Email" class="input" type="email" id='email' name="email">
                </fieldset>
                

                <fieldset class="form__section">
                    <label for="password" class="form__label">Password</label>
                    <input required value="{{$user['email']}}" placeholder="********" class="input" name="password" type="password" id="password">
                </fieldset>

                <input type="submit" value="Login" class="link__button">
                <a href="{{ route('user.create') }}" class="link__button">Sing in</a>
            </form>
        </div>
    </main>
@endsection
