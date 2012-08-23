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
$title            = null;
$news             = null;
$author_id        = null;
$frontpage        = null;
$published        = null;
$date_broadcasted = null;
$date_created     = null;
$date_updated     = null;

if(isset($newsletter)){
  $id               = $newsletter->id;
  $title            = $newsletter->title;
  $news             = $newsletter->news;
  $author_id        = $newsletter->author_id;
  $frontpage        = $newsletter->frontpage;
  $published        = $newsletter->published;
  $date_broadcasted = $newsletter->date_broadcasted;
  $date_created     = $newsletter->date_created;
  $date_updated     = $newsletter->date_updated;
}

?>

<?= form_open("admin_news/save") ?>

  <?= form_hidden('id', $id) ?>
  <div class="container_inner">
    <?= form_label('Title', 'title' ) ?>
	<p>What is your article about?</p>
    <?= form_input('title', $title) ?>
  </div>
  
  <div class="container_inner">
    <?= form_label('News', 'news') ?>
	<p>Please do tell us about it?</p>
    <?= form_textarea('news', $news) ?>
  </div>
  
  <div class="container_inner">
    <?= form_label('Author', 'author_id') ?>
    <p>Who wrote this article?</p>
    <?= form_dropdown('author_id', $persons, $author_id) ?>
  </div>
  
  <div class="container_inner">
    <?= form_label('Frontpage', 'frontpage') ?>
	<p>Shall I bring this article on the site frontpage?</p>
    <?= form_checkbox('frontpage', 1, $frontpage) ?>
  </div>
  
  <div class="container_inner">
    <?= form_label('Published', 'published') ?>
	<p>Published articles will be listed after the frontpage artcles</p>
    <?= form_checkbox('published', 1, $published) ?>
  </div>
  
  <div class="container_inner">
    <?= form_label('Broadcast', 'broadcast') ?>
	<p>Notify all members of this site about this article</p>
    <?= form_checkbox('broadcast', 1, false) ?>
  </div>
	
  <div class="container_inner" style="border:none;padding-top:6px">
    <?= form_submit(array("id" => 'save', "style" => 'display:none'), 'Save')?>
    <a class="button" href="javascript:$('#save').click();">Save</a>
    <a class="button" href="javascript:history.back()">Cancel</a>
  </div>

<?= form_close() ?>