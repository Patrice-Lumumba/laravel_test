@extends('admin.layouts.master')
<?php $title_page = 'Add order' ?>
<?php

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;

$numb_reservat = 'RVT-' . strtoupper(Str::random(10));

?>
@section('main-content')

    <div class="card">
        <h5 class="card-header">Ajouter une réservation</h5>
        <div class="card-body">
            <form method="post" action="{{route('order.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="col-form-label">Date d'arrivée</label>
                            <input type="date" class="form-control" name="date_end" value="<?php echo $today; ?>">
                            @error('date_end')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Date de départ</label>
                            <input type="date" class="form-control" name="date_start" value="<?php echo $today; ?>">
                            @error('date_start')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Nombre de nuits</label>
                            <input type="number" class="form-control" placeholder="Entrez le nombre de nuits"
                                   name="number_night">
                            @error('number_night')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="col-form-label">Heure prévu d'arrivée</label>
                            <input type="time" class="form-control" name="time_end" value="">
                            @error('time_end')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Heure de départ</label>
                            <input type="time" class="form-control" name="time_start" value="">
                            @error('time_start')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Etat de reservation</label>

                            <select name="state_order" id="state_order" class="form-control">
                                <option value="">Réservation</option>
                            </select>
                            @error('state_order')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="col-form-label">N°</label>
                            <input type="text" class="form-control" value="<?=$numb_reservat?>" name="number_order"
                                   style="color:#4036ee; font-weight: bold">

                            @error('number_order')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-5">
                            <label class="col-form-label">Numéro de chambre</label>
                            <select name="numbre_cham" id="numbre_cham" class="form-control">
                                <option value="">Selectionner</option>
                                @foreach(\App\Helpers\Helper::getNumeroChambre() as $key=>$t)
                                    <option value='<?=$key?>'>{{$t}} </option>
                                @endforeach
                            </select>

                            @error('numbre_cham')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="col-form-label">Nombre de chambre</label>
                            <input type="number" class="form-control" name="nbre_cham"
                                   style="color:#4036ee; font-weight: bold">
                            @error('nbre_cham')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="col-form-label">Client clié</label>
                            <input type="text" class="form-control" value="" name="client">

                            @error('client')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <button type="reset" class="btn btn-warning">Réinitialiser</button>
                    <button class="btn btn-success" type="submit">Enregistrer</button>
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
                height: 100
            });
        });

        $(document).ready(function () {
            $('#description').summernote({
                placeholder: "Write detail description.....",
                tabsize: 2,
                height: 150
            });
        });
        // $('select').selectpicker();

    </script>

    <script>
        var randomnumber = Math.floor(Math.random() * 11)
        $('#BuyThis').click(function () {
            $(".productAttributeConfigurableEntryNumbersOnlyText.productAttributeValue input[type="
            text
            "]"
        ).
            val(randomnumber);
        });
    </script>

    <script>
        $('#cat_id').change(function () {
            var cat_id = $(this).val();
            // alert(cat_id);
            if (cat_id != null) {
                // Ajax call
                $.ajax({
                    url: "/admin/category/" + cat_id + "/child",
                    data: {
                        _token: "{{csrf_token()}}",
                        id: cat_id
                    },
                    type: "POST",
                    success: function (response) {
                        if (typeof (response) != 'object') {
                            response = $.parseJSON(response)
                        }
                        // console.log(response);
                        var html_option = "<option value=''>----Select sub category----</option>"
                        if (response.status) {
                            var data = response.data;
                            // alert(data);
                            if (response.data) {
                                $('#child_cat_div').removeClass('d-none');
                                $.each(data, function (id, title) {
                                    html_option += "<option value='" + id + "'>" + title + "</option>"
                                });
                            } else {
                            }
                        } else {
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);
                    }
                });
            } else {
            }
        })
    </script>
@endpush
