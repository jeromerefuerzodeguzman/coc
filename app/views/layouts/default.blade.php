<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>NSI Code of Conduct</title>
		{{ HTML::style('css/normalize.css') }}
		{{ HTML::style('css/foundation.css') }}
		{{ HTML::style('css/main.css') }}
		{{ HTML::style('css/datepicker.css') }}
		{{ HTML::style('css/foundation-icons-general/stylesheets/general_foundicons.css') }}
		{{ HTML::script('js/vendor/custom.modernizr.js') }}
	</head>
	<body>
		<div id="content">
			<nav class="top-bar">
				<ul class="title-area">
				    <li class="name">
				      	<h1><a href="#">Northstar Solutions Inc.</a></h1>
				    </li>
    				<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
			  	</ul>
			  	<section class="top-bar-section">
			  		<ul class="right">
			  			<li class="divider"></li>
			  			<li><a href="#">Welcome TEST, USER</a></li>
			  			<li class="divider"></li>
			  			<li>{{ HTML::link("logout", "Logout") }}</li>
			  		</ul>
			  	</section>
			</nav>
			<div class="row">
				<div class="large-12 columns">
					<h1><a href="#">COC</a></h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					{{ Session::get('breadcrumbs') }}
				</div>
			</div>
			<div class="row">
				<div class="large-3 columns">
					<!-- SIDEBAR -->
				</div>
				<div class="large-9 columns main-content">
					<h3>@yield('title')</h3>
					<hr />
					<div class="row">
						<div class="large-12 columns">
							@yield('content')
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<hr>
					<h6><small>Copyright 2013 Northstar Solutions Inc.</small></h6>
				</div>
			</div>
			@yield('popups')
		</div>
		
		<!-- Check for Zepto support, load jQuery if necessary -->
		<script>

		  document.write('<script src={{ URL::to('/') }}/js/vendor/'
		    + ('__proto__' in {} ? 'zepto' : 'jquery')
		    + '.js><\/script>');
		</script>
		{{ HTML::script('js/vendor/jquery.js') }}
		{{ HTML::script('js/foundation.min.js') }}
		{{ HTML::script('js/datepicker/datepicker.js') }}
		{{ HTML::script('js/foundation/foundation.tooltips.js') }}
		<script>
			$(function(){
			    $(document).foundation();    
			})
		</script>
		@yield('scripts')
	</body>
</html>