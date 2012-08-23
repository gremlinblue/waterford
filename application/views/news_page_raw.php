<html lang="en">
<head>
	<link rel="stylesheet" href="<?= base_url();?>css/style.css">
	
	<title>County Waterford S.B.& P.</title>
</head>

<body>
	<div class="main_wrapper">
		<section id="content">
			<div class="main_container">
				<div class="vr-border-1">
					<div class="grid rightpane">
						<article>
						  <h3><?= $news->title ?></h3>
						  <div><?= ucwords($author->lastname.', '.$author->firstname) ?></div>
						  <span class="date"><?= strftime('%m.%d.%Y',strtotime($news->date_created)); ?></span>
						  <?= $news->news ?>
						</article>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</section>
	</div>	
</body>
</html>
