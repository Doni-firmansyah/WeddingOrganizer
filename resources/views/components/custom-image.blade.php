<!-- /.col -->
<div class="col-md-12">
    <div class="card">
      <div class="card-header p-2" style="background-color: rgb(92, 86, 97)">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#gambar1" data-toggle="tab">Gambar 1</a></li>
          <li class="nav-item"><a class="nav-link" href="#gambar2" data-toggle="tab">Gambar 2</a></li>
          <li class="nav-item"><a class="nav-link" href="#gambar3" data-toggle="tab">Gambar 3</a></li>
          <li class="nav-item"><a class="nav-link" href="#gambar4" data-toggle="tab">Gambar 4</a></li>
          <li class="nav-item"><a class="nav-link" href="#gambar5" data-toggle="tab">Gambar 5</a></li>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="gambar1">
            <!-- Post -->
            gambar 1
            <x-custom-input-img2 field="image" label="Choose Image" type="file" />
            <!-- /.post -->
          </div>

          <div class="tab-pane" id="gambar2">
            <!-- The timeline -->
                 gambar 2
                 <x-custom-input-img2 field="image2" label="Choose Image" type="file" />
            <!-- The timeline -->
          </div>


          <div class="tab-pane" id="gambar3">
            {{-- content --}}
            gambar 3
            <x-custom-input-img2 field="image3" label="Choose Image" type="file" />
            {{-- content --}}
          </div>

          <div class="tab-pane" id="gambar4">
            {{-- content --}}
            gambar 4
            <x-custom-input-img2 field="image4" label="Choose Image" type="file" />
            {{-- content --}}
          </div>

          <div class="tab-pane" id="gambar5">
            {{-- content --}}
            gambar 5
            <x-custom-input-img2 field="image5" label="Choose Image" type="file" />
            {{-- content --}}
          </div>

        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
