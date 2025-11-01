@extends('admin.master.app')
@section('title', __('keywords.Show_Feature'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 page-title m-0">{{ __('keywords.Show_Feature') }}</h2>
                    <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">
                        {{ __('keywords.Back_to_Features') }}
                    </a>
                </div>

                <div class="card shadow-sm rounded-3 col-lg-8 mx-auto">
                    <div class="card-body">

                        <form>
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">{{ __('keywords.Title') }}</label>
                                <p type="text" class="form-control" id="title" readonly>
                                    {{ $feature->title }}
                                </p>

                                <div class="mb-3">
                                    <label for="description" class="form-label">{{ __('keywords.Description') }}</label>
                                    <textarea class="form-control" id="description" rows="4" readonly>{{ $feature->description }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="icon" class="form-label">{{ __('keywords.Icon') }}</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="icon"
                                            value="{{ $feature->icon }}" readonly>
                                        @if ($feature->icon)
                                            <span class="input-group-text">
                                                <i class="{{ $feature->icon }}"></i>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ __('keywords.Created_At') }}</label>
                                    <input type="text" class="form-control"
                                        value="{{ $feature->created_at->format('Y-m-d H:i') }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ __('keywords.Updated_At') }}</label>
                                    <input type="text" class="form-control"
                                        value="{{ $feature->updated_at->format('Y-m-d H:i') }}" readonly>
                                </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {});
    </script>
@endpush
