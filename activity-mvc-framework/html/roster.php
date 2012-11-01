<div class="club-content-2">
<div class="club-header-fixture"></div>
<div class="club-text">
	<?php
	var_dump($row);


	 if(bp_group_is_mod() or bp_group_is_admin()){
		require_once( ACTIVITY_PATH . 'activity-mvc-framework/html/' . 'admin_roster_info.php');
	}?>

<br /><br /><br /><br />
<form action="" method="POST" id="team_league_position_entry_form">
<table id="team">
<thead>
<tr>
	<td colspan="2"><h3>Table League Position</h3></td>
</tr>
<tr>
	<td colspan="2">To enter league Position, enter the information in the boxes below and leave the rows empty if they exceeds the information available.After entering the information,click add button below the boxes and it will be saved and displayed in the table below the add button</td>
</tr>
<tr>
	<td>Date</td>
	<td>Position</td>
</tr>
</thead>
<tbody id="team_league_position">
<?php if(is_array($row['team_league_position'])) { ?> 
	<?php $i = 1; foreach ($row['team_league_position'] as $team_league_position) { ?>
		<tr>
			<td>
				<input type="text" name="team_league_position[<?php echo $i?>][date]"	value="<?php echo $team_league_position['date'];?>" />
			</td>
			<td>
				<input type="text" name="team_league_position[<?php echo $i?>][position]"	value="<?php echo $team_league_position['position']; ?>" />
			</td>
		</tr>		
		<?php } ?>
	<?php } ?>
</tbody>
</table>
<button type="button" id="team_league_position_add_row">Add new row</button>
<input type="submit" id="team_league_position_submit" name="ros-save" value="Save Changes" />
<input type="hidden" name="page" value="team_league-position_form_save" />
<input type="hidden" name="action" value="activitysubmitTeamLeaguePosition" />
<input type="hidden" name="subteam_id" value="<?php echo $_GET['subteam_id']; ?>" />
</form>
</form>
</div>
<?php if(bp_group_is_mod() or bp_group_is_admin() ) {
		require_once( ACTIVITY_PATH . 'activity-mvc-framework/html/' . 'admin_team_roster.php');
} ?>