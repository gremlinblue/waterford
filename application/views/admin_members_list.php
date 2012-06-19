<!DOCTYPE html>
<html lang="en">
<head>
	<title>Members List</title>
</head>
<body>

<div id="container">
  <table border=1>
  
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
		   <?= $v->$col ?>
		 </td>
	  <? endforeach; ?>
	  <td><?= anchor("members/edit/".$v->id, "edit") ?></td>
	</tr>
  <? endforeach; ?>
  </table>
  <?= form_open("members/create") ?>
    <?= form_submit('create', 'Create')?>
  <?= form_close() ?>
  
</div>

</body>
</html>