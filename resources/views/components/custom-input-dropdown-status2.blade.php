<div class="form-group">
<label for="{{ $field }}">{{ $label }}</label>
<select class="form-select form-control" aria-label="Default select example" name="{{ $field }}">


    <option selected value="">Pilih {{ $label }} </option>

    @php
        $categories = DB::table($namatabel)->get();
    @endphp
    @foreach ( $categories as $category )
        <option value="{{ $category->$namacolom }}">{{ $category->$namacolom }}</option>
    @endforeach

  </select>
</div>



