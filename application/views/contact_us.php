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
  <tr>
	<td colspan="2">
	  <div style="float:right">
	    <?= form_submit(array("id" => 'save', "style" => 'display:none'), 'Save')?>
        <a class="button" href="javascript:$('#save').click();">Send Message</a>
        <a href="javascript:history.back()" class="button">Back</a>	
	  </div>
	</td>
  </tr>
</table>

<?= form_close() ?>

<article class="no_pads">
<p style="color:#fff"><b>President</b></p>
<p style="color:#fff">&nbsp;&nbsp;Peter Albert McKay</p>
<p>&nbsp;&nbsp;45 Rockefeller Plaza Suite 2000,NY,NY 10111</p>
<p>&nbsp;&nbsp;Phone: 212-586-7074, 7045</p>
<p>&nbsp;&nbsp;Fax: 212-581-9819</p>
<br/>
<p>Emails:</p>
<p style="color:#fff">&nbsp;&nbsp;Peter: pam1one@countywaterford.org</p>
<p style="color:#fff">&nbsp;&nbsp;Trisha: lefty23tricia@yahoo.com</p>
<p style="color:#fff">&nbsp;&nbsp;Declan: declanpower@msn.comPresident</p>