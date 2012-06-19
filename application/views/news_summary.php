<? foreach($news as $n): ?>
  <article>
    <h3><?= $n->title ?></h3>
	<div style="height:110px; overflow:hidden"><?= $n->news ?></div>
  </article>
  <?= anchor("/news/page/".$n->id, "Read More", "class='button'") ?>
<? endforeach;?>