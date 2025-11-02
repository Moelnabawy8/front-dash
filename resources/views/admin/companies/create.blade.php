@extends('admin.master.app')
@section('title', __('keywords.Add_New_Company'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 page-title m-0">{{ __('keywords.Add_New_Company') }}</h2>
                    <a href="{{ route('admin.companies.index') }}" class="btn btn-secondary">
                        {{ __('keywords.Back_to_Companies') }}
                    </a>
                </div>
                <div class="card shadow-sm rounded-3 col-lg-8 mx-auto">
                    <div class="card-body">
                        <form action="{{ route('admin.companies.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 col-lg-8 mx-auto">
                                <x-labelform field="image" />
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" accept="image/*">
                                <x-validationcomponent field="image" />
                            </div>


                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('admin.companies.index') }}" class="btn btn-outline-secondary">
                                    {{ __('keywords.Cancel') }}
                                </a>
                                <x-buttoncomponent text="Add_New_Company" />
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
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                const btn = this.querySelector('button[type="submit"]');
                btn.disabled = true;
                btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> {{ __('keywords.Saving') }}...';
            });
        });
    </script>
@endpush
