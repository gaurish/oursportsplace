<table id="team_meeting_pt">
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
	<?php foreach ($row['team_meeting_pt'] as $team_meeting_pt) { ?>
		<tr>
			<td>
				<?php echo $team_meeting_pt['date'];?>
			</td>
			<td>
				<?php echo $team_meeting_pt['meeting_time'];?>
			</td>
			<td>
				<?php echo $team_meeting_pt['meeting_place'];?>
			</td>
			<td>
				<?php echo $team_meeting_pt['venue'];?>
			</td>
			<td>
				<?php echo $team_meeting_pt['opponents'];?>
			</td>
			<td>
				<?php echo $team_meeting_pt['official_incharge'];?>
			</td>
		</tr>
	<?php }?>
		</tbody>
</table>