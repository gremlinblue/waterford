<article>
  <h3><?= $news->title ?></h3>
  <!--div><?= ucwords($author->lastname.', '.$author->firstname) ?></div-->
  <span class="date"><?= strftime('%m.%d.%Y',strtotime($news->date_created)); ?></span>
  <?= $news->news ?>
</article>
