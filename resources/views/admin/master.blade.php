<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KinderGarden</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.esm.min.js" integrity="sha512-wp1TmWHEmHgERMuWw8Q0tCwFbZab0o6MjMS/HceqShRObCHzIfTrZfjpMm1bTuqIVrQXd9SRhYt0V9hObySU/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('admin.nav')

    @include('admin.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('admin.header')


        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->


    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->
    @include('admin.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('custom/sweetalert.min.js')}}"></script>

<!-- ChartJS -->
{{--<script src="../../plugins/chart.js/Chart.min.js"></script>--}}
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->

{{--<!-- jQuery -->--}}
{{--<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>--}}
{{--<!-- Bootstrap -->--}}
{{--<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}
{{--<!-- AdminLTE -->--}}
{{--<script src="{{asset('dist/js/adminlte.js')}}"></script>--}}

{{--<!-- OPTIONAL SCRIPTS -->--}}
{{--<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>--}}
{{--<!-- AdminLTE for demo purposes -->--}}
{{--<script src="{{asset('dist/js/demo.js')}}"></script>--}}
{{--<!-- AdminLTE dashboard demo (This is only for demo purposes) -->--}}
{{--<script src="{{asset('dist/js/pages/dashboard3.js')}}"></script>--}}


<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Bootstrap 5 -->
<script src="{{asset('asset/bootstrap5/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>


<script>
    function datevalidate(){
        var from_date = document.getElementById('from_date');
        var to_date = document.getElementById('to_date');
        var form = document.getElementById('date_form_validate');
        var count = 0;
        if(from_date.value == "" || to_date.value == ""){
            from_date.style.border = "1px solid red";
            to_date.style.border = "1px solid red";
            var msg = "Sanalar kiritilmadi";
            toastr.error(msg);
            count++;
        }
        else  if(from_date.value > to_date.value){
            from_date.style.border = "1px solid red";
            to_date.style.border = "1px solid red";
            var msg = "Sana oralig'i noto'g'ri kiritildi";
            toastr.error(msg);
            count++;
        } else{
            from_date.style.border = "1px solid green";
            to_date.style.border = "1px solid green";
        }
        if(count == 0){
            form.submit();
        }
    }
</script>

@yield('custom-scripts')
<script>

    let errors = @json($errors->all());
    @if($errors->any())
    let msg = '';
    for (let i = 0; i < errors.length; i++) {
        msg += (i + 1) + '-xatolik ' + errors[i] + '\n';
    }
    toastr.error(msg);
    @endif
    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Haqiqatan ham bu yozuvni oʻchirib tashlamoqchimisiz?`,
            text: "Agar siz buni o'chirib tashlasangiz, u abadiy yo'qoladi.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            buttons: ['Yo`q', 'Ha']
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>
</body>
</html>

