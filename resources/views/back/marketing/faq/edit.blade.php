@extends('back.layouts.admin')

@section('content')

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">FAQ Edit</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @include('back.layouts.partials.session')

        <div class="col-md-12">
            <div class="card table-card">
                <div class="card-body">

                    <form action="{{ isset($faq) ? route('faqs.update', ['faq' => $faq]) : route('faqs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($faq))
                            {{ method_field('PATCH') }}
                        @endif

                        <div class="row justify-content-center mb-3">
                            <div class="col-md-10 mt-5">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                @foreach(ag_lang() as $lang)
                                                    <li class="nav-item">
                                                        <a class="nav-link @if ($lang->code == current_locale()) active @endif" id="pills-{{ $lang->code }}-tab" data-bs-toggle="pill" href="#pills-{{ $lang->code }}" role="tab" aria-controls="pills-{{ $lang->code }}" aria-selected="true">
                                                            <img src="{{ asset('assets/flags/' . $lang->code . '.png') }}" />
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-md-2 pt-2">
                                            <div class="form-check form-switch custom-switch-v1 mb-2">
                                                <input type="checkbox" class="form-check-input input-success" name="status"{{ (isset($faq->status) and $faq->status) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="customswitchv2-3"> Status</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="pills-tabContent">
                                        @foreach(ag_lang() as $lang)
                                            <div class="tab-pane fade show @if ($lang->code == current_locale()) active @endif" id="pills-{{ $lang->code }}" role="tabpanel" aria-labelledby="pills-{{ $lang->code }}-tab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="status-price">Question</label>
                                                        <input type="text" class="form-control" id="title-input-{{ $lang->code }}" name="title[{{ $lang->code }}]" placeholder="{{ $lang->code }}" value="{{ isset($faq) ? $faq->translation($lang->code)->title : old('title.*') }}">
                                                    </div>
                                                    <div class="col-md-12 mt-4">
                                                        <label for="status-price">Answer</label>
                                                        <textarea id="description-editor-{{ $lang->code }}" name="description[{{ $lang->code }}]" placeholder="{{ $lang->code }}">{!! isset($faq) ? $faq->translation($lang->code)->description : old('description.*') !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center push mb-3">
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-success my-2">
                                    {{ __('Save') }} <i class="ti ti-check ml-1"></i>
                                </button>
                            </div>
                            <div class="col-md-5 text-end">
                                @if (isset($faq))
                                    <a href="{{ route('faqs.destroy', ['faq' => $faq]) }}" type="submit" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-faq-form{{ $faq->id }}').submit();">
                                        {{ __('Delete') }} <i class="ti ti-trash ml-1"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                    @if (isset($faq))
                        <form id="delete-faq-form{{ $faq->id }}" action="{{ route('faqs.destroy', ['faq' => $faq]) }}" method="POST" style="display: none;">
                            @csrf
                            {{ method_field('DELETE') }}
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js_after')
    <script>
        $(() => {
            {!! ag_lang() !!}.forEach(function(item) {
                ClassicEditor.create(document.querySelector('#description-editor-' + item.code))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
            });

        })
    </script>
@endpush
