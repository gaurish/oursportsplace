<h3>Team Roster</h3>
<form action="" method="POST" class="form3" id="team_meeting_pt_entry_form">
<table id="team_meeting_pt_entry ">
	<thead>
		<tr>
			The roster information provided is for the next scheduled event but if in doubt of any of the information provided you should contact the Club/Team/Group/Schools administrators.
			<th colspan="3">
				<h1>
					<?php echo $row['name'];?>
				</h1>
			</th>
		</tr>
		<tr>
			<td colspan="3">
				To add a meeting point, insert the information in the boxes below, and after entring all the information, click on add button. the inserted information will be shown just below the boxes, where you have entered the information.
			</td>
		</tr>
		<tr>
			<td>Date:</td>
			<td>Meeting Time:</td>
			<td>Meeting Place:</td>
			<td>Venue Home/Away</td>
			<td>Opponents</td>
			<td>Official In Charge:</td>
		</tr>
	</thead>

	<tbody id="team_meeting_pt">
		<?php if(is_array($row['team_meeting_pt'])) { ?>
			<?php $i = 1; foreach ($row['team_meeting_pt'] as $team_meeting_pt) { ?>
				<tr>
					<td>
						<input type="text" name="team_meeting_pt[<?php echo $i?>][date]"	value="<?php echo $team_meeting_pt['date'];?>" />
					</td>
					<td>
						<input type="text" name="team_meeting_pt[<?php echo $i?>][meeting_time]"	value="<?php echo $team_meeting_pt['meeting_time'];?>" />
					</td>
					<td>
						<input type="text" name="team_meeting_pt[<?php echo $i?>][meeting_place]"	value="<?php echo $team_meeting_pt['meeting_place'];?>" />
					</td>
					<td>
						<input type="text" name="team_meeting_pt[<?php echo $i?>][venue]"	value="<?php echo $team_meeting_pt['venue'];?>" />
					</td>
					<td>
						<input type="text" name="team_meeting_pt[<?php echo $i?>][opponents]" 	value="<?php echo $team_meeting_pt['opponents'];?>" />
					</td>
					<td>
						<input type="text" name="team_meeting_pt[<?php echo $i++?>][official_incharge]"	value="<?php echo $team_meeting_pt['official_incharge'];?>" />
						<input type="hidden" name="page" value="team_meeting_pt_form_save" />
					</td>
				</tr>
			<?php }?>
		<?php } ?>
				<!-- <tr>
					<td>
						<input type="text" name="data[team_meeting_pt][date]"	value="" />
					</td>
					<td>
						<input type="text" name="data[team_meeting_pt][meeting_time]"	value="" />
					</td>
					<td>
						<input type="text" name="data[team_meeting_pt][meeting_place]"	value="" />
					</td>
					<td>
						<input type="text" name="data[team_meeting_pt][venue]"	value="" />
					</td>
					<td>
						<input type="text" name="data[team_meeting_pt][opponents]" 	value="" />
					</td>
					<td>
						<input type="text" name="data[team_meeting_pt][official_incharge]"	value="" />
 -->						<input type="hidden" name="page" value="team_meeting_pt_form_save" />
						<input type="hidden" name="action" value="activitysubmitTeamMeetingPt" />
						<input type="hidden" name="subteam_id" value="<?php echo $_GET['subteam_id']; ?>" />
						<!-- 
					</td>
				</tr> -->
	</tbody>
</table>
	<button type="button" id="team_meeting_pt_add_row">Add new row</button>
	<input type="submit" id="team_meeting_pt_add_row" name="ros-save" value="Save Changes" />
</form>