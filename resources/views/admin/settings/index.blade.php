@extends('admin.master.app')
@section('title', __('keywords.Edit_Settings'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 page-title m-0">{{ __('keywords.Edit_Settings') }}</h2>

                </div>


                <div class="card shadow-sm rounded-3 col-lg-8 mx-auto">
                    <div class="card-body">
                        <div>
                            <x-success-component />
                        </div>
                        <form action="{{ route('admin.settings.update', ['setting' => $setting]) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="mb-3">
                                <x-labelform field="address" />
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ old('address', $setting->address) }}">
                                <x-validationcomponent field="address" />
                            </div>

                            <div class="mb-3">
                                <x-labelform field="phone" />
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ old('phone', $setting->phone) }}">
                                <x-validationcomponent field="phone" />
                            </div>

                            <div class="mb-3">
                                <x-labelform field="email" />
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $setting->email) }}">
                                <x-validationcomponent field="email" />
                            </div>

                            <div class="mb-3">
                                <x-labelform field="instegram" />
                                <input type="text" class="form-control" id="instegram" name="instegram"
                                    value="{{ old('instegram', $setting->instegram) }}">
                                <x-validationcomponent field="instegram" />
                            </div>

                            <div class="mb-3">
                                <x-labelform field="twitter" />
                                <input type="text" class="form-control" id="twitter" name="twitter"
                                    value="{{ old('twitter', $setting->twitter) }}">
                                <x-validationcomponent field="twitter" />
                            </div>

                            <div class="mb-3">
                                <x-labelform field="facebook" />
                                <input type="text" class="form-control" id="facebook" name="facebook"
                                    value="{{ old('facebook', $setting->facebook) }}">
                                <x-validationcomponent field="facebook" />
                            </div>

                            <div class="mb-3">
                                <x-labelform field="linkedin" />
                                <input type="text" class="form-control" id="linkedin" name="linkedin"
                                    value="{{ old('linkedin', $setting->linkedin) }}">
                                <x-validationcomponent field="linkedin" />
                            </div>

                            <div class="mb-3">
                                <x-labelform field="youtube" />
                                <input type="text" class="form-control" id="youtube" name="youtube"
                                    value="{{ old('youtube', $setting->youtube) }}">
                                <x-validationcomponent field="youtube" />
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-secondary">
                                    {{ __('keywords.Cancel') }}
                                </a>
                                <x-buttoncomponent text="Update_Setting" />
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
