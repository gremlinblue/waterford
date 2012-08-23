<?= form_open("admin_members/save_list") ?>
<table class="box-table">

<thead>
  <? foreach($columns as $k => $v): ?>
	<th><?= $k ?></th>
  <? endforeach; ?>
  <th>
  </th>
</thead>

<? foreach($persons as $k => $v):?>
<tr>
  <? foreach(array_keys($columns) as $col): ?>
	 <td>
	   <? if($col == 'is_active'): ?>
	     <?= $v->$col ? 'TRUE' : 'FALSE' ?>
		 
	   <? elseif($col == 'role'): ?>
	     <?= $roles[$v->$col]; ?>
		 
	   <? else: ?>
	     <?= $v->$col; ?>
	   <? endif;?>
	   
	 </td>
  <? endforeach; ?>
  <td><?= anchor("admin_members/edit/".$v->id, "Edit", "class=button") ?></td>
</tr>
<? endforeach; ?>
</table>

<div style="padding:15px 0;" class="fright">
  <?= anchor("admin_members/create", "Create", "class='button'") ?>
  <?= form_submit(array("id" => 'save', "style" => 'display:none'), 'Save')?>
  <!--a class="button" href="javascript:$('#save').click();">Save</a-->
  <a class="button" href="javascript:history.back()">Cancel</a>
</div>
<?= form_close() ?>

