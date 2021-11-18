<div class="form-group">

        <label for="{{ $field }}">{{ $label }}</label>
            <select class="form-select form-control" aria-label="Default select example" name="{{ $field }}">
                @if($value)
                    <option >{{ $value }}</option>
                @else
                <option selected value="">Open this select menu</option>
                @endisset

                @php
                    $categories = DB::table($namatabel)->where('deleted_at',null)->where($namacolom, $label)->where('status', 'Diterima')->get();
                @endphp

                @foreach ( $categories as $category )
                    <option >{{ $category->$ambildata }}</option>
                @endforeach
            </select>
            @error( $field )
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

</div>



