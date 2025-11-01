@extends('admin.master.app')
@section('title', __('keywords.Show_Testmonial'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 page-title m-0">{{ __('keywords.Show_Testmonial') }}</h2>
                    <a href="{{ route('admin.testmonials.index') }}" class="btn btn-secondary">
                        {{ __('keywords.Back_to_Testmonials') }}
                    </a>
                </div>

                <div class="card shadow-sm rounded-3 col-lg-8 mx-auto">
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label fw-bold">{{ __('keywords.Name') }}</label>
                            <input type="text" class="form-control" value="{{ $testmonial->name }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">{{ __('keywords.Position') }}</label>
                            <input type="text" class="form-control" value="{{ $testmonial->position }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">{{ __('keywords.description') }}</label>
                            <textarea class="form-control" rows="4" readonly>{{ $testmonial->description }}</textarea>
                        </div>

                        <div class="mb-3 text-center">
                            <label class="form-label fw-bold d-block mb-2">{{ __('keywords.image') }}</label>
                            @if ($testmonial->image)
                                <img src="{{ asset('storage/' . $testmonial->image) }}" alt="{{ $testmonial->name }}"
                                    class="rounded shadow-sm border"
                                    style="width: 150px; height: 150px; object-fit: cover;">
                            @else
                                <span class="text-muted">No image available</span>
                            @endif
                        </div>

                        <hr>

                        <div class="mb-3">
                            <label class="form-label fw-bold">{{ __('keywords.Created_At') }}</label>
                            <input type="text" class="form-control"
                                value="{{ $testmonial->created_at->format('Y-m-d H:i') }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">{{ __('keywords.Updated_At') }}</label>
                            <input type="text" class="form-control"
                                value="{{ $testmonial->updated_at->format('Y-m-d H:i') }}" readonly>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
