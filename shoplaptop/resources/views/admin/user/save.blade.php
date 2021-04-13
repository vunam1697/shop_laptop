@extends('admin._layout')
@section('main')
<div class="row">
    <form id="add-form" action="{{route('admin.saveUser')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" id="token">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @if(!empty($message) && !$success)
                <div class="x_title">
                    <div class="alert alert-danger">
                        <strong>Fail!</strong> {{$message}}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" style="color: black;">&times;</span>
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                @endif
                <div class="x_title">
                    @if(!empty($user) && $user->id !=0)
                    <h2>Cập nhật người dùng <small><button type="submit" class="btn btn-info"><i class="fa fa-save"> Lưu</i></button></small></h2>

                    @else
                    <h2>Thêm mới người dùng <small><button type="submit" class="btn btn-info"><i class="fa fa-save"> Lưu</i></button></small></h2>

                    @endif
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        @if(!empty($user) && $user->id !=0)
                                        <h4 class="panel-title">Cập nhật người dùng </h4>
                                        <input class="form-control" name="id" value="{{$user -> id }}" type="hidden" />
                                        @else
                                        <h4 class="panel-title">Thêm người dùng</h4>
                                        @endif

                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Tên người dùng <i class="required"> * </i></label>
                                                <input class="form-control" name="full_name" value="{{$user -> full_name }}" type="text" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Email<i class="required"> * </i></label>   
                                                <input class="form-control" name="email" value="{{$user -> email }}" type="email" required />                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Tên đăng nhập <i class="required"> * </i></label>
                                                <input class="form-control" type="text" value="{{ $user->name }}" name="name" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Mật khẩu <i class="required"> * </i></label>
                                                <input class="form-control" type="text" value="{{ $user->password }}" name="password" required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Hình ảnh </label>
                                                <input class="form-control" name="avatar" type="file"  onchange="changeFile(this)"/>
                                            </div>
                                            <div class="col-md-6">                                        
                                               <div class="class-radio">          
                                                    @if(!empty($user->isAdmin))
                                                        <input  name="isAdmin" type="radio" value="0" {{$user->isAdmin==0 ? "checked" : ""}}/> Không phải admin
                                                        <input  name="isAdmin" type="radio" value="1"  {{$user->isAdmin==1 ? "checked" : ""}}  style="margin-left: 30px;"/> Là admin
                                                    @else
                                                        <input  name="isAdmin" type="radio" value="0" checked/> Không phải admin
                                                        <input  name="isAdmin" type="radio" value="1"  style="margin-left: 30px;"/> Là admin
                                                    @endif                           
                                                   
                                               </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <div id="row-img">
                                                    @if(!empty($user) && !empty($user->avatar) && $user->id !=0)
                                                        <img src="{{url('/image')}}/{{$user -> avatar}}" class="img-thumbnail row-image">
                                                    @endif
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

<!-- <script>
   CKEDITOR.replace('classNoiDung');

</script> -->

@stop