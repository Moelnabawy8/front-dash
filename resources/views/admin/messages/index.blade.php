@extends('admin.master.app')
@section('title', 'Messages')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 page-title m-0">{{ __('keywords.Messages') }}</h2>

                </div>
                <div class="card shadow-sm rounded-3">
                    <div class="card-body">
                        <x-Success-Component />
                        <table class="table table-hover align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('keywords.Name') }}</th>
                                    <th>{{ __('keywords.Email') }}</th>
                                    <th>{{ __('keywords.Subject') }}</th>
                                    <th>{{ __('keywords.Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($messages->count() > 0)
                                    @foreach ($messages as $message)
                                        <tr>
                                            <td width="20">{{ $messages->firstItem() + $loop->index }}</td>
                                            <td width="20">{{ $message->name }}</td>
                                            <td width="20">{{ $message->email }}</td>
                                            <td width="20">{{ $message->subject }}</td>
                                            <td width="20">


                                                <x-action-button
                                                    href="{{ route('admin.messages.show', ['message' => $message]) }}"
                                                    type="Show" />
                                                <x-delete-button
                                                    href="{{ route('admin.messages.destroy', ['message' => $message]) }}"
                                                    text="{{ __('keywords.Delete') }}" />
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <x-empty-component title="{{ __('keywords.There Is No Messages') }} " />
                                @endif
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $messages->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
