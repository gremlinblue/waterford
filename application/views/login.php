<?= form_open("login", array("style","display:block")) ?>
<?= form_fieldset("Login") ?>  
  <table>
    <tr>
	  <td><?= form_label('Email', 'email') ?></td>
	  <td><?= form_input('email', set_value('email'), 'id="email" autofocus') ?></td>
	</tr>
	<tr>
	  <td><?= form_label('Password', 'password') ?></td>
	  <td><?= form_password('password', '', 'id="password"' ) ?></td>
	</tr>
	<tr>
	  <td colspan="2">
	     <?= form_submit(array("id" => 'login_submit',
							   "style" => 'display:none'), 'Login')?>
		 <a class="button" href="javascript:$('#login_submit').click();">Login</a>
		 <a class="button" onclick="javascript:hide_lightbox($(':input').parents('div.white_content'));">Cancel</a>
	  </td>
	</tr>
	<tr>
	  <td colspan="2"><?= validation_errors(); ?></td>
	</tr>
  </table>
<?= form_fieldset_close() ?>
<?= form_close() ?>
