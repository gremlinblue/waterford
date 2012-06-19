<!DOCTYPE html>
<html lang="en">
<head>
	<title>News Edit</title>
</head>
<body>

<div id="container">
  
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
   <?= form_fieldset('Newsletter Form')?>

      <?= form_label('ID') ?>
	  <?= form_hidden('id', $id) ?>
	  <?= form_label($id) ?><br>
	  
	  <?= form_label('Title', 'title' ) ?>
      <?= form_input('title', $title) ?>
	  
	  <?= form_label('News', 'news') ?>
	  <?= form_textarea('news', $news) ?>
	  
	  <?= form_label('Author', 'author_id') ?>
	  <?= form_dropdown('author_id', $persons, $author_id) ?>
	  
	  <?= form_label('Frontpage', 'frontpage') ?>
	  <?= form_checkbox('frontpage', 1, $frontpage) ?>
	  
	  <?= form_label('Published', 'published') ?>
	  <?= form_checkbox('published', 1, $published) ?>
	  
	  <?= form_label('Broadcast', 'broadcast') ?>
	  <?= form_checkbox('broadcast', 1, true) ?>
	    
      <?= form_submit('save', 'Save')?>
	  <a href="javascript:history.back()">go back</a>
    
    <?= form_fieldset_close()?>
  <?= form_close() ?>
  
</div>

</body>
</html>