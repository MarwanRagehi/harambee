@extends('layouts.dashboard.app')

@section('title') {{ $title ?? __('site.edit_block') }} - @parent @endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0">{{ $block->key }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('content_blocks_edit', $block) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="title_en">{{ __('site.title_en') }}</label>
                                <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en', $block->title_en) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="title_ar">{{ __('site.title_ar') }}</label>
                                <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{ old('title_ar', $block->title_ar) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="subtitle_en">{{ __('site.subtitle_en') }}</label>
                                <input type="text" class="form-control" id="subtitle_en" name="subtitle_en" value="{{ old('subtitle_en', $block->subtitle_en) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="subtitle_ar">{{ __('site.subtitle_ar') }}</label>
                                <input type="text" class="form-control" id="subtitle_ar" name="subtitle_ar" value="{{ old('subtitle_ar', $block->subtitle_ar) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="button_text_en">{{ __('site.button_text_en') }}</label>
                                <input type="text" class="form-control" id="button_text_en" name="button_text_en" value="{{ old('button_text_en', $block->button_text_en) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="button_text_ar">{{ __('site.button_text_ar') }}</label>
                                <input type="text" class="form-control" id="button_text_ar" name="button_text_ar" value="{{ old('button_text_ar', $block->button_text_ar) }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="button_url">{{ __('site.button_url') }}</label>
                                <input type="text" class="form-control" id="button_url" name="button_url" value="{{ old('button_url', $block->button_url) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="summary_en">{{ __('site.summary_en') }}</label>
                                <textarea class="form-control" id="summary_en" name="summary_en" rows="3">{{ old('summary_en', $block->summary_en) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="summary_ar">{{ __('site.summary_ar') }}</label>
                                <textarea class="form-control" id="summary_ar" name="summary_ar" rows="3">{{ old('summary_ar', $block->summary_ar) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="body_en">{{ __('site.body_en') }}</label>
                                <textarea class="form-control" id="body_en" name="body_en" rows="6">{{ old('body_en', $block->body_en) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="body_ar">{{ __('site.body_ar') }}</label>
                                <textarea class="form-control" id="body_ar" name="body_ar" rows="6">{{ old('body_ar', $block->body_ar) }}</textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="metadata_icon">{{ __('site.icon') }}</label>
                                <input type="text" class="form-control" id="metadata_icon" name="metadata[icon]" value="{{ old('metadata.icon', $block->metadataValue('icon')) }}" placeholder="fa-heart">
                                <small class="text-muted">{{ __('site.icon_help') }}</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="metadata_value">{{ __('site.highlight_value') }}</label>
                                <input type="text" class="form-control" id="metadata_value" name="metadata[value]" value="{{ old('metadata.value', $block->metadataValue('value')) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="metadata_phone">{{ __('site.phone') }}</label>
                                <input type="text" class="form-control" id="metadata_phone" name="metadata[phone]" value="{{ old('metadata.phone', $block->metadataValue('phone')) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="metadata_email">{{ __('site.email') }}</label>
                                <input type="email" class="form-control" id="metadata_email" name="metadata[email]" value="{{ old('metadata.email', $block->metadataValue('email')) }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="metadata_address">{{ __('site.address') }}</label>
                                <input type="text" class="form-control" id="metadata_address" name="metadata[address]" value="{{ old('metadata.address', $block->metadataValue('address')) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="metadata_map_url">{{ __('site.map_url') }}</label>
                                <input type="text" class="form-control" id="metadata_map_url" name="metadata[map_url]" value="{{ old('metadata.map_url', $block->metadataValue('map_url')) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="metadata_hours_en">{{ __('site.office_hours_en') }}</label>
                                <input type="text" class="form-control" id="metadata_hours_en" name="metadata[office_hours_en]" value="{{ old('metadata.office_hours_en', $block->metadataValue('office_hours_en')) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="metadata_hours_ar">{{ __('site.office_hours_ar') }}</label>
                                <input type="text" class="form-control" id="metadata_hours_ar" name="metadata[office_hours_ar]" value="{{ old('metadata.office_hours_ar', $block->metadataValue('office_hours_ar')) }}">
                            </div>
                        </div>
                        <hr>
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <label class="form-label" for="image">{{ __('site.image') }}</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <small class="text-muted">{{ __('site.image_help') }}</small>
                            </div>
                            <div class="col-md-3 form-check mt-4">
                                <input class="form-check-input" type="checkbox" value="1" id="remove_image" name="remove_image">
                                <label class="form-check-label" for="remove_image">{{ __('site.remove_image') }}</label>
                            </div>
                            <div class="col-md-3 form-check mt-4">
                                <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" @checked(old('is_active', $block->is_active))>
                                <label class="form-check-label" for="is_active">{{ __('site.active') }}</label>
                            </div>
                        </div>
                        @if($block->image_url)
                            <div class="mt-3">
                                <img src="{{ $block->image_url }}" class="img-fluid rounded" alt="{{ $block->translate('title') }}">
                            </div>
                        @endif
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">{{ __('site.save_changes') }}</button>
                            <a href="{{ route('content_blocks') }}" class="btn btn-link">{{ __('site.cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">{{ __('site.section_details') }}</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-2"><strong>{{ __('site.section') }}:</strong> {{ $block->section }}</p>
                    <p class="text-muted mb-2"><strong>{{ __('site.key') }}:</strong> {{ $block->key }}</p>
                    <p class="text-muted">{{ __('site.edit_block_help') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-js')
    <script>
        var options = {closeButton : true};
        @if($errors->any())
            toastr.error('{{ __('site.validation_error') }}', '{{ trans('app.error') }}', options);
        @endif
    </script>
@endsection
