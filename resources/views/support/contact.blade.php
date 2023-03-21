@extends('../base')
@section('title') 
    Contact
@endsection
@section('content')
    <form action="#" class="contact">
        <h2 class="contact__title">Contact Us</h2>
        <label for="name">Name</label>
        <input id="name" type="text" class="contact__input">

        <label for="email">Email</label>
        <input class="contact__input" type="text">

        <label for="message">You message</label>
        <textarea class="contact__textarea" name="message" id="message"></textarea>

        <input type="submit" value="Send" class="button">
    </form>
@endsection