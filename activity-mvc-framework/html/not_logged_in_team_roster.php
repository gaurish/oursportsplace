<table>
    	<thead>
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
	                <?php echo $team_roster['position']; ?>
	            </td>
	            <td>
	                <?php echo $team_roster['roster_name']; ?>
	            </td>
	            <td>
	                <?php echo $team_roster['car_roster']; ?>
	            </td>
	        </tr>
	       	<?php } ?>
		<?php } ?>
	    </tbody>
    </table>