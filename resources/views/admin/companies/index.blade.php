@extends('admin.master.app')
@section('title', 'Companies')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 page-title m-0">{{ __('keywords.Companies') }}</h2>
                    <x-action-button href="{{ route('admin.companies.create') }}" type="Create" />
                </div>
                <div class="card shadow-sm rounded-3">
                    <div class="card-body">
                        <x-Success-Component />
                        <table class="table table-hover align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('keywords.image') }}</th>
                                    <th>{{ __('keywords.Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($companies->count() > 0)
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td width="20">{{ $companies->firstItem() + $loop->index }}</td>
                                            <td width="80">
                                                @if ($company->image)
                                                    <img src="{{ asset('storage/' . $company->image) }}" width="80"
                                                        height="80" class="rounded">
                                                @else
                                                    <span class="text-muted">No image</span>
                                                @endif
                                            </td>
                                            <td width="20">

                                                <x-action-button
                                                    href="{{ route('admin.companies.edit', ['company' => $company]) }}"
                                                    type="Edit" />
                                                <x-action-button
                                                    href="{{ route('admin.companies.show', ['company' => $company]) }}"
                                                    type="Show" />
                                                <x-delete-button
                                                    href="{{ route('admin.companies.destroy', ['company' => $company]) }}"
                                                    text="{{ __('keywords.Delete') }}" />
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <x-empty-component title="{{ __('keywords.There Is No Companies') }} " />
                                @endif
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $companies->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
