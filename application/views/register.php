<script type="text/javascript">
	$(document).ready(function() {
	  remove_content_divider();
    });
</script>

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

if(!isset($error))
  $error = null;  

?>


<h3>Registration Form</h3>
<?= form_open("login/register") ?>

  <?= form_hidden('id', $id) ?>
  <table class="container">
	<tr>
	  <td>
		<label>Email</label> <?= form_error('email') ? '<label class="red">*</label>' : null;?>
		<p><i>this will also be used as username</i></p>
	  </td>
	  <td>
	    <?= form_input('email', $email); ?>
	  </td>
	</tr>
	<tr>
	  <td>
	    <label>Firstname</label>
	    <?= form_error('email') ? '<label class="red">*</label>' : null;?>
	  </td>
	  <td><?= form_input('firstname', $firstname) ?></td>
	</tr>
	<tr>
	  <td><label>Lastname</label></td>
	  <td><?= form_input('lastname', $lastname) ?></td>
	</tr>
	<tr>
	  <td><label>Telephone Number</label></td>
	  <td><?= form_input('telephone_number', $telephone_number) ?></td>
	</tr>
	
	<tr>
	  <td><label>Address</label></td>
	  <td><?= form_textarea('address', $address) ?></td>
	</tr>
	<tr>
	  <td colspan="2" >
	    <div style="float:right">
	      <?= form_submit(array("id" => 'save', "style" => 'display:none'), 'Save')?>
          <a class="button" href="javascript:$('#save').click();">Register</a>
          <a class="button" href="javascript:history.back()">Cancel</a>
		</div>
	  </td>
	</tr>
	<tr>
		<td colspan="2">
		  <div>  
  		    <?= validation_errors(); ?>
			<?= $error; ?>
	      </div>
		</td>
	</tr>
  </table>  
<?= form_close() ?>

