<div class="club-content-2">
<div class="club-header-contact"></div>
<div class="club-text">
<form action="" method="POST" id="formmed">
<table>
<tr><td colspan="2"><center><h1><?php
echo $row['wp_bp_groups']['name'];
?></h1></center></td></tr>
<tr><td>Details</td><td><?php
echo $row['wp_bp_groups']['description'];
?></td></tr>
<tr><td>Telephone</td><td><?php
echo $row['wp_bp_groups']['tel'];
?></td></tr>
<tr><td>Responsible Official's</td><td>

Administrator :<a href="<?php
bloginfo("home");
?>/members/<?php
echo $row['wp_users']['user_login'];
?>/profile/"><?php
echo $row['wp_users']['display_name'];
?></a><br />
<?php // 	} 
?><br />
</td></tr>
<!-- <tr><td>Address</td><td><?php
echo $row['wp_bp_groups']['group_location'];
?></td></tr> -->
<tr><td>Email Address</td><td><?php
echo $row['wp_users']['user_email'];
?></td></tr>
<tr><td colspan="2"><center><h3><b>If you would like further information regarding this club please submit your questions on the form below.</b></h3></center></td></tr>
<?php
if (empty($user_account)) {
?>
<tr><td>Title</td><td><input type="text" class="required" name="title" /></td></tr>
<tr><td>Name</td><td><input type="text" class="required" name="name" /></td></tr>
<tr><td>Contact Number</td><td><input type="text" class="required" name="contactno" /></td></tr>
<tr><td>Email Address</td><td><input type="text" class="required email" name="email2" /></td></tr>
<input type="hidden" name="page" value="contact_form" />
<?php
}
?>
<tr><td>Message</td><td><textarea name="message" id="mensahe" rows="5" cols="50"></textarea></td></tr>
<tr><td colspan="2"><input type="submit" name="send-form" value="Contact" /></td></tr>
	</table>
</form>
</div>	
</div>