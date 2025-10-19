

    @php($locale = app()->getLocale())
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm main-navbar">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                {{ get_option('site_name', __('site.home_title')) }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAssociation" aria-controls="navbarAssociation" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarAssociation">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about">{{ __('site.navbar_about') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#programs">{{ __('site.navbar_programs') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#mission">{{ __('site.navbar_mission') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#news">{{ __('site.navbar_news') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">{{ __('site.navbar_contact') }}</a></li>
                </ul>

                <ul class="navbar-nav ms-auto align-items-md-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="localeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-globe"></i> {{ strtoupper($locale) }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="localeDropdown">
                            @foreach($availableLocales as $code => $language)
                                <li>
                                    <a class="dropdown-item @if($code === $locale) active @endif" href="{{ route('locale.switch', $code) }}">
                                        {{ $language['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}"><i class="fa fa-lock"></i> @lang('app.dashboard')</a>
                        </li>
                    @else
                        @if (Route::has('login'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="fa fa-lock"></i> {{ __('Login') }}</a></li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
