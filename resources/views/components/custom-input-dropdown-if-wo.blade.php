<div class="form-group">
<label for="{{ $field }}">{{ $label }}</label>
<select class="form-select form-control" aria-label="Default select example" name="{{ $field }}">

    @isset($value)
        <option selected value={{ $value }}>{{ $value }}</option>
        <option value=""></option>
    @else
    <option selected value="">Open this select menu</option>
    @endisset

            @php
                $categories = DB::table($namatabel)->where($namacolom, $label)->where('deleted_at',null)->where('status', 'Diterima')->get();
            @endphp

            @foreach ( $categories as $category )
                <option value="{{ $category->$ambildata }}">{{ $category->$ambildata }}</option>
            @endforeach

  </select>
            @error( $field )
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
</div>



