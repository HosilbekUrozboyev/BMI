@extends('admin.master')
@section('title', 'Kaloriya')
@section('content')
    <div class="row">
        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('days.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="id_1">Nonushta</label>
                            <input type="number" class="form-control" value="{{ \App\Models\Day::find(1)->calory }}" name="id_1" required>
                        </div>
                        <div class="form-group">
                            <label for="id_2">Tushlik</label>
                            <input type="number" class="form-control" value="{{ \App\Models\Day::find(2)->calory }}" name="id_2" required>
                        </div>
                        <div class="form-group">
                            <label for="id_3">Kechlik</label>
                            <input type="number" class="form-control" value="{{ \App\Models\Day::find(3)->calory }}" name="id_3" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-scripts')
    <script>
        @if ($message = Session::get('success'))
        toastr.success("{{$message}}");
        @endif
    </script>
@endsection
