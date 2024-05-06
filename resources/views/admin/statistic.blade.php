@extends('admin.master')
@section('title', 'Monitoring')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('statistic.index') }}" method="get">
                        <div class="d-flex w-75 align-items-center">
                            <input type="date" name="from_date" id="from_date" class="form-control mr-1"
                                   required value="{{ $from_date ?? null }}">
                            <label class="form-control-label mr-3" for="from_date">dan</label>
                            <input type="date" name="to_date" id="to_date" class="form-control mr-1"
                                   required value="{{ $to_date ?? null }}">
                            <label class="form-control-label mr-3" for="to_date">gacha</label>
                            <select class="form-control mr-3" name="type" id="type" required>
                                <option value="">Hisobotni tanlang</option>
                                <option value="1">Kirim</option>
                                <option value="2">Chiqim</option>
                            </select>
                            <button type="submit" class="btn btn-success">Monitoring</button>
                        </div>
                    </form>
                    <table class="table table-hover mt-3">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Mahsulot</th>
                            <th style="width: 40%">Miqdori</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($outlays as $firm)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{ $firm['name'] }} </td>
                                <td>
                                    <p class="btn @if($type==1)btn-success @else btn-danger @endif">{{ $firm['count'] }} {{ $firm['type'] }}</p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.col-md-6 -->
    </div>
    <script>
        document.getElementById('type').value = '{{ $type }}';
    </script>
@endsection
