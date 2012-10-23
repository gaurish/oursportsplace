<div class="club-content-2">
<div class="club-header-fixture"></div>
<div class="club-text">
	<h3 style="color: red"><?php $message = $row['subteam']['message'];
			echo $message;
	 ?></h3>
<?php if(bp_group_is_mod() or bp_group_is_admin()){ 
	require_once( ACTIVITY_PATH . 'activity-mvc-framework/html/' . 'admin_add_team.php');
} ?>


<h2>TEAM Lists</h2>

<table id="team" width="710px">
	<?php foreach ($row['subteam'] as $team) { ?>
		<tr>
			<td> 
				<a href=page=roster&subteam_id=<?php echo $team['id'] . ">" . $team['name']; ?></a>
			</td>
		</tr>
	<?php } ?>
</table>
