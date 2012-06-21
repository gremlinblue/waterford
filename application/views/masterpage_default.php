<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="<?= base_url();?>css/style.css">
	<script src="<?= base_url(); ?>js/jquery-1.7.2.js" type="text/javascript"></script>
	<script src="<?= base_url(); ?>js/onstart.js" type="text/javascript"></script>
	<script type="text/javascript">
	  $(document).ready(function() {
		set_menu_active("<?= $active_link ?>");
	  });
	</script>
</head>

<body>
<div id="lightbox" class="white_content"><div></div></div>
<div id="fade" class="black_overlay"></div>
	<header>
		<div class="top-row">
		    <a href="<?= base_url();?>"><img src="<?= base_url(); ?>images/logo.png"/></a>
		</div>
		<nav>
			<ul class="sf-menu">
				<li>
					<a href="/home">
						Home
						<b>Start Page</b>
					</a>
				</li>
				<li>
					<a href="/news">
						News
						<b>Get Updated</b>
					</a>
				</li>
				<li>
					<a href="/members">
						Members
						<b>Family and Friends</b>
					</a>
				</li>
				<li>
					<a href="/about_us">
						About Us
						<b>Who we are</b>
					</a>
				</li>
				<li>
					<a href="/contact_us">
						Contact Us
						<b>Call me, maybe</b>
					</a>
				</li>
				<li>
					<!--form id="search">
					 <a class="fright" onclick="document.getElementById('search').submit()"></a>
					 <input name="head-search" type="text">
					</form-->
					
					<? if ( isset($this->session->userdata['username']) ): ?>
					  <a href="/login/logout">
						Logout
						<b><?= $this->session->userdata['username']?></b>
					  </a>
					<? else: ?>
					  <a href="javascript:show_replace_content($('#lightbox'),'/login');">
						Login
						<b>For Admins</b>
					  </a>
					<? endif; ?>
				</li>
			</ul>
			
			<div class="clear"></div>
		</nav>
	</header>

	<section id="content">
		<div class="main_container">
			<div class="vr-border-1">
			    <div class="grid leftpane">
					<mp:Navcontent />
				</div>
				<div class="grid rightpane">
					<mp:Content />
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</section>
	<!-- Footer -->
	<footer>
		<div class="inner">
			County Waterford(c) 2012 | All Rights Reserved
		</div>
	</footer>
</body></html>
