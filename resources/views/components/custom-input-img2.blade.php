<div class="form-group">
    <label for="{{ $field }}">{{ $label }}</label>
    <input class="pt-3" type="{{ $type }}" class="form-control" id="{{ $field }}" name="{{ $field }}"
    @isset($value)
    value="{{ old($field) ? old($field) :$value }}"
    @else
    value="{{ old($field) }}"
    @endisset
    >
      @error($field)
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
</div>
