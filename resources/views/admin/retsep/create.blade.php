<div class="card-header d-flex justify-content-between">
    <div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
            <i class="fa fa-plus"></i> Qo'shish
        </button>
    </div>
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Mahsulot qo'shish</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('retsep.store')}}" id="form">
                        @csrf
                        <input type="hidden" name="menu_id" value="{{ $ovqat->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="warehouse_id">Mahsulot:</label>
                                <select name="warehouse_id" id="warehouse_id" class="form-control form-select">
                                    @foreach($mahsulotlar as $ovqat)
                                        <option value="{{$ovqat->id}}">{{$ovqat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="count">Miqdori:</label>
                                <input type="text" name="count" class="form-control" id="count">
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
</div>
