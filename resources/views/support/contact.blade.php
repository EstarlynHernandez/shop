@extends('../base')
@section('title')
    Contact
@endsection
@section('content')
    <form method="post" action="{{ route('contact') }}" class="contact form flexContainer container">
        @csrf
        <h2 class="title">Contact Us</h2>

        <fieldset class="form__section">
            <label class="form__label" for="name">Name</label>
            <input id="name" type="text" name="name" class="input">
            @if ($errors->has('name'))
                <p class="error">{{ $errors->first('name') }}</p>
            @endif
        </fieldset>

        <fieldset class="form__section">
            <label class="form__label" for="email">Email</label>
            <input class="input" name="email" type="text">
            @if ($errors->has('email'))
                <p class="error">{{ $errors->first('email') }}</p>
            @endif
        </fieldset>

        <fieldset class="form__section">
            <label class="form__label" for="message">You message</label>
            <textarea class="textarea" name="message" id="message"></textarea>
            @if ($errors->has('name'))
                <p class="error">{{ $errors->first('message') }}</p>
            @endif
        </fieldset>

        <input type="submit" value="Send" class="link__button">
    </form>
@endsection
