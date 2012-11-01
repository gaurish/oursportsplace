<div class="club-content-2">
<div class="club-header-fixture"></div>
<div class="club-text">
	<h3 style="color: red"><?php $message = $row['subteam']['message'];
			echo $message;
	 ?></h3>
<?php if(bp_group_is_mod() or bp_group_is_admin()){ 
	require_once( ACTIVITY_PATH . 'activity-mvc-framework/html/' . 'admin_add_team.php');
} ?>

<i>The list below shows teams from within the club for which further information, including rostering is available.. Click on the team name to access that information..
If you play for a team within this club which is not listed please contact the club administrators to add it.</i>
<h2>TEAM Lists</h2>

<table id="team" width="710px">
	<?php $i=1; foreach ($row['subteam'] as $team) { ?>
		<tr>
			<td>
					<?php echo $i++; ?>
			</td>
			<td> 
				<a href=?page=roster&subteam_id=<?php echo $team['id'] . ">" . $team['name']; ?></a>
			</td>
		</tr>
	<?php } ?>
</table>
</div>