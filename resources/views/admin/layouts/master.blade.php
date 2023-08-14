<!DOCTYPE html>
<html lang="fr">

@include('admin.layouts.head')

<body id="page-top">

<div id="wrapper">

    @include('admin.layouts.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">


        <div id="content">

            @include('admin.layouts.header')

            <div style="padding: 10px 40px">
                @yield('main-content')
            </div>

        </div>

    </div>
</div>

@include('admin.layouts.footer')

<script
    src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js">
</script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
</script>
@if(Session::has('success'))
    <script>
        toastr.options = {
            "progressBar": true
        }
        toastr.success("{{Session::get('success')}}");
    </script>
@endif
</body>

</html>
