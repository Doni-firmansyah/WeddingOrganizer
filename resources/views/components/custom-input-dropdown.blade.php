<div class="form-group">
<label for="{{ $field }}">{{ $label }}</label>
<select class="form-select form-control" aria-label="Default select example" name="{{ $field }}">

    {{-- @isset($value)
        <option selected value={{ $value }}>{{ $value }}</option>
    @else
    <option selected value="">Open this select menu</option>
    @endisset --}}
    @if ($value==null)
        <option selected value="">Pilih Status</option>
    @else
        <option selected value={{ $value }}>{{ $value }}</option>
    @endif

    @php
        $categories = DB::table($namatabel)->get();
    @endphp
    @foreach ( $categories as $category )
        <option value="{{ $category->$namacolom }}">{{ $category->$namacolom }}</option>
    @endforeach

  </select>
  @error( $field )
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
</div>



