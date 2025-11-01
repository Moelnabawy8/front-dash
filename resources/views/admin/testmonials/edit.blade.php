@extends('admin.master.app')
@section('title', __('keywords.Edit_Testmonial'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 page-title m-0">{{ __('keywords.Edit_Testmonial') }}</h2>
                    <a href="{{ route('admin.testmonials.index') }}" class="btn btn-secondary">
                        {{ __('keywords.Back_to_Testmonials') }}
                    </a>
                </div>

                <div class="card shadow-sm rounded-3 col-lg-8 mx-auto">
                    <div class="card-body">
                        <form action="{{ route('admin.testmonials.update', ['testmonial' => $testmonial]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="mb-3 col-lg-8 mx-auto">
                                <x-labelform field="Name" />
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $testmonial->name) }}">
                                <x-validationcomponent field="name" />
                            </div>

                            <div class="mb-3 col-lg-8 mx-auto">
                                <x-labelform field="Position" />
                                <input type="text" class="form-control @error('position') is-invalid @enderror"
                                    id="position" name="position" value="{{ old('position', $testmonial->position) }}">
                                <x-validationcomponent field="position" />
                            </div>

                            <div class="mb-3">
                                <x-labelform field="description" />
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="4">{{ old('description', $testmonial->description) }}</textarea>
                                <x-validationcomponent field="description" />
                            </div>


                            <div class="mb-3 col-lg-8 mx-auto">
                                <x-labelform field="image" />
                                @if ($testmonial->image)
                                    <div class="mb-2 text-center">
                                        <img src="{{ asset('storage/' . $testmonial->image) }}" alt="Current Image"
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
                                    value="{{ $testmonial->created_at->format('Y-m-d H:i') }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('keywords.Updated_At') }}</label>
                                <input type="text" class="form-control"
                                    value="{{ $testmonial->updated_at->format('Y-m-d H:i') }}" readonly>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('admin.testmonials.index') }}" class="btn btn-outline-secondary">
                                    {{ __('keywords.Cancel') }}
                                </a>
                                <x-buttoncomponent text="Update_Testmonial" />
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
