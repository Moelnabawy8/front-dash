@extends('admin.master.app')
@section('title', __('keywords.Edit_Service'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 page-title m-0">{{ __('keywords.Edit_Service') }}</h2>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
                        {{ __('keywords.Back_to_Services') }}
                    </a>
                </div>
                <div class="card shadow-sm rounded-3 col-lg-8 mx-auto">
                    <div class="card-body">
                        <form action="{{ route('admin.services.update', ['service' => $service]) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <x-labelform field="title" />
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $service->title }}">
                                <x-validationcomponent field="title" />
                            </div>

                            <div class="mb-3">
                                <x-labelform field="description" />
                                <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $service->description) }}</textarea>
                                <x-validationcomponent field="description" />
                            </div>

                            <div class="mb-3">
                                <x-labelform field="icon" />
                                <div class="input-group">
                                    <input type="text" class="form-control" id="icon" name="icon"
                                        value="{{ old('icon', $service->icon) }}">
                                    @if ($service->icon)
                                        <span class="input-group-text">
                                            <i class="{{ $service->icon }}"></i>
                                        </span>
                                    @endif
                                </div>
                                <x-validationcomponent field="icon" />

                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('keywords.Created_At') }}</label>
                                <input type="text" class="form-control"
                                    value="{{ $service->created_at->format('Y-m-d H:i') }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('keywords.Updated_At') }}</label>
                                <input type="text" class="form-control"
                                    value="{{ $service->updated_at->format('Y-m-d H:i') }}" readonly>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">
                                    {{ __('keywords.Cancel') }}
                                </a>
                                <x-buttoncomponent text="Update_Service" />
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
