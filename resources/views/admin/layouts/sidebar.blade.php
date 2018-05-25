
    <div class="main-sidebar">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="index.html">Stisla Lite</a>
            </div>
            <div class="sidebar-user">
                <div class="sidebar-user-picture">
                    <img alt="image" src="./distAdmin/img/avatar/avatar-1.jpeg">
                </div>
                <div class="sidebar-user-details">
                    <div class="user-name">Ujang Maman</div>
                    <div class="user-role">
                        {{--{{Auth::user()->name}}--}}
                    </div>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">控制台</li>
                <li class="active">
                    <a href="#"><i class="ion ion-speedometer"></i><span>控制台</span></a>
                </li>

                <li class="menu-header">Components</li>
                <li>
                    <a href="#" class="has-dropdown"><i class="ion ion-flag"></i><span>价格列表</span></a>
                    <ul class="menu-dropdown">
                        <li><a href="{{url('admin/symbol')}}"><i class="ion ion-ios-circle-outline"></i>列表详情</a></li>
                    </ul>
                </li>

                {{--<li>--}}
                    {{--<a href="#"><i class="ion ion-heart"></i> Badges--}}
                        {{--<div class="badge badge-primary">10</div>--}}
                    {{--</a>--}}
                {{--</li>--}}

                <li>
                    <a href="credits.html"><i class="ion ion-ios-information-outline"></i> Credits</a>
                </li>

            </ul>
            <div class="p-3 mt-4 mb-4">
                <a href="#"
                   class="btn btn-danger btn-shadow btn-round has-icon has-icon-nofloat btn-block">
                    <i class="ion ion-help-buoy"></i>
                    <div>Go PRO!</div>
                </a>
            </div>
        </aside>
    </div>
