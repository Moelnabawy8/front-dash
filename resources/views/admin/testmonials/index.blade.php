@extends('admin.master.app')
@section('title', __('keywords.Testmonials'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 page-title m-0">{{ __('keywords.Testmonials') }}</h2>
                    <x-action-button href="{{ route('admin.testmonials.create') }}" type="Create" />
                </div>
                <div class="card shadow-sm rounded-3">
                    <div class="card-body">
                        <x-Success-Component />
                        <table class="table table-hover align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('keywords.Name') }}</th>
                                    <th>{{ __('keywords.Position') }}</th>
                                    <th>{{ __('keywords.description') }}</th>
                                    <th>{{ __('keywords.image') }}</th>
                                    <th>{{ __('keywords.Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($testmonials->count() > 0)
                                    @foreach ($testmonials as $testmonial)
                                        <tr>
                                            <td width="20">{{ $testmonials->firstItem() + $loop->index }}</td>
                                            <td width="20">{{ $testmonial->name }}</td>
                                            <td width="20">{{ $testmonial->position }}</td>
                                            <td width="20">{{ $testmonial->description }}</td>
                                            <td width="80">
                                                @if ($testmonial->image)
                                                    <img src="{{ asset('storage/' . $testmonial->image) }}" width="80"
                                                        height="80" class="rounded">
                                                @else
                                                    <span class="text-muted">No image</span>
                                                @endif
                                            </td>


                                            <td width="20">

                                                <x-action-button
                                                    href="{{ route('admin.testmonials.edit', ['testmonial' => $testmonial]) }}"
                                                    type="Edit" />
                                                <x-action-button
                                                    href="{{ route('admin.testmonials.show', ['testmonial' => $testmonial]) }}"
                                                    type="Show" />
                                                <x-delete-button
                                                    href="{{ route('admin.testmonials.destroy', ['testmonial' => $testmonial]) }}"
                                                    text="{{ __('keywords.Delete') }}" />
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <x-empty-component title="{{ __('keywords.There Is No Testmonials') }} " />
                                @endif
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $testmonials->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
