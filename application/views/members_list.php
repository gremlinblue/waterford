<h3>Members</h3>
<table class="members">
  <thead>
    <tr>
      <th class="col"><label>Name</label></th>
      <th class="col"><label>Address</label></th>
      <th class="col"><label>Tel. No.</label></th>
      <th class="col"><label>Email</label></th>
    </tr>
  </thead>
  <tbody>
	<? foreach($members as $m): ?>
	<tr>
	  <td class="cell_value"><label><?= $m->lastname.', '.$m->firstname ?></label></td>
	  <td class="cell_value"><label><?= $m->address ?></label></td>
	  <td class="cell_value"><label><?= $m->telephone_number ?></label></td>
	  <td class="cell_value"><label><?= $m->email ?></label></td>
	</tr>
	<? endforeach; ?>
  </tbody>
</table>
