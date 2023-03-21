@extends('../base')
@section('title')
    Sing in
@endsection
@section('content')
    <main>
        <div class="login container">
            <h1 class="title">Sing In</h1>
            <form action="{{ route('user.store') }}" class="form flexContainer" method="post">
                @csrf
                <fieldset class="form__section">
                    <label for="name" class="form__label">Name</label>
                    <input value="{{old('name')}}" placeholder="Your Name" class="input" type="text" id='name' name="name">
                    @if ($errors->has('name'))
                        <p class="error">{{ $errors->first('name') }}</p>
                    @endif
                </fieldset>

                <fieldset class="form__section">
                    <label for="lastname" class="form__label">Last Name</label>
                    <input value="{{old('lastname')}}" placeholder="Your Last Name" class="input" type="text" id="lastname" name="lastname">
                    @if ($errors->has('lastname'))
                        <p class="error">{{ $errors->first('lastname') }}</p>
                    @endif
                </fieldset class="form__section">

                <fieldset class="form__section">
                    <label for="email" class="form__label">Email</label>
                    <input value="{{old('email')}}" placeholder="Your Email" class="input" type="email" id='email' name="email">
                    @if ($errors->has('email'))
                        <p class="error">{{ $errors->first('email') }}</p>
                    @endif
                </fieldset>

                <fieldset class="form__section">
                    <label for="reemail" class="form__label">Repeat Email</label>
                    <input value="{{old('reemail')}}" placeholder="Repeat Email" class="input" type="email" id='reemail' name="reemail">
                    @if ($errors->has('reemail'))
                        <p class="error">{{ $errors->first('reemail') }}</p>
                    @endif
                </fieldset>

                <fieldset class="form__section">
                    <label for="password" class="form__label">Password</label>
                    <input placeholder="********" class="input" type="password" id="password" name="password">
                    @if ($errors->has('password'))
                        <p class="error">{{ $errors->first('password') }}</p>
                    @endif
                </fieldset>

                <fieldset class="form__section">
                    <label for="repassword" class="form__label">Repeat Password</label>
                    <input placeholder="********" class="input" type="password" id="repassword" name="repassword">
                    @if ($errors->has('repassword'))
                        <p class="error">{{ $errors->first('repassword') }}</p>
                    @endif
                </fieldset>

                <input type="submit" value="Sing in" class="link__button">
                <a href="{{ route('user.login') }}" class="link__button">Login</a>
            </form>
        </div>
    </main>
@endsection
