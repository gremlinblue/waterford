<!DOCTYPE html>
<html lang="en">
<head>
	<title>Newsletters List</title>
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
	
  <? foreach($news as $k => $v):?>
    <tr>
	  <? foreach(array_keys($columns) as $col): ?>
	     <td>
		   <?= $v->$col ?>
		 </td>
	  <? endforeach; ?>
	  <td><?= anchor("admin_news/edit/".$v->id, "edit") ?></td>
	  <td><?= anchor("admin_news/broadcast/".$v->id, "broadcast") ?></td>
	</tr>
  <? endforeach; ?>
  </table>
  <?= form_open("admin_news/create") ?>
    <?= form_submit('create', 'Create')?>
  <?= form_close() ?>
  
</div>

</body>
</html>