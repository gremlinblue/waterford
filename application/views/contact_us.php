<h3>Contact Us</h3>
<?= form_open("contact_us/send") ?>
<table style="padding:0 0 8px">
  <tr>
    <?
	  $data = array(
  	   'name'        => 'name',
	   'maxlength'   => '100',
	   'size'        => '53'
	  );
	?>
	<td><?= form_label('Name: ', 'name' ) ?></td>
    <td><?= form_input(array('name' => 'name',
	                         'maxlength' => '100',
							 'size' => '53')) ?></td>
  </tr>
  <tr>
    <td><?= form_label('Email: ', 'email' ) ?></td>
    <td><?= form_input(array('name' => 'name',
	                         'maxlength' => '100',
							 'size' => '53')) ?></td>
  </tr>
  <tr>  
    <td><?= form_label('Message: ', 'msg') ?></td>
    <td><?= form_textarea('msg') ?></td>
  </tr>
</table>
<a id="submit" href="javascript:$('#submit').parent().submit()" class="button">Send Message</a>
<a href="javascript:history.back()" class="button">Back</a>
<?= form_close() ?>