{{--<div class="card-header d-flex justify-content-between">--}}
    <div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create{{ $firm->id }}">
            <i class="fa fa-car-alt"></i>
        </button>
    </div>
    <div class="modal fade" id="modal-create{{ $firm->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Mahsulot qo'shish</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('warehouse-operations.store')}}" id="form">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="warehouse_id" value="{{ $firm->id }}">
{{--                            <div class="form-group">--}}
{{--                                <label for="warehouse_id">Nomi:</label>--}}
{{--                                <select name="warehouse_id" class="form-control" id="warehouse_id" required>--}}
{{--                                    <option value="">Tanlang</option>--}}
{{--                                    @foreach($products as $product)--}}
{{--                                        <option value="{{$product->id}}">{{$product->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="count">Miqdori:</label>
                                <input type="number" name="count" class="form-control" id="count" required>
                            </div>
                            <div class="form-group">
                                <label for="date">Sana:</label>
                                <input type="date" name="date" class="form-control" id="date" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Bekor qilish</button>
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
{{--</div>--}}
