<!DOCTYPE html>
<html lang="en">
<head>
	<title>Logins List</title>
</head>
<body>

<div id="container">
  <table border=1>
  
    <thead>
      <th>
      asdf
      </th>
    </thead>
	
  <? foreach($logins as $k => $v): ?>
    <tr>
	  <td><?= "$k  -  $v"?></td>
	</tr>
  <? endforeach; ?>
  </table>
</div>

</body>
</html>