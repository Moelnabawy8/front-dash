<form method="POST" action="{{ $href }}" class="d-inline">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('keywords.Are you sure?') }}')">
        <i class="fas fa-trash"></i> {{ $text }}
    </button>
</form>
