@extends('admin.master.app')
@section('title', 'Services')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 page-title m-0">{{ __('keywords.Services') }}</h2>
                    <x-action-button href="{{ route('admin.services.create') }}" type="Create" />
                </div>
                <div class="card shadow-sm rounded-3">
                    <div class="card-body">
                        <x-Success-Component />
                        <table class="table table-hover align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('keywords.title') }}</th>
                                    <th>{{ __('keywords.icon') }}</th>
                                    <th>{{ __('keywords.Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($services->count() > 0)
                                    @foreach ($services as $service)
                                        <tr>
                                            <td width="20">{{ $services->firstItem() + $loop->index }}</td>
                                            <td width="20">{{ $service->title }}</td>
                                            <td width="20"><i class="{{ $service->icon }} fa-2x"></i></td>
                                            <td width="20">

                                                <x-action-button
                                                    href="{{ route('admin.services.edit', ['service' => $service]) }}"
                                                    type="Edit" />
                                                <x-action-button
                                                    href="{{ route('admin.services.show', ['service' => $service]) }}"
                                                    type="Show" />
                                                <x-delete-button
                                                    href="{{ route('admin.services.destroy', ['service' => $service]) }}"
                                                    text="{{ __('keywords.Delete') }}" />
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <x-empty-component title="{{ __('keywords.There Is No Services') }} " />
                                @endif
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $services->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
