@extends('admin.layouts.app')
@section('content')
<section class="section">
    <h1 class="section-header">
        <div>Dashboard</div>
    </h1>
<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>USDT买入价：{{$inUsdt}}</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive" >
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th>币种</th>
                            <th>火币买入</th>
                            <th>币赢卖出</th>
                            <th>价差</th>
                        </tr>
                        @foreach($in as $k)
                        <tr>
                        <td>{{$k['name']}}</td>
                        <td>{{$k['huobi']}}</td>
                        <td>{{$k['biying']}}</td>
                        {{--<td>{{$k['usdt']}}</td>--}}
                        <td>
                        差价：<div class="badge badge-success">{{$k['price']}}</div>
                        </td>
                        </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>USDT卖出价：{{$outUsdt}}</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive" >
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th>币种</th>
                            <th>火币卖出</th>
                            <th>币赢买入</th>
                            <th>价差</th>
                        </tr>
                        @foreach($out as $v)
                        <tr>
                        <td>{{$v['name']}}</td>
                        <td>{{$v['huobi']}}</td>
                        <td>{{$v['biying']}}</td>
                        {{--<td>{{$v['usdt']}}</td>--}}
                        <td>
                        差价：<div class="badge badge-success">{{$v['price']}}</div>
                        </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
@section('admin-js')
    <script>
        function myrefresh() {
            window.location.reload();
        }
        setTimeout('myrefresh()', 40000); //指定30秒刷新一次


    </script>
@endsection