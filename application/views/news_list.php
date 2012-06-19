<h3>Latest News</h3>
<ul class="news-list">
	<? foreach($news as $n): ?>
	
	<li>
		<?= anchor("/news/page/".$n->id, $n->title) ?>
		<span class="date"><?= strftime('%m.%d.%Y', strtotime($n->date_created)) ?></span>
	</li>
	<? endforeach; ?>
</ul>
<a href="http://static.livedemo00.template-help.com/wt_39101/more.html" class="button">Read More</a>
