<script type="text/javascript">
	$(document).ready(function(){
	  truncate('.news');
	});
	
	function pop_up_warning(){
	  return confirm("Click 'Yes' to confirm broadcast.");
	}
</script>
<?= form_open("admin_news/save_list") ?>
<table class="box-table">

<thead>
  <? foreach($columns as $k => $v): ?>
	<th><?= $k ?></th>
  <? endforeach; ?>
  <th>
  </th>
  <th>
  </th>
</thead>

<? foreach($news as $k => $v):?>
<tr>
  <? foreach(array_keys($columns) as $col): ?>
	 <td>
	   <? if( in_array($col, array('frontpage', 'published'))): ?>
	     <?= $v->$col ? 'TRUE' : 'FALSE' ?>
	   <? elseif ($col == 'author_id'): ?>
	     <?= $persons[$v->$col]; ?>
	   <? elseif ($col == 'news'): ?>
	     <div class="ellipsed_div"><?= $v->$col; ?></div>
	   <? else: ?>
	     <?= $v->$col ?>
	   <? endif; ?>
	 </td>
  <? endforeach; ?>
  <td><?= anchor("admin_news/edit/".$v->id, "Edit", "class=button") ?></td>
  <td><?= anchor("admin_news/broadcast/".$v->id, "Broadcast", "class=button onclick='return pop_up_warning();'") ?></td>  
</tr>
<? endforeach; ?>
</table>
  
<div style="padding:15px 0;" class="fright">
  <?= anchor("admin_news/create", "Create", "class='button'") ?>
  <?= form_submit(array("id" => 'save', "style" => 'display:none'), 'Save')?>
  <!--a class="button" href="javascript:$('#save').click();">Save</a-->
  <a class="button" href="javascript:history.back()">Cancel</a>
</div>
<?= form_close() ?>