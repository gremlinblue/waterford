<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		width : "720",
		height: "640"
	});
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<?
$id               = null;
$filename         = null;
$hash             = null;
$comment          = null;
$frontpage        = null;
$published        = null;
$date_created     = null;
$date_updated     = null;

if(isset($photo)){
  $id               = $photo->id;
  $filename         = $photo->filename;
  $hash             = $photo->hash;
  $comment          = $photo->comment;
  $frontpage        = $photo->frontpage;
  $published        = $photo->published;
  $date_created     = $photo->date_created;
  $date_updated     = $photo->date_updated;
}

?>

<?= form_open_multipart("admin_photos/save") ?>

  <?= form_hidden('id', $id) ?>
  <?= form_hidden('hash', $hash) ?>
  
  <div class="container_inner">
    <?= form_label('Filename', 'filename' ) ?>
	<p>Locate photo to upload</p>
	<input type="file" name="filename" />
	<label style="color:red;"><?= $error ?></label>
  </div>
  
  <div class="container_inner">
    <?= form_label('Comment', 'comment') ?>
	<p>Please do tell us about it?</p>
    <?= form_textarea('comment', $comment) ?>
  </div>
  
  <div class="container_inner">
    <?= form_label('Frontpage', 'frontpage') ?>
	<p>Shall I bring this photo on the site frontpage?</p>
    <?= form_checkbox('frontpage', 1, $frontpage) ?>
  </div>
  
  <div class="container_inner">
    <?= form_label('Published', 'published') ?>
	<p>Published photos will be listed after the frontpage artcles</p>
    <?= form_checkbox('published', 1, $published) ?>
  </div>
  
  <div class="container_inner" style="border:none;padding-top:6px">
    <?= form_submit(array("id" => 'save', "style" => 'display:none'), 'Save')?>
    <a class="button" href="javascript:$('#save').click();">Save</a>
    <a class="button" href="javascript:history.back()">Cancel</a>
  </div>

<?= form_close() ?>