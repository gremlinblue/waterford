<script type="text/javascript" src="<?= base_url(); ?>js/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript">
$(document).ready(function() {
  $(".gallery a").lightBox(
    {imageLoading: '<?= base_url();?>images/lightbox-ico-loading.gif',
	 imageBtnClose: '<?= base_url();?>/images/lightbox-btn-close.gif',
	 imageBtnPrev: '<?= base_url();?>/images/lightbox-btn-prev.gif',
	 imageBtnNext: '<?= base_url();?>/images/lightbox-btn-next.gif'}
  );
});
</script>
<h3>Gallery</h3>
<div class="gallery">
<? foreach($photos as $index => $photo): ?>
  <? if($index%4 == 0 && $index!=0): ?>
  </div>
  <div class="gallery">
  <? endif ?>
  <div class="fleft image" style="margin-right:20px">
    <a href="<?= base_url(); ?>images/uploads/<?=$photo->filename?>" title="<?= $photo->comment ?>">
      <img src="<?= base_url(); ?>images/timthumb.php?src=<?= base_url();?>images/uploads/<?=$photo->filename?>&w=110&h=110"/>
    </a>
  </div>
<? endforeach ?>
</div>

