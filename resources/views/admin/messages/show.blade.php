@extends('admin.master.app')
@section('title', __('keywords.Show_Message'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 page-title m-0">{{ __('keywords.Show_Message') }}</h2>
                    <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">
                        {{ __('keywords.Back_to_Messages') }}
                    </a>
                </div>

                <div class="card shadow-sm rounded-3 col-lg-8 mx-auto">
                    <div class="card-body">
                        <form>
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('keywords.Name') }}</label>
                                <input type="text" class="form-control" id="name" value="{{ $message->name }}"
                                    readonly>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('keywords.Email') }}</label>
                                <input type="text" class="form-control" id="email" value="{{ $message->email }}"
                                    readonly>
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label">{{ __('keywords.Subject') }}</label>
                                <input type="text" class="form-control" id="subject" value="{{ $message->subject }}"
                                    readonly>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">{{ __('keywords.Message') }}</label>
                                <textarea class="form-control" id="message" rows="4" readonly>{{ $message->message }}</textarea>
                            </div>


                            <div class="mb-3">
                                <label class="form-label">{{ __('keywords.Created_At') }}</label>
                                <input type="text" class="form-control"
                                    value="{{ $message->created_at->format('Y-m-d H:i') }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('keywords.Updated_At') }}</label>
                                <input type="text" class="form-control"
                                    value="{{ $message->updated_at->format('Y-m-d H:i') }}" readonly>
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
