<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>The GirlyBag</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Inventory Management" name="description" />
    <meta content="Inventory Management" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/') }}public/admindashboard/assets/images/favicon.ico">
    <link href="{{ asset('/') }}public/admindashboard/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}public/admindashboard/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}public/admindashboard/assets/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}public/admindashboard/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <!-- DataTables -->
    <link href="{{ asset('/') }}public/admindashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}public/admindashboard/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('/') }}public/admindashboard/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('/') }}public/admindashboard/assets/libs/chartist/chartist.min.css" rel="stylesheet">

    <!-- Bootstrap Css -->
    <link href="{{asset('public/admindashboard/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('/') }}public/admindashboard/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('/') }}public/admindashboard/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @yield('css')
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/jquery/jquery.min.js"></script>
</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ========== Top Sidebar Start ========== -->
       @include('admin.include.header')

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.include.leftsidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            @yield('body')
            <!-- End Page-content -->


            <!-- Footer Section  -->
            @include('admin.include.footer')

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- JAVASCRIPT -->
 
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/node-waves/waves.min.js"></script>

    <script src="{{ asset('/') }}public/admindashboard/assets/libs/select2/js/select2.min.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/js/pages/form-advanced.init.js"></script>
    <!-- Peity chart-->
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/peity/jquery.peity.min.js"></script>

    <!-- Plugin Js-->
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/chartist/chartist.min.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script>

    <script src="{{ asset('/') }}public/admindashboard/assets/js/pages/dashboard.init.js"></script>

   
    <!-- Required datatable js -->
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/jszip/jszip.min.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('/') }}public/admindashboard/assets/js/pages/datatables.init.js"></script>
    <script src="{{ asset('/') }}public/admindashboard/assets/js/app.js"></script>

   

    <!-- Editor -->
    <script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5/tinymce.min.js">
    </script>

    <script>
    $('.items').select2();
    $("table").on('click', '.tr_clone_add', function() {
        $('.items').select2("destroy");
        var $tr = $(this).closest('.tr_clone');
        var $clone = $tr.clone();
        $tr.after($clone);
        $('.items').select2();
        $clone.find('.items').select2('val', '');
    });
    $(function() {
        $(document).on('click', '.remove1', function() {
            var trIndex = $(this).closest("tr").index();
            if (trIndex > 1) {
                $(this).closest("tr").remove();
            } else {
                alert("Sorry!! Can't remove first row!");
            }
        });
    });
    </script>

    <script>
    

    tinymce.init({
        selector: "#editor",
        menubar: false,
        statusbar: false,
        plugins: "autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars",
        toolbar: "h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help fullscreen ",
        skin: "bootstrap",
        toolbar_drawer: "floating",
        min_height: 200,
        autoresize_bottom_margin: 16,
        setup: (editor) => {
            editor.on("init", () => {
                editor.getContainer().style.transition =
                    "border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out";
            });
            editor.on("focus", () => {
                (editor.getContainer().style.boxShadow =
                    "0 0 0 .2rem rgba(0, 123, 255, .25)"),
                (editor.getContainer().style.borderColor = "#80bdff");
            });
            editor.on("blur", () => {
                (editor.getContainer().style.boxShadow = ""),
                (editor.getContainer().style.borderColor = "");
            });
        }
    });
    </script>

    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
           <script>
    @if($errors->any())
        @foreach($errors->all() as $error)
              toastr.error('{{ $error }}','Error',{
                  closeButton:true,
                  progressBar:true,
               });
        @endforeach
    @endif
</script>
    @yield('scripts')
</body>

</html>