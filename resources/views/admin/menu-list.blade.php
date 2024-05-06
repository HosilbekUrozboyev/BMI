@extends('admin.master')
{{--@section('title', 'Bugungi ovqatlar')--}}
@section('content')
    <style>
        .btn-info{
            width: 50%!important;
            text-align: left;
            font-weight: bold;
            /*color: #0c84ff;*/
        }
        .kaloriya{
            color: green;
            font-weight: bold;
        }
    </style>
    <div class="col-12 col-sm-10">
        <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-monday-tab" data-toggle="pill"
                           href="#custom-tabs-monday" role="tab" aria-controls="custom-tabs-monday"
                           aria-selected="true">Dushanba</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-tuesday-tab" data-toggle="pill" href="#custom-tabs-tuesday"
                           role="tab" aria-controls="custom-tabs-tuesday" aria-selected="false">Seshanba</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-wednesday-tab" data-toggle="pill"
                           href="#custom-tabs-wednesday" role="tab" aria-controls="custom-tabs-wednesday"
                           aria-selected="false">Chorshanba</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-thursday-tab" data-toggle="pill"
                           href="#custom-tabs-thursday" role="tab" aria-controls="custom-tabs-thursday"
                           aria-selected="false">Payshanba</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-friday-tab" data-toggle="pill" href="#custom-tabs-friday"
                           role="tab" aria-controls="custom-tabs-friday" aria-selected="false">Juma</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-saturday-tab" data-toggle="pill"
                           href="#custom-tabs-saturday" role="tab" aria-controls="custom-tabs-saturday"
                           aria-selected="false">Shanba</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    @for($j = 1; $j <= 6; $j++)
                        <?php
                        $week = "monday";
                        switch ($j) {
                            case 1:
                                $week = "monday";
                                break;
                            case 2:
                                $week = "tuesday";
                                break;
                            case 3:
                                $week = "wednesday";
                                break;
                            case 4:
                                $week = "thursday";
                                break;
                            case 5:
                                $week = "friday";
                                break;
                            case 6:
                                $week = "saturday";
                                break;
                        }
                        ?>
                        <div class="tab-pane fade @if($j==1) active show @endif" id="custom-tabs-{{$week}}"
                             role="tabpanel"
                             aria-labelledby="custom-tabs-{{$week}}-tab">
                            <table class="table table-bordered font-weight-bold">
                                <tr class="bg-gradient-orange text-center">
                                    <td class="col-4">Nonushta</td>
                                    <td class="col-4">Tushlik</td>
                                    <td class="col-4">Kechlik</td>
                                </tr>
                                <?php
                                $len = max(count($menu[$j][1]), count($menu[$j][2]), count($menu[$j][3]));
                                $sum1 = 0;
                                $sum2 = 0;
                                $sum3 = 0;
                                ?>

                                @for($i=0; $i<$len; $i++)
                                    <tr>
                                        <td>
                                            @if(isset($menu[$j][1][$i]))
                                                <button class="btn btn-info"
                                                        onclick="get_data({{ $menu[$j][1][$i]->menu->id }})"
                                                        data-toggle="modal"
                                                        data-target="#modal-create">{{ $menu[$j][1][$i]->menu->name }}</button>
                                                <button class="ml-3 btn kaloriya">{{ $menu[$j][1][$i]->menu->calory }}kkal
                                                </button>
                                                <?php $sum1 += $menu[$j][1][$i]->menu->calory ?>
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($menu[$j][2][$i]))
                                                <button class="btn btn-info"
                                                        onclick="get_data({{ $menu[$j][2][$i]->menu->id }})"
                                                        data-toggle="modal"
                                                        data-target="#modal-create">{{ $menu[$j][2][$i]->menu->name }}</button>
                                                <button class="ml-3 btn kaloriya">{{ $menu[$j][2][$i]->menu->calory }}kkal
                                                </button>
                                                <?php $sum2 += $menu[$j][2][$i]->menu->calory ?>
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($menu[$j][3][$i]))
                                                <button class="btn btn-info"
                                                        onclick="get_data({{ $menu[$j][3][$i]->menu->id }})"
                                                        data-toggle="modal"
                                                        data-target="#modal-create"> {{ $menu[$j][3][$i]->menu->name }}</button>
                                                <button class="ml-3 btn kaloriya">{{ $menu[$j][3][$i]->menu->calory }}kkal
                                                </button>
                                                <?php $sum3 += $menu[$j][3][$i]->menu->calory ?>
                                            @endif
                                        </td>
                                    </tr>
                                @endfor
                                <tr class="bg-success text-center">
                                    <td> Jami: {{ $sum1 }} kkal</td>
                                    <td> Jami: {{ $sum2 }} kkal</td>
                                    <td> Jami: {{ $sum3 }} kkal</td>
                                </tr>
                            </table>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Retsep</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="get_data">
                        <tr class="bg-primary">
                            <th>Mahsulot</th>
                            <th>Miqdori</th>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section("custom-scripts")
    <script>
        function get_data(id) {
            let url = "{{ route("get_food_date") }}";
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    'id': id,
                },
                success: function (data) {
                    let len = data.length;
                    $("#get_data").empty();
                    $("#get_data").append('<tr class="bg-orange">'
                        + '<th>Mahsulot</th> <th>Miqdori</th> <th>Kaloriya</th>'
                        + '</tr>')
                    for (let i = 0; i < len; i++) {
                        if (data[i]["warehouse"]["type"] != "dona")
                            $("#get_data").append('<tr>'
                                + '<td>' + data[i]["warehouse"]["name"] + "</td>"
                                + '<td>' + data[i]["count"] + ' ' + data[i]["warehouse"]["type"] + '</td>'
                                + '<td>' + data[i]["warehouse"]["calory"] / 100 * data[i]["count"] + ' kkal</td>'
                                + '</tr>')
                        else
                            $("#get_data").append('<tr>'
                                + '<td>' + data[i]["warehouse"]["name"] + "</td>"
                                + '<td>' + data[i]["count"] + ' ' + data[i]["warehouse"]["type"] + '</td>'
                                + '<td>' + data[i]["warehouse"]["calory"] * data[i]["count"] + ' kkal</td>'
                                + '</tr>')
                    }
                }
            });
        }
    </script>
@endsection
