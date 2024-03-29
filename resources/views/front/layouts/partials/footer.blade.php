<footer class="main-footer dark-footer  ">

    <div class="sub-footer fl-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="about-widget">
                        <img src="{{ asset('images/socializer-logo.svg') }}" alt="Socializer">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="copyright"> &#169; Socializer 2024.  {{ __('front/apartment.all_rights') }}.
                        @if (isset($pages) && $pages)
                            @foreach($pages as $page)

                                    <a class="white" href="{{ route('page', ['page' => $page->translation->slug]) }}">{{ $page->translation->title }}</a>

                            @endforeach
                        @endif</div>
                </div>
                <div class="col-md-3">
                    <div class="footer-social">
                        <ul>
                            <li><a href="#" target="_blank" ><i class="fa fa-facebook-official"></i></a></li>
                            <li><a href="#" target="_blank" ><i class="fa fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
