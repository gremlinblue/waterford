<h3>Latest News</h3>
<ul class="news-list">
	<? foreach($news as $n): ?>
	
	<li>
		<?= anchor("/news/page/".$n->id, $n->title) ?>
		<span class="date"><?= strftime('%m.%d.%Y', strtotime($n->date_created)) ?></span>
	</li>
	<? endforeach; ?>
</ul>
