<?php
do_action( 'bp_before_group_header' );
$sql = mysql_query("SELECT * FROM wp_bp_groups");
$row = mysql_fetch_array($sql);
$gcreator = $row['creator_id'];
$group_id = $row['id'];
?>
<div class="club-header"></div>
<div id="item-header-avatar">
<a style="float:left;" href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>">
<?php bp_group_avatar(); ?></a>
<div class="next-to-avatar">
<h3><?php bp_group_name(); ?></h3>			
<div class="highlight"><?php bp_group_type(); ?></div>
<div class="activity"><?php printf( __( 'active %s', 'buddypress' ), bp_get_group_last_active() ); ?></div>			
<div class="club-desc"><?php bp_group_description(); ?></div>
</div>
</div><!-- #item-header-avatar -->
</div>		
	<br class="clear" />
<div class="club-menu">
	<ul>
	<li><a href="<?php bp_group_permalink(); ?>">HOME</a></li>
	<li><a href="<?php bp_group_permalink(); ?>?page=gallery">GALLERY</a></li>
	<li><a href="<?php bp_group_permalink(); ?>?page=contact">CONTACT</a></li>
	<li><a href="<?php bp_group_permalink(); ?>?page=fixture_info">FIXTURE INFO</a></li>
	<?php if(bp_group_is_mod() or bp_group_is_admin()) { ?>
	<li><a href="<?php bp_group_permalink(); ?>forum">ADMINS/COACHES</a></li>
	<?php } ?>
	</ul>		
</div>
<script>
/* <div id="item-actions">

	<?php if ( bp_group_is_visible() ) : ?>

		<h3><?php _e( 'Group Admins', 'buddypress' ); ?></h3>

		<?php bp_group_list_admins();

		do_action( 'bp_after_group_menu_admins' );

		if ( bp_group_has_moderators() ) :
			do_action( 'bp_before_group_menu_mods' ); ?>

			<h3><?php _e( 'Group Mods' , 'buddypress' ) ?></h3>

			<?php bp_group_list_mods();

			do_action( 'bp_after_group_menu_mods' );

		endif;

	endif; ?>

</div><!-- #item-actions -->

<div id="item-header-avatar">
	<a href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>">

		<?php bp_group_avatar(); ?>

	</a>
</div><!-- #item-header-avatar -->

<div id="item-header-content">
	<h2><a href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>"><?php bp_group_name(); ?></a></h2>
	<span class="highlight"><?php bp_group_type(); ?></span> <span class="activity"><?php printf( __( 'active %s', 'buddypress' ), bp_get_group_last_active() ); ?></span>

	<?php do_action( 'bp_before_group_header_meta' ); ?>

	<div id="item-meta">

		<?php bp_group_description(); ?>
*/
</script>
<style>
.joinx {
    float: left;
    margin: -45px 0 0 5px;
    position: absolute;
}
.joinx .group-button {
	font-size: 20px;
}
</style>
		<div id="item-buttons" class="joinx">

			<?php do_action( 'bp_group_header_actions' ); ?>

		</div><!-- #item-buttons -->
<script>
/* 
		<?php do_action( 'bp_group_header_meta' ); ?>

	</div>
</div><!-- #item-header-content -->
 */
 </script>
<?php
do_action( 'bp_after_group_header' );
do_action( 'template_notices' );
?>