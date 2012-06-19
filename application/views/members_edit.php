<!DOCTYPE html>
<html lang="en">
<head>
	<title>Person Edit</title>
</head>
<body>

<div id="container">
  
  <?
    $id = null;
	$firstname = null;
	$lastname = null;
	$address = null;
	$telephone_number = null;
	$email = null;
	$is_active = null;
	$role = null;
	
    if(isset($person)){
	  $id = $person->id;
	  $firstname = $person->firstname;
	  $lastname = $person->lastname;
	  $address = $person->address;
	  $telephone_number = $person->telephone_number;
	  $email = $person->email;
	  $is_active = $person->is_active;
	  $role = $person->role;
	}
	
	$login_id = null;
	$username = null;
	if(isset($login)){
	  $username = $login->username;
	  $login_id = $login->id;
	}
	
  ?>
  
  <?= form_open("members/save") ?>
   <?= form_fieldset('Member Form')?>

      <?= form_label('ID') ?>
	  <?= form_hidden('id', $id) ?>
	  <?= form_label($id) ?><br>
	  
	  <?= form_label('Username', 'username' ) ?>
	  <?= form_hidden('login_id', $login_id) ?>
	  <?= form_input('username', $username) ?>
	  
	  <?= form_label('Firstname', 'firstname' ) ?>
      <?= form_input('firstname', $firstname) ?>
	  
	  <?= form_label('Lastname', 'lastname' ) ?>
      <?= form_input('lastname', $lastname) ?>
	  
	  <?= form_label('Address', 'address') ?>
	  <?= form_textarea('address', $address) ?>
	  
	  <?= form_label('Tel #', 'telephone_number') ?>
	  <?= form_input('telephone_number', $telephone_number) ?>
	  
	  <?= form_label('Email', 'email') ?>
	  <?= form_input('email', $email) ?>
	  
	  <?= form_label('Active', 'is_active') ?>
	  <?= form_checkbox('is_active', 1, $is_active) ?>
	  
	  <?= form_label('Role', 'role') ?>
	  <?= form_dropdown('role', $roles, $role) ?>
        
      <?= form_submit('save', 'Save')?>
	  <a href="javascript:history.back()">go back</a>
    
    <?= form_fieldset_close()?>
  <?= form_close() ?>
  
</div>

</body>
</html>