<?php
do_action( 'bp_before_group_forum_content' );
?>
<style>
#subnav {
    background: none repeat scroll 0 0 transparent;
    display: block !important;
    margin: 0 0 0 20px !important;
}
#subnav a {
    background: none repeat scroll 0 0 transparent!important;
    color: #333!important;
    text-shadow: 1px 1px 1px #999!important;
    position: relative;
    z-index: 9;
}
#subnavx {
    background: none repeat scroll 0 0 transparent;
    display: block !important;
    padding: 10px 0 0;
    width: 750px !important;
}
#subnavx.item-list-tabs ul li a {
    background: none repeat scroll 0 0 #333333;
    border-radius: 8px 8px 8px 8px;
    color: #CCCCCC;
    font-weight: bold;
    padding: 10px;
    text-shadow: 1px 1px 1px #999999;
}
.club-content-2 #forum-topic-form {
	margin: 0 0 0 20px !important;
}
.group-forum-topic .club-content-2 #forum-topic-form {
    margin: 10px 0 0 33px !important;
	width: 685px;
}
div#topic-meta div.admin-links {
    right: 19px;
    top: 10px;
}
.club-content-2 .single-forum {
    margin: -18px 0 0 33px;
    width: 687px;
}
.padder div.pagination {
	background: none;
}
#content {
    padding: 0 30px!important;
}
.div-coaches {
    margin: 0 0 0 35px;
    width: 320px;
}
</style>
<div class="club-content-2">
<div class="club-header-admin"></div>
<div class="item-list-tabs no-ajax" id="subnavx" role="navigation">
	<ul>
	<li><a href="<?php bp_group_permalink(); ?>forum">Coaches/Topics</a></li>
	<?php if(bp_group_is_admin()){?>
	<li><a href="<?php bp_group_permalink(); ?>admin/edit-details/?page=general">General</a></li>
		<?php bp_group_admin_tabs(); ?>
	<?php } ?>
	</ul>
</div><!-- .item-list-tabs -->
<div class="div-coaches">
<?php
	$group_id = bp_get_group_id();
	$sql3 = mysql_query("SELECT * FROM wp_bp_groups_members WHERE `group_id` = '".$group_id."' AND is_admin = 1");
	while($row3 = mysql_fetch_array($sql3)){
	$sql5 = mysql_query("SELECT * FROM wp_users WHERE `ID` = '".$row3['user_id']."'");
	$row5 = mysql_fetch_array($sql5);
?>
Head Coach :<a href="<?php bloginfo("home");?>/members/<?php echo $row5['user_login'];?>/profile/"><?php echo $row5['display_name'];?></a><br />
<?php } ?><br />
<?php
	$sql4 = mysql_query("SELECT * FROM wp_bp_groups_members WHERE `group_id` = '".$group_id."' AND is_mod = 1");
?>
Coaches :<br />
<?php
	while($row4 = mysql_fetch_array($sql4)){
	$sql6 = mysql_query("SELECT * FROM wp_users WHERE `ID` = '".$row4['user_id']."'");
	$row6 = mysql_fetch_array($sql6);
?>
<a href="<?php bloginfo("home");?>/members/<?php echo $row6['user_login'];?>/profile/"><?php echo $row6['display_name'];?></a><br />
<?php } ?>
</div>
<?php
if ( bp_is_group_forum_topic_edit() ) :
	locate_template( array( 'groups/single/forum/edit.php' ), true );

elseif ( bp_is_group_forum_topic() ) :
	locate_template( array( 'groups/single/forum/topic.php' ), true );

else : ?>
	<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
		<ul>

			<?php if ( is_user_logged_in() ) : ?>

				<li>
					<a href="#post-new" class="show-hide-new"><?php _e( 'New Topic', 'buddypress' ) ?></a>
				</li>

			<?php endif; ?>

			<?php if ( bp_forums_has_directory() ) : ?>

				<li>
					<a href="<?php bp_forums_directory_permalink() ?>"><?php _e( 'Forum Directory', 'buddypress') ?></a>
				</li>

			<?php endif; ?>

			<?php do_action( 'bp_forums_directory_group_sub_types' ); ?>

			<li id="forums-order-select" class="last filter">

				<label for="forums-order-by"><?php _e( 'Order By:', 'buddypress' ); ?></label>
				<select id="forums-order-by">
					<option value="active"><?php _e( 'Last Active', 'buddypress' ); ?></option>
					<option value="popular"><?php _e( 'Most Posts', 'buddypress' ); ?></option>
					<option value="unreplied"><?php _e( 'Unreplied', 'buddypress' ); ?></option>

					<?php do_action( 'bp_forums_directory_order_options' ); ?>

				</select>
			</li>
		</ul>
	</div>

	<div class="forums single-forum" role="main">

		<?php locate_template( array( 'forums/forums-loop.php' ), true ) ?>

	</div><!-- .forums.single-forum -->

<?php endif; ?>

<?php do_action( 'bp_after_group_forum_content' ) ?>

<?php if ( !bp_is_group_forum_topic_edit() && !bp_is_group_forum_topic() ) : ?>

	<?php if ( !bp_group_is_user_banned() && ( ( is_user_logged_in() && 'public' == bp_get_group_status() ) || bp_group_is_member() ) ) : ?>

		<form action="" method="post" id="forum-topic-form" class="standard-form">
			<div id="new-topic-post">

				<?php do_action( 'bp_before_group_forum_post_new' ) ?>

				<?php if ( bp_groups_auto_join() && !bp_group_is_member() ) : ?>
					<p><?php _e( 'You will auto join this group when you start a new topic.', 'buddypress' ) ?></p>
				<?php endif; ?>

				<p id="post-new"></p>
				<h4><?php _e( 'Post a New Topic:', 'buddypress' ) ?></h4>

				<label><?php _e( 'Title:', 'buddypress' ) ?></label>
				<input type="text" name="topic_title" id="topic_title" value="" />

				<label><?php _e( 'Content:', 'buddypress' ) ?></label>
				<textarea name="topic_text" id="topic_text"></textarea>

				<label><?php _e( 'Tags (comma separated):', 'buddypress' ) ?></label>
				<input type="text" name="topic_tags" id="topic_tags" value="" />

				<?php do_action( 'bp_after_group_forum_post_new' ) ?>

				<div class="submit">
					<input type="submit" name="submit_topic" id="submit" value="<?php _e( 'Post Topic', 'buddypress' ) ?>" />
				</div>

				<?php wp_nonce_field( 'bp_forums_new_topic' ) ?>
			</div><!-- #new-topic-post -->
		</form><!-- #forum-topic-form -->

	<?php endif; ?>

<?php endif; ?>
</div>