<? $error = null; 
   if(isset($this->error))
     $error = $this->error; ?>

<div class="login">
  <?= form_open("login", array("style","display:block")) ?>
    
  <div>
    <p class="greeting"><?= form_label('Welcome and Good day!') ?></p>
    <p><?= form_label('Email', 'email') ?></p>
    <?= form_input('email', set_value('email'), 'id="email" autofocus') ?>    
  </div>

  <div>
    <p><?= form_label('Password', 'password') ?></p>
    <?= form_password('password', '', 'id="password"' ) ?>
  </div>
  
  <div style='padding-top:20px'>
    <?= form_submit(array("id" => 'login_submit',
							   "style" => 'display:none'), 'Login')?>
	<!-- a class="normal_button fright" onclick="javascript:hide_lightbox($(':input').parents('div.white_content'));" style="margin-top:-15px">Cancel</a-->
	<a class="normal_button fright" href="javascript:$('#login_submit').click();" style="margin:-15px 10px">Login</a>
	<a style="color:#CE6200;" href="<?= base_url(); ?>login/signup"><?= form_label('Click here to Register!') ?></a>
  </div>
  
  <div>  
    <?= validation_errors(); ?>
	<?= $error ?>
  </div>
<?= form_close() ?>
</div>
