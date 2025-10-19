@extends('layouts.public.app')

@section('title') {{ $title ?? __('site.home_title') }} @endsection

@section('page-css')
    <style>
        .hero-section {
            position: relative;
            padding: 8rem 0 6rem;
            color: #fff;
            background: linear-gradient(120deg, #062c4d 0%, #0a4472 50%, #116aa1 100%);
        }
        .hero-section .hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(6, 44, 77, 0.6);
        }
        .hero-section .container { position: relative; z-index: 2; }
        .hero-highlight { font-size: 1.1rem; opacity: .9; }
        .statistics-card { background: #fff; border-radius: 1rem; padding: 1.5rem; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        .statistics-card strong { font-size: 2rem; display: block; color: #0a4472; }
        .program-card { background: #fff; border: none; border-radius: 1rem; box-shadow: 0 20px 45px rgba(10,68,114,0.12); transition: transform .2s ease, box-shadow .2s ease; height: 100%; }
        .program-card:hover { transform: translateY(-6px); box-shadow: 0 30px 60px rgba(10,68,114,0.18); }
        .program-card .icon-circle { width: 3.5rem; height: 3.5rem; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; background: rgba(17,106,161,0.12); color: #0a4472; font-size: 1.5rem; }
        .news-card { height: 100%; border: 1px solid rgba(0,0,0,0.05); border-radius: 1rem; padding: 1.5rem; background: #fff; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        .cta-section { background: linear-gradient(135deg, #0a4472, #116aa1); color: #fff; border-radius: 1.5rem; padding: 3rem; box-shadow: 0 30px 60px rgba(10,68,114,0.3); }
        .contact-card { background: #fff; border-radius: 1rem; padding: 2rem; box-shadow: 0 20px 45px rgba(10,68,114,0.08); }
        html[dir="rtl"] .program-card .icon-circle { margin-left: 0; }
        html[dir="rtl"] .program-card { text-align: right; }
        html[dir="rtl"] .news-card { text-align: right; }
        body.locale-ar .hero-section { text-align: right; }
    </style>
@endsection

@section('content')
    @php
        $hero = optional($contentBlocks->get('hero'))->first();
        $about = optional($contentBlocks->get('about'))->first();
        $mission = optional($contentBlocks->get('mission'))->first();
        $stats = $contentBlocks->get('statistics') ?? collect();
        $programs = $contentBlocks->get('programs') ?? collect();
        $news = $contentBlocks->get('news') ?? collect();
        $cta = optional($contentBlocks->get('cta'))->first();
        $contact = optional($contentBlocks->get('contact'))->first();
    @endphp

    <section class="hero-section" id="top" @if($hero && $hero->image_url) style="background-image: url('{{ $hero->image_url }}'); background-size: cover; background-position: center;" @endif>
        <div class="hero-overlay" style="background: {{ $hero?->metadataValue('background_overlay', 'rgba(6,44,77,0.65)') }};"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="display-4 fw-bold">{{ $hero?->translate('title') ?? __('site.home_title') }}</h1>
                    <p class="lead hero-highlight">{{ $hero?->translate('subtitle') }}</p>
                    @if($hero?->translate('summary'))
                        <p class="mt-3">{{ $hero->translate('summary') }}</p>
                    @endif
                    @if($hero?->button_url)
                        <a href="{{ $hero->button_url }}" class="btn btn-lg btn-light mt-4 text-primary fw-semibold">
                            {{ $hero->translate('button_text') ?? __('site.hero_call_to_action') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3 text-primary">{{ $about?->translate('title') }}</h2>
                    <p class="lead text-muted">{{ $about?->translate('summary') }}</p>
                    {!! $about?->translate('body') !!}
                </div>
                <div class="col-lg-6">
                    @if($about?->image_url)
                        <img src="{{ $about->image_url }}" class="img-fluid rounded-4 shadow-lg" alt="{{ $about->translate('title') }}">
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section id="mission" class="py-5">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-5">
                    <h2 class="fw-bold text-primary">{{ $mission?->translate('title') }}</h2>
                    <p class="text-muted">{{ $mission?->translate('summary') }}</p>
                </div>
                <div class="col-lg-7">
                    <div class="contact-card">
                        {!! $mission?->translate('body') !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($stats->isNotEmpty())
        <section class="py-5 bg-light">
            <div class="container">
                <h3 class="fw-bold text-center mb-4 text-primary">{{ __('site.impact_heading') }}</h3>
                <div class="row g-4">
                    @foreach($stats as $stat)
                        <div class="col-md-4">
                            <div class="statistics-card">
                                <strong>{{ $stat->metadataValue('value') }}</strong>
                                <span>{{ $stat->translate('title') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($programs->isNotEmpty())
        <section id="programs" class="py-5">
            <div class="container">
                <h3 class="fw-bold text-center mb-5 text-primary">{{ __('site.programs_heading') }}</h3>
                <div class="row g-4">
                    @foreach($programs as $program)
                        <div class="col-md-6 col-xl-3">
                            <div class="program-card p-4 h-100">
                                <div class="icon-circle mb-3">
                                    <i class="fa {{ $program->metadataValue('icon', 'fa-heartbeat') }}"></i>
                                </div>
                                <h5 class="fw-bold">{{ $program->translate('title') }}</h5>
                                <p class="text-muted">{{ $program->translate('summary') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($news->isNotEmpty())
        <section id="news" class="py-5 bg-light">
            <div class="container">
                <h3 class="fw-bold text-center mb-5 text-primary">{{ __('site.news_heading') }}</h3>
                <div class="row g-4">
                    @foreach($news as $item)
                        <div class="col-md-4">
                            <div class="news-card">
                                <h5 class="fw-semibold">{{ $item->translate('title') }}</h5>
                                <p class="text-muted">{{ $item->translate('summary') }}</p>
                                @if($item->button_url)
                                    <a href="{{ $item->button_url }}" class="text-primary fw-semibold" target="_blank" rel="noopener">
                                        {{ $item->translate('button_text') ?? __('site.learn_more') }}
                                        <i class="fa fa-arrow-right ms-2"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($cta)
        <section class="py-5">
            <div class="container">
                <div class="cta-section text-center">
                    <h3 class="fw-bold">{{ $cta->translate('title') ?? __('site.cta_heading') }}</h3>
                    <p class="lead">{{ $cta->translate('summary') }}</p>
                    @if($cta->button_url)
                        <a href="{{ $cta->button_url }}" class="btn btn-light btn-lg mt-3 text-primary fw-semibold">
                            {{ $cta->translate('button_text') ?? __('site.learn_more') }}
                        </a>
                    @endif
                </div>
            </div>
        </section>
    @endif

    @if($contact)
        <section id="contact" class="py-5 bg-light">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="contact-card h-100">
                            <h4 class="fw-bold mb-3 text-primary">{{ $contact->translate('title') ?? __('site.contact_heading') }}</h4>
                            <p class="text-muted">{{ $contact->translate('summary') }}</p>
                            <ul class="list-unstyled mt-4">
                                @if($contact->metadataValue('phone'))
                                    <li class="mb-2"><i class="fa fa-phone text-primary me-2"></i>{{ __('site.contact_call') }}: <a href="tel:{{ preg_replace('/[^\d+]/', '', $contact->metadataValue('phone')) }}">{{ $contact->metadataValue('phone') }}</a></li>
                                @endif
                                @if($contact->metadataValue('email'))
                                    <li class="mb-2"><i class="fa fa-envelope text-primary me-2"></i>{{ __('site.contact_email') }}: <a href="mailto:{{ $contact->metadataValue('email') }}">{{ $contact->metadataValue('email') }}</a></li>
                                @endif
                                @if($contact->metadataValue('address'))
                                    <li class="mb-2"><i class="fa fa-map-marker text-primary me-2"></i>{{ $contact->metadataValue('address') }}</li>
                                @endif
                                @if($contact->metadataValue('office_hours_' . app()->getLocale()))
                                    <li class="mb-2"><i class="fa fa-clock-o text-primary me-2"></i>{{ __('site.contact_hours') }}: {{ $contact->metadataValue('office_hours_' . app()->getLocale()) }}</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @if($contact->metadataValue('map_url'))
                            <div class="ratio ratio-4x3 shadow rounded-4 overflow-hidden">
                                <iframe src="{{ $contact->metadataValue('map_url') }}" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
