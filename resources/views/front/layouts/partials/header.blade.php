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
        <!-- nav-button-wrap end-->

        <!-- The menu -->
        @include('front.layouts.partials.language-selector')
        <!--  navigation -->
        <nav id="menu">


            <ul>
                <li>
                    <span>Bars</span>
                    <!--second level -->
                    <ul>
                        <li><a href="index.html">Osijek</a></li>
                        <li><a href="index.html">Rijeka</a></li>
                        <li><a href="index.html">Split</a></li>
                        <li><a href="index.html">Zagreb</a></li>

                    </ul>
                    <!--second level end-->
                </li>
                <li>
                    <span>Clubs</span>
                    <!--second level -->
                    <ul>
                        <li><a href="index.html">Osijek</a></li>
                        <li><a href="index.html">Rijeka</a></li>
                        <li><a href="index.html">Split</a></li>
                        <li><a href="index.html">Zagreb</a></li>

                    </ul>
                    <!--second level end-->
                </li>
                <li>
                    <span>Food</span>
                    <!--second level -->
                    <ul>
                        <li><a href="index.html">Osijek</a></li>
                        <li><a href="index.html">Rijeka</a></li>
                        <li><a href="index.html">Split</a></li>
                        <li><a href="index.html">Zagreb</a></li>

                    </ul>
                </li>
                <li>
                    <span>Fun</span>
                    <!--second level -->
                    <ul>
                        <li><a href="index.html">Osijek</a></li>
                        <li><a href="index.html">Rijeka</a></li>
                        <li><a href="index.html">Split</a></li>
                        <li><a href="index.html">Zagreb</a></li>
                    </ul>
                    <!--second level end-->
                </li>
            </ul>



        </nav>

        <!-- navigation  end -->
    </div>
</header>
