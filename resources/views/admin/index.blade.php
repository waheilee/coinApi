@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>Dashboard</div>
        </h1>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">敬请期待</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1>永远相信</h1>
                        <h3>美好的事情即将发生</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
