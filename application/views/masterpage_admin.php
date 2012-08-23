<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="<?= base_url();?>css/style_admin.css">
	<script src="<?= base_url(); ?>js/jquery-1.7.2.js" type="text/javascript"></script>
	<script src="<?= base_url(); ?>js/onstart.js" type="text/javascript"></script>
	<script src="<?= base_url(); ?>js/tiny_mce/tiny_mce.js" type="text/javascript"></script>
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

	<header>
		<div class="top-row"></div>
		<div class="status-row">
		  <a class="fleft" href="home"><img height="180px" src="<?= base_url(); ?>images/oie_transparent.jpg"/></a>
		  <div class="fleft" style="padding-top:55px;font-family: Verdana, sans-serif;">
  		    <h2 style="margin:0px;color:#BFBFBF">County Waterford S.B.&P. </h2>
		    <label style="font-size:19px;">Association of New York, Inc.</label>
		  </div>
		  <div class="status">
			Logged In as Admin | <?= anchor_popup(base_url(),"View Website") ?> | <?= anchor("login/logout","Logout")?>
		  </div>
		</div>
		<div class="sf-menu">
		  <ul>
		    <li><a href="<?= base_url(); ?>/home/admin">Home</a></li>
			<li><a href="<?= base_url(); ?>/admin_members">Members</a></li>
			<li><a href="<?= base_url(); ?>/admin_news">News</a></li>
			<li><a href="<?= base_url(); ?>/admin_photos">Photos</a></li>
		  </ul>
		</div>
	</header>
	<section class="wrapper" >
		<div id="content">
			<mp:Content />
		</div>
	</section>
	<!-- Footer -->
	<footer>
		<div class="inner">
			County Waterford(c) 2012 | All Rights Reserved
		</div>
	</footer>
</body></html>
