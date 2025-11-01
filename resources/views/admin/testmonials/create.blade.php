@extends('admin.master.app')
@section('title', __('keywords.Add_New_Testimonial'))
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
                    <h2 class="h5 page-title m-0">{{ __('keywords.Add_New_Testimonial') }}</h2>
                    <a href="{{ route('admin.testmonials.index') }}" class="btn btn-secondary">
                        {{ __('keywords.Back_to_Testmonials') }}
                    </a>
                </div>

                <div class="card shadow-sm rounded-3 col-lg-8 mx-auto">
                    <div class="card-body">
                        <form action="{{ route('admin.testmonials.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 col-lg-8 mx-auto">
                                <x-labelform field="Name" />
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}"
                                    placeholder="{{ __('keywords.Enter_Testmonial_Name') }}">
                                <x-validationcomponent field="name" />
                            </div>


                            <div class="mb-3 col-lg-8 mx-auto">
                                <x-labelform field="Position" />
                                <input type="text" class="form-control @error('position') is-invalid @enderror"
                                    id="position" name="position" value="{{ old('position') }}"
                                    placeholder="{{ __('keywords.Enter_Testimonial_Position') }}">
                                <x-validationcomponent field="position" />
                            </div>

                            <div class="mb-3">
                                <x-labelform field="description" />
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="4" placeholder="{{ __('keywords.Enter_testmonial_Description') }}">{{ old('description') }}</textarea>
                                <x-validationcomponent field="description" />
                            </div>

                            <div class="mb-3 col-lg-8 mx-auto">
                                <x-labelform field="image" />
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" accept="image/*">
                                <x-validationcomponent field="image" />
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('admin.testmonials.index') }}" class="btn btn-outline-secondary">
                                    {{ __('keywords.Cancel') }}
                                </a>
                                <x-buttoncomponent text="Add_New_Testimonial" />
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
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                const btn = this.querySelector('button[type="submit"]');
                btn.disabled = true;
                btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> {{ __('keywords.Saving') }}...';
            });
        });
    </script>
@endpush
