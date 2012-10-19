<?php get_header( 'buddypress' ); ?>
<div class="group-bg"></div>
<div class="left-ad">
<!--img style="width:150px;height:675px;" src="<?php //echo $_SESSION['image1']; ?>" /-->
<div class="left-nav-bg"></div>
<?php dynamic_sidebar( 'left-sidebar-ad-home' ); ?>
</div>
<div id="container">
<div id="content" role="main">
		<div class="padder">		
		<div class="club-content">
		<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>

		<?php locate_template( array( 'groups/single/group-header.php' ), true );?>
			<?php do_action( 'bp_before_group_home_content' ) ?>
			<?php do_action( 'bp_before_group_body' );

				if ( bp_is_group_admin_page() && bp_group_is_visible() ) :
					locate_template( array( 'groups/single/admin.php' ), true );
				elseif ( bp_is_group_members() && bp_group_is_visible() ) :
					locate_template( array( 'groups/single/members.php' ), true );
				elseif ( bp_is_group_invites() && bp_group_is_visible() ) :
					locate_template( array( 'groups/single/send-invites.php' ), true );
				elseif ( bp_is_group_forum() && bp_group_is_visible() && bp_is_active( 'forums' ) && bp_forums_is_installed_correctly() ) :
						locate_template( array( 'groups/single/forum.php' ), true );
				elseif ( bp_is_group_membership_request() ) :
					locate_template( array( 'groups/single/request-membership.php' ), true );
				elseif ( bp_group_is_visible() && bp_is_active( 'activity' ) ) :
					locate_template( array( 'groups/single/activity.php' ), true );
				elseif ( bp_group_is_visible() ) :
					locate_template( array( 'groups/single/members.php' ), true );
				elseif ( !bp_group_is_visible() ) :
					// The group is not visible, show the status message
				do_action( 'bp_before_group_status_message' ); ?>
				<div id="message" class="info">
					<p><?php bp_group_status_message(); ?></p>
				</div>
					<?php do_action( 'bp_after_group_status_message' );
				else :
					// If nothing sticks, just load a group front template if one exists.
					locate_template( array( 'groups/single/front.php' ), true );
				endif;
				$group_id = bp_get_group_id();
				do_action( 'bp_after_group_body' ); ?>
		<?php endwhile; endif; ?>
		<?php			
			$sql = mysql_query("SELECT * FROM wp_bp_groups where id = $group_id");
			$row = mysql_fetch_array($sql);
			$sqlx = mysql_query("SELECT * FROM wp_posts INNER JOIN `wp_postmeta` ON ID = `post_id` AND `meta_key` = 'image-ad-left' AND post_name = '".$row['sport_type']."'");
			$rowx = mysql_fetch_array($sqlx);
			$left_nav_bg = $rowx['meta_value'];
			$sqlx = mysql_query("SELECT * FROM wp_posts INNER JOIN `wp_postmeta` ON ID = `post_id` AND `meta_key` = 'image-ad-right' AND post_name = '".$row['sport_type']."'");
			$rowx = mysql_fetch_array($sqlx);
			$right_nav_bg = $rowx['meta_value'];
		?>
