<script type="text/javascript">
	/*$(document).ready(function(){
	  truncate('.news');
	});*/
</script>
<?= form_open("admin_news/save_list") ?>
<table class="box-table">

<thead>
  <? foreach($columns as $k => $v): ?>
	<th><?= $k ?></th>
  <? endforeach; ?>
  <th>
  </th>
</thead>

<? foreach($photos as $k => $v):?>
<tr>
  <? foreach(array_keys($columns) as $col): ?>
	 <td>
	   <? if( in_array($col, array('frontpage', 'published'))): ?>
	     <?= $v->$col ? 'TRUE' : 'FALSE' ?>
	   <? elseif($col == 'filename'): ?>
	     <img src='<?= base_url(); ?>/images/uploads/<?= $v->$col ?>' width="100" height="100"/>
	   <? else: ?>
	     <?= $v->$col ?>
	   <? endif; ?>
	 </td>
  <? endforeach; ?>
  <td><?= anchor("admin_photos/edit/".$v->id, "Edit", "class=button") ?></td>
</tr>
<? endforeach; ?>
</table>
  
<div style="padding:15px 0;" class="fright">
  <?= anchor("admin_photos/create", "Create", "class='button'") ?>
  <?= form_submit(array("id" => 'save', "style" => 'display:none'), 'Save')?>
  <!--a class="button" href="javascript:$('#save').click();">Save</a-->
  <a class="button" href="javascript:history.back()">Cancel</a>
</div>
<?= form_close() ?>