@extends('admin.master.app')
@section('title', __('keywords.Show_Company'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 page-title m-0">{{ __('keywords.Show_Company') }}</h2>
                    <a href="{{ route('admin.companies.index') }}" class="btn btn-secondary">
                        {{ __('keywords.Back_to_Companies') }}
                    </a>
                </div>

                <div class="card shadow-sm rounded-3 col-lg-8 mx-auto">
                    <div class="card-body">

                        <form>
                            @csrf

                            <div class="mb-3 text-center">
                                <label class="form-label fw-bold d-block mb-2">{{ __('keywords.image') }}</label>
                                @if ($company->image)
                                    <img src="{{ asset('storage/' . $company->image) }}" alt="{{ $company->name }}"
                                        class="rounded shadow-sm border"
                                        style="width: 150px; height: 150px; object-fit: cover;">
                                @else
                                    <span class="text-muted">No image available</span>
                                @endif
                            </div>



                            <div class="mb-3">
                                <label class="form-label">{{ __('keywords.Created_At') }}</label>
                                <input type="text" class="form-control"
                                    value="{{ $company->created_at->format('Y-m-d H:i') }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('keywords.Updated_At') }}</label>
                                <input type="text" class="form-control"
                                    value="{{ $company->updated_at->format('Y-m-d H:i') }}" readonly>
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
