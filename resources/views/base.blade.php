<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('meta')
    <link rel="shortcut icon" href="{{asset('assets/icons/logo.svg')}}" type="image/x-icon">
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
            <a href="{{ route('home') }}" name="Home">
                <img src="{{ asset('assets/icons/logo.svg') }}" alt="Home">
            </a>
        </div>
        <nav class="nav">
            <ul class="nav--ul">
                <li class="nav__item"><a class="nav__link" href="{{ route('home') }}" title="Home">Home</a></li>
                <li class="nav__item"><a class="nav__link" href="{{ route('product.search') }}"
                        title="home">Categories</a>
                    <ul class="submenu">
                        @foreach (Session()->get('category') as $category)
                            <li>
                                <a class="submenu__link nav__link"
                                    href="{{ route('product.search', ['category' => $category['id']]) }}"
                                    title="{{ $category['name'] }}">{{ $category['name'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav__item"><a class="nav__link" href="{{ route('product.index') }}" title="new">New</a>
                </li>
            </ul>
        </nav>
        <form class="search" action="{{ route('product.search') }}">
            <input name="search" placeholder="Search" class="search__input" type="text" title="search">
            <button type="submit" href="{{ route('product.search') }}" class="search__link">
                <img src="{{ asset('assets/icons/light-search.svg') }}" alt="Search" title="search">
            </button>
        </form>
        <section class="userM">
            <a href="{{ route('cart.index') }}" class="cart" title="cart">
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
                <a href="{{ route('user.index') }}" class="user__link" href="#" title="user">
                    <img src="{{ asset('assets/icons/user.svg') }}" alt="user">
                </a>
                @if (Auth::user())
                    <ul class="submenu">
                        <li><a href="{{ route('user.wallet') }}" class="money cart__prize"
                                title="wallet">${{ Auth::user()->wallet }}</a></li>

                        <a href="{{ route('order.index') }}" class="money" title="My orders"><img src="{{asset('assets/icons/orders.svg')}}" alt="Orders" title="Orders"></a>
                        <a href="{{ route('user.show', ['user' => Auth::user()->name]) }}" class="money"
                            title="Info"><img src="{{asset('assets/icons/info.svg')}}" alt="Info" title="info"></a>
                        <form method="post" action="{{ route('user.loggout') }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="money"><img src="{{asset('assets/icons/loggout.svg')}}" alt="loggout" title="loggout"></button>
                        </form>
                    </ul>
                @endif
            </div>
        </section>

        {{-- Mobile Menu --}}
        <div class="mobileMenu container dnone">
            <div class="twingHome">
                <a href="{{ route('home') }}" title="Home">
                    <img src="{{ asset('assets/icons/name.svg') }}" alt="Home" title="logo">
                </a>
                <div class="close">
                    <img src="{{ asset('assets/icons/light-delete.svg') }}" alt="Close" title="close">
                </div>
            </div>
            @if (Auth::user())
                <div class="mobileUser">
                    <div class="user--mobileMenu">
                        <a href="{{ route('user.index') }}" class="mobileUserImg" title="User">
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
                            <a href="{{ route('cart.index') }}" class="user__link" href="#" title="cart">
                                <img src="{{ asset('assets/icons/cart.svg') }}" alt="cart">
                            </a>
                        </div>
                    </div>
                    <div class="userOptions ">
                        <a href="{{ route('user.index') }}" class="userOptions__option link__button"
                            title="user">User</a>
                        <a href="{{ route('user.wallet') }}" class="userOptions__option link__button"
                            title="wallet"><span class="card__text"> ${{ Auth::user()->wallet }}</span></a>
                    </div>
                </div>
            @endif

            <div class="mobileLinks">
                <a href="{{ route('home') }}" class="mobileMenu__link link__button" title="home">Home</a>
                <a href="{{ route('product.search') }}" class="mobileMenu__link link__button"
                    title="category">Categories</a>
                <a href="{{ route('product.index') }}" class="mobileMenu__link link__button" title="new">New</a>
            </div>

            @if (!Auth::user())
                <div class="loggout">
                    <a href="{{ route('user.login') }}" class="login__button link__button" title="login">Login</a>
                </div>
            @endif
            
            @if (Auth::user())
                <form class="loggout" method="post" action="{{ route('user.loggout') }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="loggout__link link__button"><img src="{{asset('assets/icons/loggout.svg')}}" alt="loggout" title="loggout"></button>
                </form>
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
