@extends('admin.layouts.master')
<?php $title_page = 'Edit room'?>

@section('main-content')

    <div class="card">
        <h5 class="card-header">Edit Room</h5>
        <div class="card-body">
            <form method="post" action="{{route('rooms.update',$room->id)}}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="title" placeholder="Enter title" value="{{$room->title}}"
                           class="form-control">
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="col-form-label">Description</label>
                    <textarea class="form-control" id="description" name="description">{{$room->description}}</textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="is_featured">Is Featured</label><br>
                    <input type="checkbox" name='is_featured' id='is_featured'
                           value='{{$room->is_featured}}' {{(($room->is_featured) ? 'checked' : '')}}> Yes
                </div>

                <div class="form-group">
                    <label for="price" class="col-form-label">Price(NRS) <span class="text-danger">*</span></label>
                    <input id="price" type="number" name="price" placeholder="Enter price" value="{{$room->price}}"
                           class="form-control">
                    @error('price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="type_house">Category <span class="text-danger">*</span></label>
                    <select name="type_house" id="type_house" class="form-control">
                        <option value="">--Select any category--</option>

                        @foreach(\App\Helpers\Helper::getTypeHouse() as $key=>$t)
                            <option value="{{ $key }}"
                                    @if (old('type_house', $room->type_house) == $key)
                                        selected="selected"
                                @endif
                            >
                                {{ $t }}
                            </option>
                        @endforeach

                    </select>
                    @error('type_house')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
                    <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                  <i class="fas fa-image"></i> Choose
                  </a>
              </span>
                        <input id="thumbnail" class="form-control" type="text" name="image" value="{{$room->image}}">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    @error('image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control">
                        <option value="active" {{(($room->status=='active')? 'selected' : '')}}>Active</option>
                        <option value="inactive" {{(($room->status=='inactive')? 'selected' : '')}}>Inactive</option>
                    </select>
                    @error('status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>

@endpush
@push('scripts')
    <script src="{{asset('admin_assets/vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
    <script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script>
        $('#lfm').filemanager('image');

        $(document).ready(function () {
            $('#summary').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 150
            });
        });
        $(document).ready(function () {
            $('#description').summernote({
                placeholder: "Write detail Description.....",
                tabsize: 2,
                height: 150
            });
        });
    </script>

    <script>
        var child_cat_id = '';
        // alert(child_cat_id);
        $('#cat_id').change(function () {
            var cat_id = $(this).val();

            if (cat_id != null) {
                // ajax call
                $.ajax({
                    url: "/admin/category/" + cat_id + "/child",
                    type: "POST",
                    data: {
                        _token: "{{csrf_token()}}"
                    },
                    success: function (response) {
                        if (typeof (response) != 'object') {
                            response = $.parseJSON(response);
                        }
                        var html_option = "<option value=''>--Select any one--</option>";
                        if (response.status) {
                            var data = response.data;
                            if (response.data) {
                                $('#child_cat_div').removeClass('d-none');
                                $.each(data, function (id, title) {
                                    html_option += "<option value='" + id + "' " + (child_cat_id == id ? 'selected ' : '') + ">" + title + "</option>";
                                });
                            } else {
                                console.log('no response data');
                            }
                        } else {
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);

                    }
                });
            } else {

            }

        });
        if (child_cat_id != null) {
            $('#cat_id').change();
        }
    </script>
@endpush
