@extends('admin.master.app')
@section('title', __('keywords.Edit_Company'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 page-title m-0">{{ __('keywords.Edit_Company') }}</h2>
                    <a href="{{ route('admin.companies.index') }}" class="btn btn-secondary">
                        {{ __('keywords.Back_to_Companies') }}
                    </a>
                </div>
                <div class="card shadow-sm rounded-3 col-lg-8 mx-auto">
                    <div class="card-body">
                        <form action="{{ route('admin.companies.update', ['company' => $company]) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="mb-3 col-lg-8 mx-auto">
                                <x-labelform field="image" />
                                @if ($company->image)
                                    <div class="mb-2 text-center">
                                        <img src="{{ asset('storage/' . $company->image) }}" alt="Current Image"
                                            class="rounded shadow-sm border"
                                            style="width: 150px; height: 150px; object-fit: cover;">
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" accept="image/*">
                                <x-validationcomponent field="image" />
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

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.companies.index') }}" class="btn btn-outline-secondary">
                                    {{ __('keywords.Cancel') }}
                                </a>
                                <x-buttoncomponent text="Update_Company" />
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
