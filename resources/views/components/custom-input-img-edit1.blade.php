<div class="row">
    <div class="col-md-12">
        <div class="form-group">
                <label for="{{ $field }}"> {{ $label }}</label>
            <div class="input-group">
                <div class="custom-file">
                    <input class="custom-file-input" type="{{ $type }}" name="{{ $field }}" placeholder="Choose {{ $field }}" id="{{ $field }}{{ $id }}">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    @error($field)
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-2">
        <img id="preview-image-before-upload{{ $id }}" width="208" height="250"
            @isset($value)
            src="/image/{{ $value }}"
            alt="preview image"
             {{-- style="max-height: 250px;" --}}

            @else
            src="/image/user/product_image_not_found.gif"
            alt="preview image"
            {{-- style="max-height: 250px;" --}}
            @endisset
             >
    </div>
</div>

{{-- imgage privew --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
// const a =1;
// const n = "#image2"+a;
const na = 50;
    for (let i = 1; i <= na; i++) {
        const n = "#image"+i;
        const p = "#preview-image-before-upload"+i;
            $(document).ready(function (e) {
                $(n).change(function(){

                let reader = new FileReader();

                reader.onload = (e) => {

                    $(p).attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

                });
                // console.log('#image2',n);
            });
    }
  </script>
   {{-- imgage privew --}}
