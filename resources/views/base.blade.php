<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/desktop.css') }}" media="only screen and (min-width:900px)">
</head>

<body>

    {{-- Clasic Menu --}}
    <header class="header">
        <picture class="iconMenu">
            <img src="{{ asset('assets/icons/light-menu.svg') }}" alt="menu" title="Menu">
        </picture>
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/icons/logo.svg') }}" alt="">
            </a>
        </div>
        <nav class="nav">
            <ul class="nav--ul">
                <li class="nav__item"><a class="nav__link" href="{{ route('home') }}">Home</a></li>
                <li class="nav__item"><a class="nav__link" href="{{ route('product.search') }}">Categories</a>
                    <ul class="submenu">
                        @foreach (Session()->get('category') as $category)
                            <li>
                                <a class="submenu__link nav__link"
                                    href="{{ route('product.search', ['category' => $category['id']]) }}">{{ $category['name'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav__item"><a class="nav__link" href="{{ route('product.index') }}">New</a></li>
            </ul>
        </nav>
        <form class="search" action="{{ route('product.search') }}">
            <input name="search" placeholder="Search" class="search__input" type="text" title="search">
            <button type="submit" href="{{ route('product.search') }}" class="search__link">
                <img src="{{ asset('assets/icons/light-search.svg') }}" alt="Search" title="search">
            </button>
        </form>
        <section class="userM">
            <a href="{{ route('cart.index') }}" class="cart">
                <p class="cart__count">
                    @isset(Auth::user()->cart)
                        {{ Auth::user()->cart }}
                    @else
                        0
                    @endisset
                </p>
                <div class="user__link cart__icon" href="#">
                    <img src="{{ asset('assets/icons/cart.svg') }}" alt="cart">
                </div>
            </a>
            <div class="user cart">
                <a href="{{ route('user.index') }}" class="user__link" href="#">
                    <img src="{{ asset('assets/icons/user.svg') }}" alt="cart">
                </a>
                <ul class="submenu">
                    @if (Auth::user())
                        <li><a href="{{ route('user.wallet') }}"
                                class="money cart__prize">${{ Auth::user()->wallet }}</a></li>

                        <a href="{{ route('order.index') }}" class="money">My Orders</a>
                        <a href="{{route('user.show', ['user' => Auth::user()->name])}}" class="money">Info</a>
                        <form method="post" action="{{ route('user.loggout') }}">
                            @csrf
                            @method('delete')
                            <input type="submit" class="money" value="Loggout">
                        </form>
                    @endif
                </ul>
            </div>
        </section>

        {{-- Mobile Menu --}}
        <div class="mobileMenu container dnone">
            <div class="twingHome">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/icons/name.svg') }}" alt="Home" title="logo">
                </a>
                <div class="close">
                    <img src="{{ asset('assets/icons/light-delete.svg') }}" alt="Close" title="close">
                </div>
            </div>
            @if (Auth::user())
                <div class="mobileUser">
                    <div class="user--mobileMenu">
                        <a href="{{ route('user.index') }}" class="mobileUserImg">
                            <img src="{{ asset('assets/icons/' . (Auth::user()->image ? Auth::user()->image : 'user.svg')) }}"
                                alt="User" title="user" class="mobileUser__img">
                        </a>
                        <div class="cart">
                            <p class="cart__count">
                                @isset(Auth::user()->cart)
                                    {{ Auth::user()->cart }}
                                @else
                                    0
                                @endisset
                            </p>
                            <a href="{{ route('cart.index') }}" class="user__link" href="#">
                                <img src="{{ asset('assets/icons/cart.svg') }}" alt="cart">
                            </a>
                        </div>
                    </div>
                    <div class="userOptions ">
                        <a href="{{ route('user.index') }}" class="userOptions__option link__button">User</a>
                        <a href="{{ route('user.wallet') }}" class="userOptions__option link__button">Wallet: <span
                                class="link"> ${{ Auth::user()->wallet }}</span></a>
                    </div>
                </div>
                <div class="mobileLinks">
                    <a href="{{ route('home') }}" class="mobileMenu__link link__button">Home</a>
                    <a href="{{ route('product.search') }}" class="mobileMenu__link link__button">Categories</a>
                    <a href="{{ route('product.index') }}" class="mobileMenu__link link__button">New</a>
                </div>
                <form class="loggout" method="post" action="{{ route('user.loggout') }}">
                    @csrf
                    @method('delete')
                    <input type="submit"class="loggout__link link__button" value="Loggout">
                </form>
            @else
                <div class="mobileLinks">
                    <a href="{{ route('home') }}" class="mobileMenu__link link__button">Home</a>
                    <a href="{{ route('product.search') }}" class="mobileMenu__link link__button">Categories</a>
                    <a href="{{ route('product.index') }}" class="mobileMenu__link link__button">New</a>
                </div>
                <div class="loggout">
                    <a href="{{ route('user.login') }}" class="login__button link__button">Login</a>
                </div>
            @endif
        </div>
    </header>
    @yield('content')

    <div class="shadow dnone"></div>

    {{-- Footer --}}

    <footer class="footer">
        <p class="footer__text">This is a example page. All content on this page is not sold</p>
        <h3 class="title footer__text">Images</h3>
        <p class="footer__text">Most of the images on these pages are from <a target="__blank" class="link"
                href="http://pexels.com" title="pexel">Pexels</a>, from the following creators</p>
        <article class="creators">
            <a target="__blank" href="https://www.pexels.com/@ash-122861/" title="ash" class="link">@Ash</a>
            <a target="__blank" href="https://www.pexels.com/@robinstickel/" title="Robin Stickel"
                class="link">@Robin Stickel</a>
            <a target="__blank" href="https://www.pexels.com/@catscoming/" title="Cats Coming" class="link">@Cats
                Coming</a>
            <a target="__blank" href="https://www.pexels.com/@anete-lusina/" title="Anete Lusina-lusina"
                class="link">@Anete Lusina</a>
            <a target="__blank" href="https://www.pexels.com/@valeriya/" title="Valeria Boltneva"
                class="link">@Valeria Boltneva</a>
            <a target="__blank" href="http://pixabay.com" title="Pixabay" class="link">@Pixabay</a>
            <a target="__blank" href="https://www.pexels.com/@markusspiske/" title="Markus Spiske"
                class="link">@Markus Spiske</a>
            <a target="__blank" href="https://www.pexels.com/@chris-f-38966/" title="Chris F" class="link">@Chris
                F</a>
            <a target="__blank" href="https://www.pexels.com/@rana-m-673483/" title="Rana M" class="link">@Rana
                M</a>
            <a target="__blank" href="https://www.pexels.com/@isabella-mendes-107313/" title="Isabella Mendes"
                class="link">@Isabella Mendes</a>
            <a target="__blank" href="https://www.pexels.com/@domeniileblaga/" title="Domeniile Blaga"
                class="link">@Domeniile Blaga</a>
            <a target="__blank" href="https://www.pexels.com/@minan1398/" title="Min An" class="link">@Min An</a>
            <a target="__blank" href="https://www.pexels.com/@matthew-hintz-834554/" title="Matthew Hintz"
                class="link">@Matthew Hintz</a>
            <a target="__blank" href="https://www.pexels.com/@brett-sayles/" title="Brett Sayles"
                class="link">@Brett Sayles</a>
            <a target="__blank" href="https://www.pexels.com/@nikita-khandelwal-178978/" title="Nikita Khandelwal"
                class="link">@Nikita Khandelwal</a>
            <a target="__blank" href="https://www.pexels.com/it-it/@atchioua-kouame-430555/" title="Atchioua Kouame"
                class="link">@Atchioua Kouame</a>
        </article>
        {{-- <a target="__blank" href="" title="" class="link"></a>
            <a target="__blank" href="" title="" class="link"></a>
        <a target="__blank" href="" title="" class="link"></a>
        <a target="__blank" href="" title="" class="link"></a>
        <a target="__blank" href="" title="" class="link"></a>
        <a target="__blank" href="" title="" class="link"></a>
        <a target="__blank" href="" title="" class="link"></a>
        <a target="__blank" href="" title="" class="link"></a>
        <a target="__blank" href="" title="" class="link"></a>
        <a target="__blank" href="" title="" class="link"></a>
        <a target="__blank" href="" title="" class="link"></a> --}}


    </footer>
</body>

</html>
