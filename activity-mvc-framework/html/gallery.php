<div class="club-content-2">
<div class="club-header-gallery"></div>
<div class="club-text">
<form action="" method="POST" id="group-settings-form" class="standard-form" enctype="multipart/form-data" role="main">
	<div class="gallery-x">
	<div class="notice-gal"><?php echo $msg;?><br /><?php echo $msg2;?></div>
	<input type="hidden" name="group_id" value="<?php echo $group_id;?>" />
	<input type="hidden" name="MAX_FILE_SIZE" value="8000000" />
	<label for="group-desc"><?php _e( 'Image Upload', ' ' ); ?></label><br />
	<input type="file" name="gal_image" id="group-name" aria-required="true" />&nbsp;8MB - Maximum
	<br />	
	<br />
	<label for="group-desc"><?php _e( 'Embed a Video', 'buddypress' ); ?></label><br />
	<textarea name="video_url"></textarea>
	<p><input type="submit" value="<?php _e( 'Upload/Embed', 'buddypress' ) ?>" id="save" name="add_gallery" /></p>
	</div>
</form>
<div class="uploaded">
<b>IMAGE OUTPUT:</b><img src="<?php bloginfo('home'); echo '/uploads/'.basename( $_FILES['gal_image']['name']);?>" width="180" height="180" /><br />
<b>VIDEO OUTPUT:</b><?php stripslashes($_POST['video_url']);?>
</div>
<?php if(bp_group_is_mod() or bp_group_is_admin()){ ?>
<table>
<tr>
<th>Preview</th>
<th>Media Type</th>
<th>File Name</th>
<th>Action</th>
</tr>
<?php
	$sql = mysql_query("SELECT * FROM yami_group_gallery WHERE group_id = '".bp_get_group_id()."'");
	while($row = mysql_fetch_array($sql)){
?>
<tr>
<td>
<?php
if($row['gal_cat']=='image'){ 
?>
	<img src="<?php bloginfo('home'); echo '/uploads/'.$row['value'];?>" width="120" height="120" />
<?php } else { ?>
	<div class="video-sm">
		<?php echo stripslashes($row['value']);?>
	</div>
<?php } ?>
</td>
<td><?php echo $row['gal_cat'];?></td>
<td>
<?php
if($row['gal_cat']=='image'){ 
	echo $row['value'];
} else { echo 'video file'; } ?>
</td>
<td width="50px">
	<?php if($row['approval']!='ok'){?>
		<a href="?page=gallery&apv_id=<?php echo $row['clubgal_id'];?>">
			<b>Approve</b></a><?php } ?><br />
		<a href="?page=gallery&gal_id=<?php echo $row['clubgal_id'];?>">
			<b>Delete</b>
		</a>
</td>
</tr>
<?php } ?>
</table>

</div>	
</div>	

<?php } else { ?>

<div class="club-content-2">
<div class="club-header-venue"></div>
<div class="club-text">

	<table>
	<tr><td style="padding:5px;position: relative;z-index: 1;">
	<iframe width="700" scrolling="no" height="380" frameborder="0" src="http://maps.google.com/?ie=UTF8&amp;iwloc=near&addr&amp;q=<?php echo $row['group_location'];?>&amp;vpsrc=0&amp;output=embed" marginwidth="0" marginheight="0"></iframe></td></tr>
	<tr><td style="vertical-align: top; text-align: left;position: relative;z-index: 1;"><b>Location</b><br /><?php echo $row['street'].", ".$row['city'].", ".$row['state'].", ".$row['country'].", ".$row['post'];?></td></tr>
	<tr><td style="padding: 0px;">
	<div align="center">
<?php
	$locationx = $row['city']." ".$row['country'];
?>
<div style="height: 150px;margin: 5px 0 0 140px;position: absolute;width: 430px;"></div>
	<iframe scrolling="no" src="<?php bloginfo("home");?>/weather-xml.php?location=<?php echo $locationx;?>" style="height: 150px;margin: 5px auto 0;overflow: hidden;width: 430px;"></iframe>
	</div>
	</td></tr>
	</table>
</div>
</div>
<div class="club-content-2">
<div class="club-header-about"></div>
<div class="club-text">
<?php echo $row['about_us'];?>
</div>		
</div>	
<div class="club-content-2">
<div class="club-header-gallery"></div>
<div style="">
<?php /* Start Album */?>
<link rel="stylesheet" href="<?php bloginfo("template_url"); echo "/colorbox/colorbox.css";?>" />
<script src="<?php bloginfo("template_url"); echo "/colorbox/jquery.colorbox.js";?>"></script>
<script>
/* galimg = jQuery.noConflict();
galimg(document).ready(function(){
	galimg(".gal_img").colorbox({rel:'gal_img',transition:"fade"}); */
	/* galimg(".iframex").colorbox({iframe:true, width:"80%", height:"80%"}); */
/* }); */
</script>
<div style="margin: 0 0 0 15px;overflow: hidden;width: 720px;">
<?php
	$current_user = wp_get_current_user();
	$sql = mysql_query("SELECT * FROM yami_group_gallery WHERE group_id = '".$group_id."' and gal_cat = 'image' AND approval = 'ok'");
	if (mysql_num_rows( $sql ) == 0) {
?>
	<p style="color:#fff">No Photos Yet.</p>
<?php
	} else {
?>
	<div id="previous" style="float: left;"><img src="<?php bloginfo('template_url');?>/images/arrow-previous.jpg" /></div>
	
	<div class="gallery-orange" style="float: left;overflow: hidden;width: 540px;">
	<ul style="width: auto;float: left;">	
<?php	
	while($row = mysql_fetch_array($sql)){		
?>				
		<li>	
			<a href="<?php bloginfo('home');echo "/uploads/".$row['value'];?>" class="gal_img">
				<img width="120px" height="120px" src="<?php bloginfo('home');echo "/uploads/".$row['value'];?>" />
			</a>
		</li>
<?php }?>
	</ul>	
	</div>
	<div id="next" style="float: right;"><img src="<?php bloginfo('template_url');?>/images/arrow-next.jpg" /></div>
<?php }?>	
</div>
<br />
<?php //Video Slid ?>
<div style="margin: 0 0 0 15px;overflow: hidden;width: 720px;">
<?php
	$current_user = wp_get_current_user();
	$sql = mysql_query("SELECT * FROM yami_group_gallery WHERE group_id = '".$group_id."' and gal_cat = 'video'	AND approval = 'ok'");
	if (mysql_num_rows( $sql ) == 0) {
?>
	<p style="color:#fff">No Videos Yet.</p>
<?php
	} else {
?>	
<?php	
	while($row = mysql_fetch_array($sql)){		
?>	
<div class="video-list">
	<?php echo stripslashes($row['value']);?>
</div>
<?php }?>
<?php }?>
</div>		
</div>
<?php /* End Album */?>	
</div>	
<div class="club-content-2">
<div class="club-header-notice"></div>
<div class="club-text">
<?php echo $row['notice'];?>
</div>
</div>
<?php
$sql = mysql_query("SELECT * FROM wp_bp_groups WHERE id = $group_id");
$row = mysql_fetch_array($sql);
?>
<script>
feedz = jQuery.noConflict();
	feedz(document).ready(function(){
	feedz('#cal').load('<?php bloginfo("home");?>/groups/<?php echo $row['slug'];?>/calendar/ #calx');	
});
</script>
<div class="club-content-2">
<div class="club-text">
<div id="cal"></div>
</div>
</div>
<?php } ?>
