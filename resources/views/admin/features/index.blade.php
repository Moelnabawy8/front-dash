@extends('admin.master.app')
@section('title', 'Features')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 page-title m-0">{{ __('keywords.Features') }}</h2>
                    <x-action-button href="{{ route('admin.features.create') }}" type="Create" />
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
                                @if ($features->count() > 0)
                                    @foreach ($features as $feature)
                                        <tr>
                                            <td width="20">{{ $features->firstItem() + $loop->index }}</td>
                                            <td width="20">{{ $feature->title }}</td>
                                            <td width="20"><i class="{{ $feature->icon }} fa-2x"></i></td>
                                            <td width="20">

                                                <x-action-button
                                                    href="{{ route('admin.features.edit', ['feature' => $feature]) }}"
                                                    type="Edit" />
                                                <x-action-button
                                                    href="{{ route('admin.features.show', ['feature' => $feature]) }}"
                                                    type="Show" />
                                                <x-delete-button
                                                    href="{{ route('admin.features.destroy', ['feature' => $feature]) }}"
                                                    text="{{ __('keywords.Delete') }}" />
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <x-empty-component title="{{ __('keywords.There Is No Features') }} " />
                                @endif
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $features->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
