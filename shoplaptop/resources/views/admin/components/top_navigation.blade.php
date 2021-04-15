<?php 
    use App\Models\User;
    $value = session()->get('login');
?>
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        @if(!empty($value->avatar))
                            <img src="{{url('/image')}}/{{$value->avatar}}" alt="" />
                        @else
                            <img src="{{url('/image/userIcon.jpg')}}" alt="" />
                        @endif
                        
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="{{ route('editUser.index', ['id' => $value->id]) }}">Thông tin cá nhân</a></li>
                        <li>
                            <a href="{{url('/admin/logout')}}"><i class="fa fa-sign-out pull-right"></i>Đăng xuất</a>
                        </li>
                    </ul>
                </li>

                <!-- <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">2</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <a>
                                <span>
                                    <span>Vu Nam</span>
                                </span>
                                <span class="message">Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                                <span>
                                    <span>Vu Nam</span>
                                </span>
                                <span class="message">Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                            </a>
                        </li>
                        <li>
                            <div class="text-center">
                                <a>
                                    <strong>Đọc tất cả thông báo</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </nav>
    </div>
</div>