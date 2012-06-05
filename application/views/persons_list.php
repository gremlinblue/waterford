<!DOCTYPE html>
<html lang="en">
<head>
	<title>Persons List</title>
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
	    <td><?= $v->$col ?></td>
	  <? endforeach; ?>
	  <td><?= link_to($v, $v->id, 'person_edit'); ?></td>
	</tr>
  <? endforeach; ?>
  </table>
  
  
</div>

</body>
</html>