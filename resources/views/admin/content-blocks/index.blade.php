@extends('layouts.dashboard.app')

@section('title') {{ $title ?? __('site.manage_content') }} - @parent @endsection

@section('content')
    <div class="row">
        <div class="col-12">
            @foreach($blocks as $section => $items)
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 text-capitalize">{{ __('site.section_'.$section) ?? ucfirst(str_replace('-', ' ', $section)) }}</h4>
                        <span class="badge bg-secondary">{{ $items->count() }} {{ __('site.items') }}</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>{{ __('site.title_en') }}</th>
                                    <th>{{ __('site.title_ar') }}</th>
                                    <th>{{ __('site.status') }}</th>
                                    <th class="text-end">{{ __('site.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $block)
                                    <tr>
                                        <td>{{ $block->title_en ?? $block->summary_en ?? $block->key }}</td>
                                        <td>{{ $block->title_ar ?? $block->summary_ar ?? $block->key }}</td>
                                        <td>
                                            @if($block->is_active)
                                                <span class="badge bg-success">{{ __('site.active') }}</span>
                                            @else
                                                <span class="badge bg-light text-muted">{{ __('site.inactive') }}</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('content_blocks_edit', $block) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i> {{ __('site.edit') }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('page-js')
    <script>
        var options = {closeButton : true};
        @if(session('success'))
            toastr.success('{{ session('success') }}', '{{ trans('app.success') }}', options);
        @endif
    </script>
@endsection
