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
	<title>County Waterford S.B.& P.</title>
</head>

<body>
	<div id="lightbox" class="white_content"><div></div></div>
	<div id="fade" class="black_overlay"></div>
	<div class="main_wrapper">
		<header>
			<div class="top-row" style="width:660px">
				<a class="fleft" href="<?= base_url();?>"><img height="180px" src="<?= base_url(); ?>images/oie_transparent.jpg"/></a>
				<div class="fleft" style="padding-top:45px;font-family: Verdana, sans-serif;">
				  <h2 style="padding:0px;margin:0px;color:#BFBFBF">County Waterford S.B.&P. </h2>
				  <label style="font-size:19px;letter-spacing:2px;padding:0px 40px">Association of New York, Inc.</label>
				</div>
				<!--a href="<?= base_url();?>"><img src="<?= base_url(); ?>images/logo.png"/></a-->
			</div>
			<nav>
				<ul class="sf-menu">
					<li>
						<a href="<?= base_url(); ?>home">
							Home
							<b>Start Page</b>
						</a>
					</li>
					<li>
						<a href="<?= base_url(); ?>news">
							News
							<b>Get Updated</b>
						</a>
					</li>
					<li>
						<a href="<?= base_url(); ?>members">
							Members
							<b>Family and Friends</b>
						</a>
					</li>
					<li>
						<a href="<?= base_url(); ?>about_us">
							About Us
							<b>Who we are</b>
						</a>
					</li>
					<li>
						<a href="<?= base_url(); ?>contact_us">
							Contact Us
							<b>Call me, maybe</b>
						</a>
					</li>
					<li>
						<? if ( !isset($this->session->userdata['username']) ): ?>
						<a href="<?= base_url(); ?>login">
							Login
							<b>For Admins</b>
						</a>
						<? else: ?>
						<a href="<?= base_url(); ?>login/logout">
							Logout
							<b>Goodbye</b>
						</a>
						<? endif; ?>
					</li>
				</ul>
				
				<div class="clear"></div>
			</nav>
		</header>
		
		<section id="content">
			<div class="main_container">
				<mp:Maincontent />
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
	</div>
	<!-- Footer -->
	<footer>
		<div class="inner">
			County Waterford(c) 2012 | All Rights Reserved
		</div>
	</footer>
</body>
</html>
