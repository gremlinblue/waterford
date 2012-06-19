<?= form_open("login") ?>

  <?= form_fieldset('Login')?>
  
	<?= form_label('Email', 'email') ?>
	<?= form_input('email', set_value('email'), 'id="email" autofocus') ?>
	
	<?= form_label('Password', 'password') ?>
	<?= form_password('password', '', 'id="password"' ) ?>
	
  <?= form_submit('submit', 'Login')?>
  <?= form_fieldset_close()?>
  
<?= form_close() ?>
<?= validation_errors(); ?>