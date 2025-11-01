@extends('admin.master.app')
@section('title', __('keywords.Subscribers'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 page-title m-0">{{ __('keywords.Subscribers') }}</h2>

                </div>
                <div class="card shadow-sm rounded-3">
                    <div class="card-body">
                        <x-Success-Component />
                        <table class="table table-hover align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('keywords.Email') }}</th>
                                    <th>{{ __('keywords.Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($subscribers->count() > 0)
                                    @foreach ($subscribers as $subscriber)
                                        <tr>
                                            <td width="20">{{ $subscribers->firstItem() + $loop->index }}</td>

                                            <td width="20">{{ $subscriber->email }}</td>
                                            <td width="20">



                                                <x-delete-button
                                                    href="{{ route('admin.subscribers.destroy', ['subscriber' => $subscriber]) }}"
                                                    text="{{ __('keywords.Delete') }}" />
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <x-empty-component title="{{ __('keywords.There Is No Subscribers') }} " />
                                @endif
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $subscribers->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
