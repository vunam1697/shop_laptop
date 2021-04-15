@extends('admin._layout')
@section('main')
<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-tasks fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{ count($sanpham) }}
						</div>
						<div>Sản phẩm!</div>
					</div>
				</div>
			</div>
			<a href="{{ route('product.index') }}">
				<div class="panel-footer">
					<span class="pull-left">Xem chi tiết</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-folder-o fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{ count($tintuc) }}
						</div>
						<div>Tin Tức!</div>
					</div>
				</div>
			</div>
			<a href="{{ route('news.index') }}">
				<div class="panel-footer">
					<span class="pull-left">Xem chi tiết</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-yellow">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-shopping-cart fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{ count($donhang) }}
						</div>
						<div>Hóa Đơn!</div>
					</div>
				</div>
			</div>
			<a href="{{ route('order.index') }}">
				<div class="panel-footer">
					<span class="pull-left">Xem chi tiết</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-user fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{ count($user) }}
						</div>
						<div>Người dùng!</div>
					</div>
				</div>
			</div>
			<a href="{{ route('user.index') }}">
				<div class="panel-footer">
					<span class="pull-left">Xem chi tiết</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>
@stop