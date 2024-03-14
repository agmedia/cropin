<header id="header" class="main-header dark-header fs-header sticky">
    <div class="header-inner">
        <div class="logo-holder">
            <a href="{{ route('index') }}"><img src="{{ asset('images/cro-pins.svg') }}" alt="CROPINS"></a>
        </div>

        <!-- nav-button-wrap-->
        <div class="nav-button-wrap color-bg">
            <a class="nav-button" href="#menu">
                <span></span><span></span><span></span>
            </a>
        </div>




        <!-- The menu -->
        @include('front.layouts.partials.language-selector')


        <div class="nav-holder main-menu">
            <nav>
                <ul>

                    @foreach ($navigation as $category => $cities)
                        <li>
                            <a href="#"> {{ $category }} <i class="fa fa-caret-down"></i></a>
                            <ul>
                                @foreach ($cities as $city)
                                    <li><a href="{{ route('index', ['category' => $category, 'location' => $city]) }}">{{ $city }}</a></li>
                                @endforeach

                            </ul>
                        </li>
                    @endforeach

                </ul>
            </nav>
        </div>

        <!--  navigation -->
        <nav id="menu">
            <ul>
                @foreach ($navigation as $category => $cities)
                    <li>
                        <span>{{ $category }}</span>
                        <ul>
                            @foreach ($cities as $city)
                                <li><a href="{{ route('index', ['category' => $category, 'location' => $city]) }}">{{ $city }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>
