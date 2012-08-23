<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		width : "400",
		height: "240"
	});
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
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

?>
<?= form_open("admin_members/save") ?>

  <?= form_hidden('id', $id) ?>
  <div class="container_inner">
    <label>Firstname & Lastname</label>
    <p>Firstname and Lastname - we will use this to address you on our letters or emails</p>
    <?= form_input('firstname', $firstname) ?>  <?= form_input('lastname', $lastname) ?>
  </div>
  
  <div class="container_inner">
    <label>Address</label>
    <p>Can you please tell us where you live?</p>
    <?= form_textarea('address', $address) ?>
  </div>
  
  <div class="container_inner">
    <label>Telephone number</label>
	<p>We'll call you, maybe</p>
    <?= form_input('telephone_number', $telephone_number) ?>
  </div>
  
  <div class="container_inner">
    <label>Email</label>
    <p>Valid email addresses please - we will send you an emails</p>
    <?= form_input('email', $email) ?>
  </div>
  
  <div class="container_inner">
    <label>Is Active</label>
    <p>Are you an active member?</p>
    <?= form_checkbox('is_active', 1, $is_active) ?>
  </div>
  
  <div class="container_inner">
    <label>Are you an admin?</label>
    <?= form_dropdown('role', $roles, $role) ?>
  </div>
	
  <div class="container_inner" style="border:none;padding-top:6px">
    <?= form_submit(array("id" => 'save', "style" => 'display:none'), 'Save')?>
    <a class="button" href="javascript:$('#save').click();">Save</a>
    <a class="button" href="javascript:history.back()">Cancel</a>
  </div>
  
<?= form_close() ?>
