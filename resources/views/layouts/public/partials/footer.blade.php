    @if( ! request()->cookie('accept_cookie'))
        <div class="alert alert-warning text-center cookie-notice" style="font-size: 16px; margin: 0; line-height: 25px;">
            <div class="container ">
                <div class="row">
                    <div class="col-md-12">
                        <p>{!! get_option('cookie_message') !!}</p>
                        <a href="#" class="cookie-ok-btn btn btn-primary">Ok</a>
                        <a href="{!! get_post_url(get_option('cookie_learn_page')) !!}">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <footer id="footer" class="site-footer">
        <div class="container py-5">
            <div class="row gy-4 align-items-center">
                <div class="col-md-6 text-md-start text-center">
                    <h5 class="fw-bold mb-2">{{ get_option('site_name', __('site.home_title')) }}</h5>
                    <p class="mb-0 text-muted">{{ get_option('footer_about_us') ?: __('site.manage_content') }}</p>
                </div>
                <div class="col-md-6 text-md-end text-center">
                    <p class="mb-1">{!! get_text_tpl(get_option('copyright_text')) !!}</p>
                    <small class="text-muted">{{ __('site.language_switcher_label') }}:
                        @foreach($availableLocales as $code => $language)
                            <span class="mx-1 @if($code === app()->getLocale()) fw-semibold @endif">{{ $language['native'] }}</span>
                        @endforeach
                    </small>
                </div>
            </div>
        </div>
    </footer>
