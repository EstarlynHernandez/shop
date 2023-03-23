@extends('../base')

@section('title')
    Support
@endsection

@section('content')
    <main>
        <div class="questions container flexContainer">
            <h2 class="title">Frequent Questions</h2>
            <details class="question">
                <summary class="title question__title">How i make a order?</summary>
                <p class="title">This is a example page, you can't make a order in this page</p>
            </details>
            <details class="question">
                <summary class="title question__title">How i contact you?</summary>
                <p class="title">We have a web site to have more info about me. you can visit us through
                    this <a href="http://estarlyn.com" target="__blank" class="link">link</a>. you can also contact us through our <a class="link" href="mailto:estarlynhernandez@hotmail.com">Email</a> </p>
            </details>
            <details class="question">
                <summary class="title question__title">Where i buy this product?</summary>
                <p class="title">All of the products in this page are example product, you can buy some of this in
                    others stores</p>
            </details>
            <details class="question">
                <summary class="title question__title">What is this page for?</summary>
                <p class="title">This page is for show my programing abilities</p>
            </details>
            <a href="#" class="link__button">I have a question</a>
        </div>
    </main>
@endsection
