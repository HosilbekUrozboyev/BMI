@extends('admin.master')
@section('title', 'Omborxona')
@section('content')

    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
{{--                @include("admin.warehouse_operations.create")--}}
                <div class="card-body">
                    <table id="example2" class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Mahsulot</th>
                            <th>Miqdori</th>
{{--                            <th>Sana</th>--}}
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $firm)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$firm->name}}</td>
                                <td>{{$firm->count}} {{$firm->type}}</td>
                                <td>@include("admin.warehouse_operations.create")</td>
{{--                                <td class="d-flex">--}}

{{--                                    <button type="button" onclick="add({{$firm->id}})" class="btn btn-info"--}}
{{--                                            data-toggle="modal" data-target="#modal-add">--}}
{{--                                        <i class="fa fa-car"></i>--}}
{{--                                    </button>--}}

{{--                                    <button type="button" onclick="edit({{$firm->id}})" class="btn btn-warning"--}}
{{--                                            data-toggle="modal" data-target="#modal-edit">--}}
{{--                                        <i class="fa fa-pen"></i>--}}
{{--                                    </button>--}}


{{--                                    <form action="{{route('warehouse.destroy', $firm->id)}}" method="post">--}}
{{--                                        @method('DELETE')--}}
{{--                                        @csrf--}}
{{--                                        <button type="submit" class="btn btn-danger show_confirm"><i--}}
{{--                                                class="fa fa-trash"></i></button>--}}
{{--                                    </form>--}}

{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @include("admin.warehouse.edit")
            </div>

        </div>
        <!-- /.col-md-6 -->
    </div>
@endsection
@section('custom-scripts')
    <script>

        @if ($message = Session::get('success'))
        toastr.success("{{$message}}");
        @endif

        let firmes =@json($products);

        function edit(id) {
            let form = document.getElementById('edit_form').action+'/'+id;
            document.getElementById('edit_form').action = form;
            for (let i = 0; i < firmes.length; i++) {
                if (id == firmes[i]["id"]) {
                    var firms = firmes[i];
                    console.log(firms);
                    document.getElementById('edit_name').value = firms['name'];
                    document.getElementById('edit_type').value = firms['type'];
                    document.getElementById('edit_id').value = firms['id'];
                    break;
                }
            }
        }
        function add(id) {
            let form = document.getElementById('edit_form2').action+'/'+id;
            document.getElementById('edit_form2').action = form;
            for (let i = 0; i < firmes.length; i++) {
                if (id == firmes[i]["id"]) {
                    var firms = firmes[i];
                    console.log(firms);
                    document.getElementById('add_id').value = firms['id'];
                    break;
                }
            }
        }

        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
@endsection
