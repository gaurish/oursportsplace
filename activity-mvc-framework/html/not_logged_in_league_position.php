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
				<?php echo $team_league_position['date'];?>
			</td>
			<td>
				<?php echo $team_league_position['position']; ?>
			</td>
		</tr>		
		<?php } ?>
	<?php } ?>
</tbody>
</table>