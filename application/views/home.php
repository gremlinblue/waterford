<script type="text/javascript" src="<?= base_url(); ?>js/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript">
function show_partial(container){

    $(container).attr("style","height:380px;overflow:hidden");
	$(container).siblings('#readmore').toggle(
	  function() { $(container).removeAttr("style"); },
      function() { $(container).attr("style","height:380px;overflow:hidden").fadeIn(); }
    );

}

$(document).ready(function() {
  show_partial($("article"));
  $('#gallery a').lightBox(
    {imageLoading: '<?= base_url();?>images/lightbox-ico-loading.gif',
	 imageBtnClose: '<?= base_url();?>/images/lightbox-btn-close.gif',
	 imageBtnPrev: '<?= base_url();?>/images/lightbox-btn-prev.gif',
	 imageBtnNext: '<?= base_url();?>/images/lightbox-btn-next.gif'
	});
});
</script>
<article class="no_pads">
<h3>Welcome!</h3>
<p>A message from the President…………..</p>
<p>We think of our organization as the American arm of the Waterford County government, dedicated to the advancement of Waterford County in the United States whether it be Waterford business, tourism, or simply an appreciation of the history of the county, be it Brother Rice or General Meagher.</p>
<p>To facilitate the transmission of information about the county, we have established this web site on the Internet, www.countywaterford.org which will bring messages on Waterford County to the world at large.</p>
<p>Our ambition is to serve as an outpost here in America and to the world for all things touching upon Waterford County.</p>
<p>I would like to hear from you for your comments.</p>
<p>Please email me at County Waterford Email.</p>

<br/>
<p>Sincerely yours,</p>
<p>Peter Albert McKay,</p>
<p>President</p>
<p>County Waterford S.B & P</p>
</article>
<a href="" id="readmore" class="button">Read More</a>

<? if(!empty($photos)): ?>
<div id="gallery" style="padding-top:30px">
<? foreach($photos as $photo): ?>
  <div class="fleft image" style="margin-right:20px">
    <a href="<?= base_url(); ?>images/uploads/<?=$photo->filename?>" title="<?= $photo->comment ?>">
      <img src="<?= base_url(); ?>images/timthumb.php?src=<?= base_url();?>images/uploads/<?=$photo->filename?>&w=110&h=110"/>
    </a>
  </div>
<? endforeach ?>
</div>
<div class="fright" style="padding-top:10px;">
  <a class="button" href="<?= base_url(); ?>home/gallery">More Pics</a>
</div>
<? endif ?>

