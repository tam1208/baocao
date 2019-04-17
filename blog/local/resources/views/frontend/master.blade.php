<!DOCTYPE html>
<html>
<head>
	<base href="{{asset('public/layout/frontend')}}/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Hagola Shop - @yield('title')</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/home.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		$(function() {
			var pull        = $('#pull');
			menu        = $('nav ul');
			menuHeight  = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>
</head>
<body>    
	<!-- header -->
	<header id="header">
		<div class="container">
			<div class="row">
				<div id="logo" class="col-md-3 col-sm-12 col-xs-12">
					<h1>
						<a href="{{asset('/')}}"><img src="img/home/aaa.png" width="200px"></a>						
						<nav><a id="pull" class="btn btn-danger" href="#">
							<i class="fa fa-bars"></i>
						</a></nav>			
					</h1>
				</div>

				<div class="col-md-7 col-sm-12 col-xs-12" id="search-bar" style="margin: 10px 0 0 0;">
					<br/>
					<form class="navbar-form" role="search" method="get" action="{{asset('search/')}}">
						<div class="input-group">
							<div class="input-group-btn">
								<input type="text" name="result" placeholder="Tìm kiếm..." class="form-control">
							</div>
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search">Tìm kiếm</i></button>
							</div>
						</div>
					</form>	
				</div>
				<div id="cart" class="col-md-2 col-sm-12 col-xs-12">
					<a class="display" href="{{asset('cart/show')}}">Giỏ hàng</a>
					<a href="{{asset('cart/show')}}">{{Cart::count()}}</a>				    
				</div>
			</div>			
		</div>
	</header><!-- /header -->
	<!-- endheader -->

	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						<ul>
							<li class="menu-item">Danh mục sản phẩm</li>
							@foreach($categories as $cate)
							<li class="menu-item"><a href="{{asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}" title="">{{$cate->cate_name}}</a></li>
							@endforeach				
						</ul>
						<!-- <a href="#" id="pull">Danh mục</a> -->
					</nav>

					<div id="banner-l" class="text-center">
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-1.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-2.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-3.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-4.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-5.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-6.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-7.png" alt="" class="img-thumbnail"></a>
						</div>
					</div>
				</div>
				<!--Wrap-->
				@yield('main')
			</div>
		</div>
	</section>
	<!-- endmain -->

	<!-- footer -->
	<footer id="footer">			
		<div id="footer-t">
			<div class="container">
				<div class="row">				
					<div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">						
						<a href="{{asset('/')}}"><img src="img/home/aaa.png" width="250px" height="100"></a>		
					</div>
					<div id="about" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Giới thiệu Hagola</h3>
						<p class="text-justify">Hệ thống bán lẻ điện thoại di động Hagola đã có gần 10 năm trong lĩnh vực bán lẻ các sản phẩm công nghệ với 22 cửa hàng tại Hà Nội và Hồ Chí Minh và là 1 trong 5 hệ thống lớn lớn nhất tại Việt nam cùng Thegiodidong, FPTshop, VienthongA và Viettel Store.</p>
					</div>
					<div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Thông tin liên hệ</h3>
						<p>Phone Sale: 070 695 3599</p>
						<p>Email: nampro@gmail.com</p>
					</div>
					<div id="contact" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Địa chỉ cửa hàng</h3>
						<p>Address 1: 180 Cao Lỗ, Phường 4, Quận 8, Tp. Hồ Chí Minh</p>
						<p>Address 2: 276 Điện Biên Phủ, P.17, Q.Bình Thạnh, TP.HCM</p>
					</div>
				</div>				
			</div>
			<div id="footer-b">				
				<div class="container">
					<div class="row">
						<div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>Học viện Công nghệ Nampro - www.nampro.edu.vn</p>
						</div>
						<div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>© 2019 Nampro Academy. All Rights Reserved</p>
						</div>
					</div>
				</div>
				<div id="scroll">
					<a href="#"><img src="img/home/scroll.png"></a>
				</div>	
			</div>
		</div>
	</footer>
	<!-- endfooter -->
</body>
</html>