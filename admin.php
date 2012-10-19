<span style="display: none;">
<?php
if(isset($_POST['update'])){
$target_path = bloginfo("siteurl")."uploads/";
$target_pathx = bloginfo("siteurl")."uploads/";
$target_path = $target_path . basename( $_FILES['bg-image']['name']); 
$target_pathx = $target_pathx . basename( $_FILES['lower-ad']['name']);

	if(move_uploaded_file($_FILES['lower-ad']['tmp_name'], $target_pathx) and move_uploaded_file($_FILES['bg-image']['tmp_name'], $target_path)) {
		$_SESSION['msg'] = basename( $_FILES['lower-ad']['name'])." and ".basename( $_FILES['bg-image']['name'])." uploaded successfully.";
	} elseif(move_uploaded_file($_FILES['bg-image']['tmp_name'], $target_path)) {
		$_SESSION['msg'] = basename( $_FILES['bg-image']['name'])." uploaded successfully.";
	} elseif(move_uploaded_file($_FILES['lower-ad']['tmp_name'], $target_pathx)) {
		$_SESSION['msg'] = basename( $_FILES['lower-ad']['name'])." uploaded successfully.";
	} else {
		$_SESSION['msg'] = "<br />No image(s) has been upload.<br />";
	}
	if(empty($_FILES['bg-image']['name'])){
			mysql_query("UPDATE wp_bp_groups SET 
			street = '".$_POST['street']."',
			city = '".$_POST['city']."',
			state = '".$_POST['state']."',
			country = '".$_POST['country']."',
			about_us = '".$_POST['group-about-us']."',
			notice = '".$_POST['group-notice']."',
			fixture_info = '".$_POST['fixture_info']."',	
			calendar_iframe = '".$_POST['calendar_iframe']."',	
			themes = '".$_POST['themes']."',	
			lower_ad = '".basename( $_FILES['lower-ad']['name'])."',
			sport_type = '".$_POST['sport-type']."',
			country = '".$_POST['country']."',
			n_s = '".$_POST['n_s']."',
			tel = '".$_POST['tel']."'
			WHERE id = '".$_POST['group_id']."'");	
	} elseif(empty($_FILES['lower-ad']['name'])) {
			mysql_query("UPDATE wp_bp_groups SET 
			street = '".$_POST['street']."',
			city = '".$_POST['city']."',
			state = '".$_POST['state']."',
			country = '".$_POST['country']."',
			about_us = '".$_POST['group-about-us']."',
			notice = '".$_POST['group-notice']."',
			fixture_info = '".$_POST['fixture_info']."',
			calendar_iframe = '".$_POST['calendar_iframe']."',
			themes = '".$_POST['themes']."',
			bg_image = '".basename( $_FILES['bg-image']['name'])."',
			sport_type = '".$_POST['sport-type']."',
			country = '".$_POST['country']."',
			n_s = '".$_POST['n_s']."',
			tel = '".$_POST['tel']."'
			WHERE id = '".$_POST['group_id']."'");	
	} elseif(!empty($_FILES['lower-ad']['name']) and !empty($_FILES['bg-image']['name'])) {
			mysql_query("UPDATE wp_bp_groups SET 
			street = '".$_POST['street']."',
			city = '".$_POST['city']."',
			state = '".$_POST['state']."',
			country = '".$_POST['country']."',
			about_us = '".$_POST['group-about-us']."',
			notice = '".$_POST['group-notice']."',
			fixture_info = '".$_POST['fixture_info']."',
			calendar_iframe = '".$_POST['calendar_iframe']."',
			themes = '".$_POST['themes']."',
			bg_image = '".basename( $_FILES['bg-image']['name'])."',			
			lower_ad = '".basename( $_FILES['lower-ad']['name'])."',
			sport_type = '".$_POST['sport-type']."',
			country = '".$_POST['country']."',
			n_s = '".$_POST['n_s']."',
			tel = '".$_POST['tel']."'
			WHERE id = '".$_POST['group_id']."'");	
	} else {
			mysql_query("UPDATE wp_bp_groups SET 
			street = '".$_POST['street']."',
			city = '".$_POST['city']."',
			state = '".$_POST['state']."',
			country = '".$_POST['country']."',
			about_us = '".$_POST['group-about-us']."',
			notice = '".$_POST['group-notice']."',
			fixture_info = '".$_POST['fixture_info']."',
			calendar_iframe = '".$_POST['calendar_iframe']."',
			themes = '".$_POST['themes']."',
			sport_type = '".$_POST['sport-type']."',
			country = '".$_POST['country']."',
			n_s = '".$_POST['n_s']."',
			tel = '".$_POST['tel']."'
			WHERE id = '".$_POST['group_id']."'");	
	}

}
	$group_id = bp_get_group_id();
	$sql = mysql_query("SELECT * FROM wp_bp_groups where id = $group_id");
	$row = mysql_fetch_array($sql);
?>
</span>
<style>
#content {
    padding: 0 30px;
}
</style>
<div class="club-content-2">
<div class="club-header-admin"></div>
<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
	<ul>
	<li><a href="<?php bp_group_permalink(); ?>forum">Coaches/Topics</a></li>
	<?php if(bp_group_is_admin()){?>
	<li><a href="<?php bp_group_permalink(); ?>admin/edit-details/?page=general">General</a></li>
		<?php bp_group_admin_tabs(); ?>
	<?php } ?>
	</ul>
</div><!-- .item-list-tabs -->
	<br class="clear" />
<div class="club-text">
<?php do_action( 'bp_before_group_admin_content' ) ?>
<?php /* Edit Group Details */ ?>
<?php if ($_GET['page']=="admins") : ?>

<?php endif; ?>
<?php if ($_GET['page']=="general") : ?>
<h2 style="display:inline;">General Settings</h2>
<?php echo $_SESSION['msg'];?>
<form action="<?php bp_group_permalink(); ?>admin/edit-details/?page=general" method="POST" id="group-settings-form" class="standard-form" enctype="multipart/form-data" role="main">
	<input type="hidden" name="group_id" value="<?php echo $group_id;?>" />
	<input type="hidden" name="MAX_FILE_SIZE" value="8000000" />
	<label for="group-desc"><?php _e( 'Country Selection', 'buddypress' ); ?></label>	
	<select name="country">
	<?php
	$country = array("Australia","USA","United Kingdom","Canada","New Zealand","Eire");
	for($i=0;$i<=5;$i++){
	?>
	<option value="<?php echo $country[$i];?>" <?php if($country[$i]==$row['country']){ echo "selected";} ?>><?php echo $country[$i];?></option>
	<?php } ?>
	</select>
	<label for="group-desc"><?php _e( 'Sport Type', 'buddypress' ); ?></label>	
	<select name="sport-type">
	<?php
	$sql2 = mysql_query("SELECT * FROM `wp_posts` INNER JOIN wp_postmeta ON `ID` = post_id and meta_value = 'club-page.php' and post_status = 'publish' order by post_name asc");
	while($row2 = mysql_fetch_array($sql2)){
	?>
	<option value="<?php echo $row2['post_name'];?>" <?php if($row2['post_name']==$row['sport_type']){ echo "selected";} ?>><?php echo ucwords(str_replace("-"," ",$row2['post_name']));?></option>
	<?php } ?>
	</select>
	<h3>Club Address</h3>
	<label for="group-desc"><?php _e( 'Street', 'buddypress' ); ?></label>
	<input type="text" name="street" class="tinymce_data" id="elem0" aria-required="true" value="<?php echo $row['street'];?>" />
	<label for="group-desc"><?php _e( 'City', 'buddypress' ); ?></label>
	<input type="text" name="city" class="tinymce_data" id="elem0" aria-required="true" value="<?php echo $row['city'];?>" />
	<label for="group-desc"><?php _e( 'State', 'buddypress' ); ?></label>
	<input type="text" name="state" class="tinymce_data" id="elem0" aria-required="true" value="<?php echo $row['state'];?>" />
	<label for="group-desc"><?php _e( 'Country', 'buddypress' ); ?></label>
	<select name="country">	
		<option value="default">Select Country</option>
		<?php
		$country = array("Australia","USA","United Kingdom","Canada","New Zealand","Eire");
		for($i=0;$i<=5;$i++){
		?>
		<option value="<?php echo $country[$i];?>" <?php if($country[$i]==$row['country']){ echo "selected";} ?>><?php echo $country[$i];?></option>
		<?php } ?>
	</select>
     
	<label for="group-desc"><?php _e( 'Club Notice', 'buddypress' ); ?></label>
	<textarea name="group-notice" class="tinymce_data" id="elem2" aria-required="true"><?php echo $row['notice'];?></textarea>
	<label for="group-desc"><?php _e( 'Telephone Number', 'buddypress' ); ?></label>
	<input type="text" name="tel" class="tinymce_data" id="elem3" aria-required="true" value="<?php echo $row['tel'];?>" />
	<label for="group-desc"><?php _e( 'Number Of Teams Supported', 'buddypress' ); ?></label>
	<input type="text" name="n_s" class="tinymce_data" id="" aria-required="true" value="<?php echo $row['n_s'];?>" />
	<div style="display:none;">
	<label for="group-desc"><?php _e( 'Fixture Info', 'buddypress' ); ?></label>
	<textarea name="fixture_info" class="tinymce_data" id="elem4" aria-required="true"><?php echo $row['fixture_info'];?></textarea>
	<label for="group-desc"><?php _e( 'Google Calendar', 'buddypress' ); ?></label><br />(note: Paste the iframe code here.)<br /><a href="http://support.google.com/calendar/bin/answer.py?hl=en&answer=41207">Click this link</a>&nbsp;(guide to get google calendar iframe code)
	<textarea name="calendar_iframe" class="tinymce_data" id="elem4" aria-required="true"><?php echo $row['calendar_iframe'];?></textarea>
	</div>
	<label for="group-desc"><?php _e( 'Themes', 'buddypress' ); ?></label>
	<select name="themes">
	<?php
	$themes = array("default","Light Indigo","Light Crimson","Light Chartreuse Green","Brilliant Gold","Light Brilliant Cornflower Blue","Grayish Sea Green","Brilliant Orange","Moderate Magenta","Brilliant Sapphire Blue","Blue Violetish Gray","2nd Template");
	$themesslug = array("default","light-indigo","light-crimson","light-chartreuse-green","brilliant-gold","light-brilliant-cornflower-blue","grayish-sea-green","brilliant-orange","moderate-magenta","brilliant-sapphire-blue","blue-violetish-gray","template-2");
	for($i=0;$i<count($themes);$i++){
	?>
		<option value="<?php echo $themesslug[$i];?>" <?php if($row['themes'] == $themesslug[$i]){echo "selected";}?>><?php echo $themes[$i];?></option>
	<?php } ?>
	</select>
	<div style="display:none;">
	<label for="group-desc"><?php _e( 'Lower Ad', 'buddypress' ); ?></label>
	<input type="file" name="lower-ad" id="group-name"aria-required="true" /><?php if(!empty($row['lower_ad'])){echo "Current Image File: <img src='";bloginfo("siteurl"); echo "/uploads/".$row['lower_ad']."' width='60' height='60' /><br />";}?><!--Update this<input type="checkbox" name="lower-ad-check" /-->
	<p>Please use the appropriate size: 725px WIDTH X 155px HEIGHT (minimum) </p>
	
	<label for="group-desc"><?php _e( 'Background Image', 'buddypress' ); ?></label>
	<input type="file" name="bg-image" id="group-name"aria-required="true" /><?php if(!empty($row['bg_image'])){ echo "Current Image File: <img src='";bloginfo("siteurl"); echo "/uploads/".$row['bg_image']."' width='60' height='60' /><br />";}?><!--Update this<input type="checkbox" name="bg-image-check" /-->
	<br />	
	<p>Please use the appropriate size: 1053px WIDTH X 675px HEIGHT</p>
	<p>Please use JPG or jpg Image extension as possible.</p>
	</div>
	<p>&nbsp;</p>
	<p><input type="submit" value="<?php _e( 'Save Changes', 'buddypress' ) ?>" id="save" name="update" /></p>
</form>
<?php endif; ?>
<form action="<?php bp_group_admin_form_action() ?>" name="group-settings-form" id="group-settings-form" class="standard-form" method="post" enctype="multipart/form-data" role="main">
<?php if ( bp_is_group_admin_screen( 'edit-details' ) and empty($_GET['page'])) : ?>
<h2 style="display:inline;">Details Settings</h2>
	<?php do_action( 'bp_before_group_details_admin' ); ?>
	<label for="group-name"><?php _e( 'Group Name (required)', 'buddypress' ); ?></label>
	<input type="text" name="group-name" id="group-name" value="<?php bp_group_name() ?>" aria-required="true" />

	<label for="group-desc"><?php _e( 'Group Description (required)', 'buddypress' ); ?></label>
	<textarea name="group-desc" id="group-desc" aria-required="true"><?php bp_group_description_editable() ?></textarea>
	<?php do_action( 'groups_custom_group_fields_editable' ) ?>

	<p>
		<label for="group-notifiy-members"><?php _e( 'Notify group members of changes via email', 'buddypress' ); ?></label>
		<input type="radio" name="group-notify-members" value="1" /> <?php _e( 'Yes', 'buddypress' ); ?>&nbsp;
		<input type="radio" name="group-notify-members" value="0" checked="checked" /> <?php _e( 'No', 'buddypress' ); ?>&nbsp;
	</p>

	<?php do_action( 'bp_after_group_details_admin' ); ?>

	<p><input type="submit" value="<?php _e( 'Save Changes', 'buddypress' ) ?>" id="save" name="save" /></p>
	<?php wp_nonce_field( 'groups_edit_group_details' ) ?>

<?php endif; ?>

<?php /* Manage Group Settings */ ?>
<?php if ( bp_is_group_admin_screen( 'group-settings' ) ) : ?>

	<?php do_action( 'bp_before_group_settings_admin' ); ?>

	<?php if ( bp_is_active( 'forums' ) ) : ?>

		<?php if ( bp_forums_is_installed_correctly() ) : ?>

			<div class="checkbox">
				<label><input type="checkbox" name="group-show-forum" id="group-show-forum" value="1"<?php bp_group_show_forum_setting() ?> /> <?php _e( 'Enable discussion forum', 'buddypress' ) ?></label>
			</div>

			<hr />

		<?php endif; ?>

	<?php endif; ?>

	<h4><?php _e( 'Privacy Options', 'buddypress' ); ?></h4>
<h2 style="display:inline;">Privacy Options</h2>
	<div class="radio">
		<label>
			<input type="radio" name="group-status" value="public"<?php bp_group_show_status_setting( 'public' ) ?> />
			<strong><?php _e( 'This is a public group', 'buddypress' ) ?></strong>
			<ul>
				<li><?php _e( 'Any site member can join this group.', 'buddypress' ) ?></li>
				<li><?php _e( 'This group will be listed in the groups directory and in search results.', 'buddypress' ) ?></li>
				<li><?php _e( 'Group content and activity will be visible to any site member.', 'buddypress' ) ?></li>
			</ul>
		</label>

		<label>
			<input type="radio" name="group-status" value="private"<?php bp_group_show_status_setting( 'private' ) ?> />
			<strong><?php _e( 'This is a private group', 'buddypress' ) ?></strong>
			<ul>
				<li><?php _e( 'Only users who request membership and are accepted can join the group.', 'buddypress' ) ?></li>
				<li><?php _e( 'This group will be listed in the groups directory and in search results.', 'buddypress' ) ?></li>
				<li><?php _e( 'Group content and activity will only be visible to members of the group.', 'buddypress' ) ?></li>
			</ul>
		</label>

		<label>
			<input type="radio" name="group-status" value="hidden"<?php bp_group_show_status_setting( 'hidden' ) ?> />
			<strong><?php _e( 'This is a hidden group', 'buddypress' ) ?></strong>
			<ul>
				<li><?php _e( 'Only users who are invited can join the group.', 'buddypress' ) ?></li>
				<li><?php _e( 'This group will not be listed in the groups directory or search results.', 'buddypress' ) ?></li>
				<li><?php _e( 'Group content and activity will only be visible to members of the group.', 'buddypress' ) ?></li>
			</ul>
		</label>
	</div>

	<hr /> 
	 
	<h4><?php _e( 'Group Invitations', 'buddypress' ); ?></h4> 
<h2 style="display:inline;">Group Invitations</h2>

	<p><?php _e( 'Which members of this group are allowed to invite others?', 'buddypress' ) ?></p> 

	<div class="radio"> 
		<label> 
			<input type="radio" name="group-invite-status" value="members"<?php bp_group_show_invite_status_setting( 'members' ) ?> /> 
			<strong><?php _e( 'All group members', 'buddypress' ) ?></strong> 
		</label> 

		<label> 
			<input type="radio" name="group-invite-status" value="mods"<?php bp_group_show_invite_status_setting( 'mods' ) ?> /> 
			<strong><?php _e( 'Group admins and mods only', 'buddypress' ) ?></strong> 
		</label>
		
		<label> 
			<input type="radio" name="group-invite-status" value="admins"<?php bp_group_show_invite_status_setting( 'admins' ) ?> /> 
			<strong><?php _e( 'Group admins only', 'buddypress' ) ?></strong> 
		</label> 
 	</div> 

	<hr /> 

	<?php do_action( 'bp_after_group_settings_admin' ); ?>

	<p><input type="submit" value="<?php _e( 'Save Changes', 'buddypress' ) ?>" id="save" name="save" /></p>
	<?php wp_nonce_field( 'groups_edit_group_settings' ) ?>

<?php endif; ?>

<?php /* Group Avatar Settings */ ?>
<?php if ( bp_is_group_admin_screen( 'group-avatar' ) ) : ?>
<h2 style="display:inline;">Group Avatar</h2>
	<?php if ( 'upload-image' == bp_get_avatar_admin_step() ) : ?>

			<p><?php _e("Upload an image to use as an avatar for this group. The image will be shown on the main group page, and in search results.", 'buddypress') ?></p>

			<p>
				<input type="file" name="file" id="file" />
				<input type="submit" name="upload" id="upload" value="<?php _e( 'Upload Image', 'buddypress' ) ?>" />
				<input type="hidden" name="action" id="action" value="bp_avatar_upload" />
			</p>

			<?php if ( bp_get_group_has_avatar() ) : ?>

				<p><?php _e( "If you'd like to remove the existing avatar but not upload a new one, please use the delete avatar button.", 'buddypress' ) ?></p>

				<?php bp_button( array( 'id' => 'delete_group_avatar', 'component' => 'groups', 'wrapper_id' => 'delete-group-avatar-button', 'link_class' => 'edit', 'link_href' => bp_get_group_avatar_delete_link(), 'link_title' => __( 'Delete Avatar', 'buddypress' ), 'link_text' => __( 'Delete Avatar', 'buddypress' ) ) ); ?>

			<?php endif; ?>

			<?php wp_nonce_field( 'bp_avatar_upload' ) ?>

	<?php endif; ?>

	<?php if ( 'crop-image' == bp_get_avatar_admin_step() ) : ?>

		<h3><?php _e( 'Crop Avatar', 'buddypress' ) ?></h3>

		<img src="<?php bp_avatar_to_crop() ?>" id="avatar-to-crop" class="avatar" alt="<?php _e( 'Avatar to crop', 'buddypress' ) ?>" />

		<div id="avatar-crop-pane">
			<img src="<?php bp_avatar_to_crop() ?>" id="avatar-crop-preview" class="avatar" alt="<?php _e( 'Avatar preview', 'buddypress' ) ?>" />
		</div>

		<input type="submit" name="avatar-crop-submit" id="avatar-crop-submit" value="<?php _e( 'Crop Image', 'buddypress' ) ?>" />

		<input type="hidden" name="image_src" id="image_src" value="<?php bp_avatar_to_crop_src() ?>" />
		<input type="hidden" id="x" name="x" />
		<input type="hidden" id="y" name="y" />
		<input type="hidden" id="w" name="w" />
		<input type="hidden" id="h" name="h" />

		<?php wp_nonce_field( 'bp_avatar_cropstore' ) ?>

	<?php endif; ?>

<?php endif; ?>

<?php /* Manage Group Members */ ?>
<?php if ( bp_is_group_admin_screen( 'manage-members' ) ) : ?>
<h2 style="display:inline;">Manage Members</h2>
	<?php do_action( 'bp_before_group_manage_members_admin' ); ?>
	
	<div class="bp-widget">
		<h4><?php _e( 'Administrators', 'buddypress' ); ?></h4>

		<?php if ( bp_has_members( '&include='. bp_group_admin_ids() ) ) : ?>
		
		<ul id="admins-list" class="item-list single-line>">
			
			<?php while ( bp_members() ) : bp_the_member(); ?>
			<li>
				<?php echo bp_core_fetch_avatar( array( 'item_id' => bp_get_member_user_id(), 'type' => 'thumb', 'width' => 30, 'height' => 30, 'alt' => __( 'Profile picture of %s', 'buddypress' ) ) ) ?>
				<h5>
					<a href="<?php bp_member_permalink(); ?>"> <?php bp_member_name(); ?></a>
					<span class="small">
						<a class="button confirm admin-demote-to-member" href="<?php bp_group_member_demote_link( bp_get_member_user_id() ) ?>"><?php _e( 'Demote to Member', 'buddypress' ) ?></a>
					</span>			
				</h5>		
			</li>
			<?php endwhile; ?>
		
		</ul>
		
		<?php endif; ?>

	</div>
	
	<?php if ( bp_group_has_moderators() ) : ?>
		<div class="bp-widget">
			<h4><?php _e( 'Moderators', 'buddypress' ) ?></h4>		
			
			<?php if ( bp_has_members( '&include=' . bp_group_mod_ids() ) ) : ?>
				<ul id="mods-list" class="item-list">
				
					<?php while ( bp_members() ) : bp_the_member(); ?>					
					<li>
						<?php echo bp_core_fetch_avatar( array( 'item_id' => bp_get_member_user_id(), 'type' => 'thumb', 'width' => 30, 'height' => 30, 'alt' => __( 'Profile picture of %s', 'buddypress' ) ) ) ?>
						<h5>
							<a href="<?php bp_member_permalink(); ?>"> <?php bp_member_name(); ?></a>
							<span class="small">
								<a href="<?php bp_group_member_promote_admin_link( array( 'user_id' => bp_get_member_user_id() ) ) ?>" class="button confirm mod-promote-to-admin" title="<?php _e( 'Promote to Admin', 'buddypress' ); ?>"><?php _e( 'Promote to Admin', 'buddypress' ); ?></a>								
								<a class="button confirm mod-demote-to-member" href="<?php bp_group_member_demote_link( bp_get_member_user_id() ) ?>"><?php _e( 'Demote to Member', 'buddypress' ) ?></a>
							</span>		
						</h5>		
					</li>	
					<?php endwhile; ?>			
				
				</ul>
			
			<?php endif; ?>
		</div>
	<?php endif ?>


	<div class="bp-widget">
		<h4><?php _e("Members", "buddypress"); ?></h4>

		<?php if ( bp_group_has_members( 'per_page=15&exclude_banned=false' ) ) : ?>

			<?php if ( bp_group_member_needs_pagination() ) : ?>

				<div class="pagination no-ajax">

					<div id="member-count" class="pag-count">
						<?php bp_group_member_pagination_count() ?>
					</div>

					<div id="member-admin-pagination" class="pagination-links">
						<?php bp_group_member_admin_pagination() ?>
					</div>

				</div>

			<?php endif; ?>

			<ul id="members-list" class="item-list single-line">
				<?php while ( bp_group_members() ) : bp_group_the_member(); ?>

					<li class="<?php bp_group_member_css_class(); ?>">
						<?php bp_group_member_avatar_mini() ?>

						<h5>
							<?php bp_group_member_link() ?>

							<?php if ( bp_get_group_member_is_banned() ) _e( '(banned)', 'buddypress'); ?>

							<span class="small">

							<?php if ( bp_get_group_member_is_banned() ) : ?>

								<a href="<?php bp_group_member_unban_link() ?>" class="button confirm member-unban" title="<?php _e( 'Unban this member', 'buddypress' ) ?>"><?php _e( 'Remove Ban', 'buddypress' ); ?></a>

							<?php else : ?>

								<a href="<?php bp_group_member_ban_link() ?>" class="button confirm member-ban" title="<?php _e( 'Kick and ban this member', 'buddypress' ); ?>"><?php _e( 'Kick &amp; Ban', 'buddypress' ); ?></a>
								<?php
								$sql = mysql_query("SELECT * FROM wp_bp_groups_members WHERE group_id =".$group_id." AND user_title = 'Group Mod'");
								if(mysql_num_rows($sql)<4){
								?>
								<a href="<?php bp_group_member_promote_mod_link() ?>" class="button confirm member-promote-to-mod" title="<?php _e( 'Promote to Mod', 'buddypress' ); ?>"><?php _e( 'Promote to Mod', 'buddypress' ); ?></a>								
								<?php } ?>
								<!--a href="<?php //bp_group_member_promote_admin_link() ?>" class="button confirm member-promote-to-admin" title="<?php //_e( 'Promote to Admin', 'buddypress' ); ?>"><?php //_e( 'Promote to Admin', 'buddypress' ); ?></a-->

							<?php endif; ?>

								<a href="<?php bp_group_member_remove_link() ?>" class="button confirm" title="<?php _e( 'Remove this member', 'buddypress' ); ?>"><?php _e( 'Remove from group', 'buddypress' ); ?></a>

								<?php do_action( 'bp_group_manage_members_admin_item' ); ?>

							</span>
						</h5>
					</li>

				<?php endwhile; ?>
			</ul>

		<?php else: ?>

			<div id="message" class="info">
				<p><?php _e( 'This group has no members.', 'buddypress' ); ?></p>
			</div>

		<?php endif; ?>

	</div>

	<?php do_action( 'bp_after_group_manage_members_admin' ); ?>

<?php endif; ?>

<?php /* Manage Membership Requests */ ?>
<?php if ( bp_is_group_admin_screen( 'membership-requests' ) ) : ?>

	<?php do_action( 'bp_before_group_membership_requests_admin' ); ?>

	<?php if ( bp_group_has_membership_requests() ) : ?>

		<ul id="request-list" class="item-list">
			<?php while ( bp_group_membership_requests() ) : bp_group_the_membership_request(); ?>

				<li>
					<?php bp_group_request_user_avatar_thumb() ?>
					<h4><?php bp_group_request_user_link() ?> <span class="comments"><?php bp_group_request_comment() ?></span></h4>
					<span class="activity"><?php bp_group_request_time_since_requested() ?></span>

					<?php do_action( 'bp_group_membership_requests_admin_item' ); ?>

					<div class="action">

						<?php bp_button( array( 'id' => 'group_membership_accept', 'component' => 'groups', 'wrapper_class' => 'accept', 'link_href' => bp_get_group_request_accept_link(), 'link_title' => __( 'Accept', 'buddypress' ), 'link_text' => __( 'Accept', 'buddypress' ) ) ); ?>

						<?php bp_button( array( 'id' => 'group_membership_reject', 'component' => 'groups', 'wrapper_class' => 'reject', 'link_href' => bp_get_group_request_reject_link(), 'link_title' => __( 'Reject', 'buddypress' ), 'link_text' => __( 'Reject', 'buddypress' ) ) ); ?>

						<?php do_action( 'bp_group_membership_requests_admin_item_action' ); ?>

					</div>
				</li>

			<?php endwhile; ?>
		</ul>

	<?php else: ?>

		<div id="message" class="info">
			<p><?php _e( 'There are no pending membership requests.', 'buddypress' ); ?></p>
		</div>

	<?php endif; ?>

	<?php do_action( 'bp_after_group_membership_requests_admin' ); ?>

<?php endif; ?>

<?php do_action( 'groups_custom_edit_steps' ) // Allow plugins to add custom group edit screens ?>

<?php /* Delete Group Option */ ?>
<?php if ( bp_is_group_admin_screen( 'delete-group' ) ) : ?>

	<?php do_action( 'bp_before_group_delete_admin' ); ?>

	<div id="message" class="info">
		<p><?php _e( 'WARNING: Deleting this group will completely remove ALL content associated with it. There is no way back, please be careful with this option.', 'buddypress' ); ?></p>
	</div>

	<label><input type="checkbox" name="delete-group-understand" id="delete-group-understand" value="1" onclick="if(this.checked) { document.getElementById('delete-group-button').disabled = ''; } else { document.getElementById('delete-group-button').disabled = 'disabled'; }" /> <?php _e( 'I understand the consequences of deleting this group.', 'buddypress' ); ?></label>

	<?php do_action( 'bp_after_group_delete_admin' ); ?>

	<div class="submit">
		<input type="submit" disabled="disabled" value="<?php _e( 'Delete Group', 'buddypress' ) ?>" id="delete-group-button" name="delete-group-button" />
	</div>

	<input type="hidden" name="group-id" id="group-id" value="<?php bp_group_id() ?>" />

	<?php wp_nonce_field( 'groups_delete_group' ) ?>

<?php endif; ?>

<?php /* This is important, don't forget it */ ?>
	<input type="hidden" name="group-id" id="group-id" value="<?php bp_group_id() ?>" />

<?php do_action( 'bp_after_group_admin_content' ) ?>

</form><!-- #group-settings-form -->
</div>
</div>