<style>
#container {
    position: relative;
    z-index: 10;
}
#content {
    padding: 0 15px;
}
.right-nav-bg {
	background: url("<?php echo $right_nav_bg;?>");
    height: 675px;
    margin: 0 0 0 -16px;
    position: relative;
    width: 200px;
}
.left-nav-bg {
	background: url("<?php echo $left_nav_bg;?>");
	width: 200px;
	height: 675px;
    position: relative;
}
<?php
	if($row['themes']!="default"){
?>
.club-header {
	background: url("<?php bloginfo("template_url");echo "/images/".$row['themes'];?>/club-header.png") no-repeat scroll 0 0 transparent;
    width: 740px;
	height: 58px;
}
.club-header-about {
	background: url("<?php bloginfo("template_url");echo "/images/".$row['themes'];?>/club-header-about.png") no-repeat scroll 0 0 transparent;
    width: 740px;
	height: 63px;
}
.club-header-gallery {
	background: url("<?php bloginfo("template_url");echo "/images/".$row['themes'];?>/club-header-gallery.png") no-repeat scroll 0 0 transparent;
    width: 740px;
	height: 63px;
}
.club-header-notice {
	background: url("<?php bloginfo("template_url");echo "/images/".$row['themes'];?>/club-header-notice.png") no-repeat scroll 0 0 transparent;
    width: 740px;
	height: 63px;
}
.club-header-admin {
	background: url("<?php bloginfo("template_url");echo "/images/".$row['themes'];?>/club-header-admin.png") no-repeat scroll 0 0 transparent;
    width: 740px;
	height: 63px;
}
.club-header-contact {
	background: url("<?php bloginfo("template_url");echo "/images/".$row['themes'];?>/club-header-contact.png") no-repeat scroll 0 0 transparent;
    width: 740px;
	height: 63px;
}
.club-header-fixture {
	background: url("<?php bloginfo("template_url");echo "/images/".$row['themes'];?>/club-header-fixture.png") no-repeat scroll 0 0 transparent;
    width: 740px;
	height: 63px;
}
.club-header-venue {
	background: url("<?php bloginfo("template_url");echo "/images/".$row['themes'];?>/club-header-venue.png") no-repeat scroll 0 0 transparent;
    width: 740px;
	height: 63px;
}
.club-header-event {
	background: url("<?php bloginfo("template_url");echo "/images/".$row['themes'];?>/club-header-event.png") no-repeat scroll 0 0 transparent;
    width: 740px;
	height: 63px;
}
<?php } ?>
/* .group-bg {
	background: url("<?php bloginfo("siteurl"); echo "/uploads/".$row['bg_image'];?>") no-repeat 0 0 transparent;
    height: 675px;
    margin: 110px 0 0 -15px;
    position: absolute;
    width: 1055px;
}
body.group-home .left-ad {
	margin: 705px 0 0 -24px!important;
}
body.group-home .right-ad {
    margin: 790px 0 0 834px!important;
}
body.group-admin .left-ad {
	margin: 705px 0 0 -24px!important;
}
body.group-admin .right-ad {
    margin: 790px 0 0 834px!important;
} */
</style>
		<!--div class="club-footer-ad"><?php //if(!empty($row['lower_ad'])){?><img src="<?php //bloginfo("siteurl"); echo "/uploads/".$row['lower_ad'];?>" ><?php //} ?></div-->
		<?php //echo $left_nav_bg."-".$right_nav_bg;?>
		</div><!-- .padder -->
	</div><!-- #content -->
</div>		
		<script>
/* 			<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>

			<?php do_action( 'bp_before_group_home_content' ) ?>

			<div id="item-header" role="complementary">

				<?php locate_template( array( 'groups/single/group-header.php' ), true ); ?>

			</div><!-- #item-header -->

			<div id="item-nav">
				<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
					<ul>

						<?php bp_get_options_nav(); ?>

						<?php do_action( 'bp_group_options_nav' ); ?>

					</ul>
				</div>
			</div><!-- #item-nav -->

			<div id="item-body">

				<?php do_action( 'bp_before_group_body' );

				if ( bp_is_group_admin_page() && bp_group_is_visible() ) :
					locate_template( array( 'groups/single/admin.php' ), true );

				elseif ( bp_is_group_members() && bp_group_is_visible() ) :
					locate_template( array( 'groups/single/members.php' ), true );

				elseif ( bp_is_group_invites() && bp_group_is_visible() ) :
					locate_template( array( 'groups/single/send-invites.php' ), true );

					elseif ( bp_is_group_forum() && bp_group_is_visible() && bp_is_active( 'forums' ) && bp_forums_is_installed_correctly() ) :
						locate_template( array( 'groups/single/forum.php' ), true );

				elseif ( bp_is_group_membership_request() ) :
					locate_template( array( 'groups/single/request-membership.php' ), true );

				elseif ( bp_group_is_visible() && bp_is_active( 'activity' ) ) :
					locate_template( array( 'groups/single/activity.php' ), true );

				elseif ( bp_group_is_visible() ) :
					locate_template( array( 'groups/single/members.php' ), true );

				elseif ( !bp_group_is_visible() ) :
					// The group is not visible, show the status message

					do_action( 'bp_before_group_status_message' ); ?>

					<div id="message" class="info">
						<p><?php bp_group_status_message(); ?></p>
					</div>

					<?php do_action( 'bp_after_group_status_message' );

				else :
					// If nothing sticks, just load a group front template if one exists.
					locate_template( array( 'groups/single/front.php' ), true );

				endif;

				do_action( 'bp_after_group_body' ); ?>

			</div><!-- #item-body -->

			<?php do_action( 'bp_after_group_home_content' ); ?>

			<?php endwhile; endif; ?> */
		</script>
<div class="right-ad">
<div class="right-nav-bg"></div>
<!--img style="margin: 10px 0 0 -16px;width:150px;height:675px;" src="<?php //echo $_SESSION['image2']; ?>" /-->
<?php dynamic_sidebar( 'right-sidebar-ad-home' ); ?>
</div>
<?php get_footer( 'buddypress' ); ?>
