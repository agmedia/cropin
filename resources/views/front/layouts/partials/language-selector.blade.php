
<div class="header-user-menu">
    <div class="header-user-name">
    <img class="lang" style="width:16px;" src="{{ asset('images/'.\Illuminate\Support\Str::upper(current_locale()).'.png') }}" alt=""> {{ \Illuminate\Support\Str::upper(current_locale()) }}
    </div>
    <ul>
        @if (isset($langs))
            @foreach ($langs as $lang)
                <li>
                    <a class=" @if (current_locale() == $lang['code']) active @endif" href="{{ LaravelLocalization::getLocalizedURL($lang['code'], $lang['slug'], [], true) }}">{{ $lang['title'] }}</a>
                </li>
            @endforeach
        @else
            @foreach (ag_lang() as $lang)
                <li>
                    @if (isset($page))
                        <a class=" @if (current_locale() == $lang->code) active @endif" href="{{ LaravelLocalization::getLocalizedURL($lang->code, route('page', ['page' => $page->translation($lang->code)->slug]), [], true) }}">
                            <img class="lang" style="width:16px" src="{{ asset('images/'.Str::upper($lang->code).'.png') }}" alt="">
                            {{ $lang->title->{LaravelLocalization::getCurrentLocale()} }}
                        </a>
                    @elseif(isset($product))
                        <a class=" @if (current_locale() == $lang->code) active @endif" href="{{ LaravelLocalization::getLocalizedURL($lang->code, route('resolve.route', ['product' => $product->translation($lang->code)->slug]), [], true) }}">
                            <img class="lang" style="width:16px" src="{{ asset('images/'.Str::upper($lang->code).'.png') }}" alt="">
                            {{ $lang->title->{LaravelLocalization::getCurrentLocale()} }}
                        </a>
                    @else
                        <a class=" @if (current_locale() == $lang->code) active @endif" href="{{ LaravelLocalization::getLocalizedURL($lang->code, null, [], true) }}">
                            <img class="lang" style="width:16px" src="{{ asset('images/'.Str::upper($lang->code).'.png') }}" alt="">
                            {{ $lang->title->{LaravelLocalization::getCurrentLocale()} }}
                        </a>
                    @endif
                </li>
            @endforeach
        @endif
    </ul>
</div>
