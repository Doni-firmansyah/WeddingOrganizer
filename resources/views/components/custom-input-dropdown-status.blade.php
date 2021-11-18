<div class="form-group">
<label for="{{ $field }}">{{ $label }}</label>
<select class="form-select form-control" aria-label="Default select example" name="{{ $field }}">

    @isset($value)
        <option selected value={{ $value }}>{{ $value }}</option>
    @else
    <option selected value="">Pilih {{ $label }} </option>
    @endisset

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



