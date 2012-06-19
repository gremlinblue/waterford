<!DOCTYPE html>
<html lang="en">
<head>
	<title>Account Edit</title>
</head>
<body>

<div id="container">
  
  <?
    $id               = null;
	$firstname        = null;
	$lastname         = null;
	$address          = null;
	$telephone_number = null;
	$email            = null;
	$is_active        = null;
	$role             = null;
	
    if(isset($person)){
	  $id               = $person->id;
	  $firstname        = $person->firstname;
	  $lastname         = $person->lastname;
	  $address          = $person->address;
	  $telephone_number = $person->telephone_number;
	  $email            = $person->email;
	  $is_active        = $person->is_active;
	  $role             = $person->role;
	}
	
  ?>
  
  <?= form_open("account/save") ?>
  
   <?= form_fieldset('Member Form')?>

      <?= form_label('Person ID') ?>
	  <?= form_hidden('person_id', $id) ?>
	  <?= form_label($id) ?><br>
	  
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
	  
	  <?= form_label('Password', 'password' ) ?>
	  <?= form_password('password') ?>
	  
	  <?= form_label('Confirm Password', 'confirm_password' ) ?>
	  <?= form_password('confirm_password') ?>
	  
	<?= form_fieldset_close()?>
	
	<a href="javascript:history.back()">go back</a>
	<?= form_submit('save', 'Save')?>
  <?= form_close() ?>
  
</div>

</body>
</html>