@extends('admin.layouts.app')
@section('content')
<section class="section">
    <h1 class="section-header">
        <div>Dashboard</div>
    </h1>
<div class="row">
    <div class="col-md-12 ">
        <div class="panel panel-default">
            <div class="panel-heading">敬请期待</div>

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="">
                    <div class="card">
                        <div class="card-header">
                            <h4>Full Width</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive" >
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr id="in">

                                        <td>火币买入价：</td>
                                        <td>币赢卖出价：</td>
                                        <td>火币usdt买入价：</td>
                                        <td>
                                            差价：<div class="badge badge-success"></div>
                                        </td>

                                        <td>
                                            <div class="badge">
                                                <form id="form1">
                                                    {{csrf_field()}}
                                                    <div class="input-group">
                                                        <input type="hidden" name="type" value="1">
                                                        <input type="text" class="form-control" name="symbol" placeholder="输入币种：btc、eth、eos">
                                                        <div class="input-group-btn">
                                                            <a href="javascript:void(0)" onclick="form1(this)" class="btn btn-secondary"><i class="ion ion-search"></i></a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="out">
                                        <td>火币买入价：</td>
                                        <td>币赢卖出价：</td>
                                        <td>火币usdt买入价：</td>
                                        <td>
                                            差价：<div class="badge badge-success"></div>
                                        </td>
                                        <td>
                                            <div class="badge">
                                            <form id="form2">
                                                {{csrf_field()}}
                                                <div class="input-group">
                                                    <input type="hidden" name="type" value="0">
                                                    <input type="text" class="form-control" name="symbol" placeholder="输入币种：btc、eth、eos">
                                                    <div class="input-group-btn">
                                                        <a href="javascript:void(0)" onclick="form2(this)" class="btn btn-secondary"><i class="ion ion-search"></i></a>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{--<div class="card-footer text-right">--}}
                            {{--<nav class="d-inline-block">--}}
                                {{--<ul class="pagination mb-0">--}}
                                    {{--<li class="page-item disabled">--}}
                                        {{--<a class="page-link" href="#" tabindex="-1">--}}
                                            {{--<i class="ion ion-chevron-left"></i>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="page-item active">--}}
                                        {{--<a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>--}}
                                    {{--</li>--}}
                                    {{--<li class="page-item">--}}
                                        {{--<a class="page-link" href="#">2</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="page-item">--}}
                                        {{--<a class="page-link" href="#">3</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="page-item">--}}
                                        {{--<a class="page-link" href="#">--}}
                                            {{--<i class="ion ion-chevron-right">--}}

                                            {{--</i>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</nav>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
@section('admin-js')
    <script>
        function form1(){
            var con = $("#form1").serialize();

            $.ajax({
                type: 'POST',
                url: '{{url('admin/symbol/list')}}',
                data: con,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(data){
//                    console.log(data)
//                    alert(data.huobi);
                    var html = '';
                    html +='<td>火币买入价：'+data.huobi+'</td>';
                    html +='<td>币赢卖出价：'+data.biying+'</td>';
                    html +='<td>火币usdt买入价：'+data.usdt+'</td>';
                    html +='<td>差价：<div class=\"badge badge-success\">'+data.price+'</div></td>';
                    html +='<td>';
                    html +='<div class=\"badge\">';
                    html +='<form id=\"form1\">';
                    html +='{{csrf_field()}}';
                    html +='<div class=\"input-group\">';
                    html +='<input type=\"hidden\" name=\"type\" value=\"1\">';
                    html +='<input type=\"text\" class=\"form-control\" name=\"symbol\" placeholder=\"输入币种：btc、eth、eos\">';
                    html +='<div class="input-group-btn">';
                    html +='<a href=\"javascript:void(0)\" onclick=\"form1(this)\" class=\"btn btn-secondary\"><i class=\"ion ion-search\"></i></a>';
                    html +='</div>';
                    html +='</div>';
                    html +='</form>';
                    html +='</div>';
                    html +='</td>';
                    $("#in").html(html);
//                    $('#form1').val();
                }
            });
        };

        function form2(){
            var con = $("#form2").serialize();

            $.ajax({
                type: 'POST',
                url: '{{url('admin/symbol/list')}}',
                data: con,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(data){
//                    console.log(data)
//                    alert(data.huobi);
                    var html = '';
                    html +='<td>币赢买入价：'+data.biying+'</td>';
                    html +='<td>火币卖出价：'+data.huobi+'</td>';
                    html +='<td>火币usdt卖出价：'+data.usdt+'</td>';
                    html +='<td>差价：<div class=\"badge badge-success\">'+data.price+'</div></td>';
                    html +='<td>';
                    html +='<div class=\"badge\">';
                    html +='<form id=\"form1\">';
                    html +='{{csrf_field()}}';
                    html +='<div class=\"input-group\">';
                    html +='<input type=\"hidden\" name=\"type\" value=\"1\">';
                    html +='<input type=\"text\" class=\"form-control\" name=\"symbol\" placeholder=\"输入币种：btc、eth、eos\">';
                    html +='<div class="input-group-btn">';
                    html +='<a href=\"javascript:void(0)\" onclick=\"form2(this)\" class=\"btn btn-secondary\"><i class=\"ion ion-search\"></i></a>';
                    html +='</div>';
                    html +='</div>';
                    html +='</form>';
                    html +='</div>';
                    html +='</td>';
                    $("#out").html(html);
//                    $('#form2').val();
                }
            });
        };
    </script>
@endsection