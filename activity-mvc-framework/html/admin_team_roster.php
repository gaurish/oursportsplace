
<form action="" method="POST" class="form4" id="team_roster_entry_form">
    <table>
    	<thead>
	        <tr>
	            <td colspan="3">To add team roster, enter the information in the boxes and leave the rows
	                empty if they exceed the information you have.You can check the existing
	                information just below where the boxes ends.After filling the information,
	                click on the add button below the boxes and your information will be saved.</td>
	        </tr>
	        <tr>
	            <td>Event/Team Position</td>
	            <td>Competitor/Player Name</td>
	            <td>Rostered Transport Driver</td>
	        </tr>
	    </thead>
	    <tbody id="team_roster">
	    <?php if(is_array($row['team_roster'])) { ?> 
			<?php $i = 1; foreach ($row['team_roster'] as $team_roster) { ?>
	        <tr>
	            <td>
	                <input type="text" name="team_roster[<?php echo $i;?>][position]" class="required" value="<?php echo $team_roster['position'];?>"
	                title="Event/Team Position" />
	            </td>
	            <td>
	                <input type="text" name="team_roster[<?php echo $i;?>][roster_name]" class="required" value="<?php echo $team_roster['roster_name'];?>"
	                title="Competitor/Player Name" />
	            </td>
	            <td>
	                <input type="text" name="team_roster[<?php echo $i;?>][car_roster]" class="required" value="<?php echo $team_roster['car_roster'];?>"
	                title="Rostered Transport Driver" />
	            </td>
	        </tr>
	       	<?php } ?>
		<?php } ?>
	    </tbody>
    </table>
<button type="button" id="team_roster_add_row">Add new row</button>
<input type="submit" id="team_roster_submit" name="ros-save" value="Save Changes" />
<input type="hidden" name="page" value="team_roster_form_save" />
<input type="hidden" name="action" value="activitysubmitTeamRoster" />
<input type="hidden" name="subteam_id" value="<?php echo $_GET['subteam_id']; ?>" />
</form>