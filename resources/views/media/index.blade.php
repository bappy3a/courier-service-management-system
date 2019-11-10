@extends('layouts.admin')
@section('title', 'Media')
@section('css')
  <link rel="stylesheet" href="{{ asset('backend/plugins/ekko-lightbox/ekko-lightbox.css') }}">
@endsection


@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-10">
                    <div class="card-title">
                      All Product Image
                    </div>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i> Add New Media </button>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div>
                  <div class="filter-container p-0 row">
                    @foreach($medias as $media)
                    <div class="filtr-item col-sm-2" data-sort="">
                      <a href="{{ $media->photo }}" data-toggle="lightbox" data-title="<a href='{{ route('medias.destroy',$media->id) }}' class='btn btn-sm btn-danger' >Delete</a>">
                        <img src="{{ $media->photo }}" class="img-fluid mb-2" alt="Media Image"/>
                      </a>
                    </div>
                    @endforeach
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form action="{{ route('medias.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Select Multiple Images </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" name="photo[]" class="custom-file-input" id="customFile" multiple>
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection



@section('js')
  <script src="{{ asset('backend/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
  <script>
    $(function () {
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });

      $('.filter-container').filterizr({gutterPixels: 3});
      $('.btn[data-filter]').on('click', function() {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
      });
    })
  </script>
  <script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
  </script>

@endsection