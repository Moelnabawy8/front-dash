@extends('admin.master.app')
@section('title', __('keywords.Show_Service'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 page-title m-0">{{ __('keywords.Show_Service') }}</h2>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
                        {{ __('keywords.Back_to_Services') }}
                    </a>
                </div>

                <div class="card shadow-sm rounded-3 col-lg-8 mx-auto">
                    <div class="card-body">

                        <form>
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">{{ __('keywords.Title') }}</label>
                                <p type="text" class="form-control" id="title" readonly>
                                    {{ $service->title }}
                                </p>

                                <div class="mb-3">
                                    <label for="description" class="form-label">{{ __('keywords.Description') }}</label>
                                    <textarea class="form-control" id="description" rows="4" readonly>{{ $service->description }}</textarea>
                                </div>

                                {{-- Icon --}}
                                <div class="mb-3">
                                    <label for="icon" class="form-label">{{ __('keywords.Icon') }}</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="icon"
                                            value="{{ $service->icon }}" readonly>
                                        @if ($service->icon)
                                            <span class="input-group-text">
                                                <i class="{{ $service->icon }}"></i>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- Created at --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('keywords.Created_At') }}</label>
                                    <input type="text" class="form-control"
                                        value="{{ $service->created_at->format('Y-m-d H:i') }}" readonly>
                                </div>

                                {{-- Updated at --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('keywords.Updated_At') }}</label>
                                    <input type="text" class="form-control"
                                        value="{{ $service->updated_at->format('Y-m-d H:i') }}" readonly>
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
        document.addEventListener('DOMContentLoaded', function() {
            // لو حابب تضيف أي JS مستقبلاً
        });
    </script>
@endpush
