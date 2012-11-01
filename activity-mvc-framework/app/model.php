<?php

class Model {

	function add_team($group_id){
		$team_name = mysql_real_escape_string($_POST['team_name']);
		$message = array();
		$sql = "INSERT INTO yami_sub_team (name,group_id) VALUES ('".$team_name."','".$group_id."')";
		if(	mysql_query($sql)) {
			$message['subteam']['message'] = "Done! Team: $team_name has been added";
		} else{
			$message['subteam']['message'] = "Team with that already exists or something else is wrong";
		}	
		return $message;

	}
	function get_group_info($group_id = NULL ){
		$result = array();

		if(is_null($group_id)){
			$group_id = bp_get_group_id();
		}
		
		$sql = mysql_query("SELECT * FROM wp_bp_groups WHERE `id` = '".$group_id."'");
		$row = mysql_fetch_array($sql);
		$result['wp_bp_groups'] = $row;
		
		$sql = mysql_query("SELECT * FROM wp_users WHERE `ID` = '".$row['creator_id']."'");
		$row = mysql_fetch_array($sql);
		$result['wp_users'] = $row;

		$result['wp_bp_groups_members'] = array();
		$sql = mysql_query("SELECT * FROM wp_bp_groups_members WHERE `group_id` = '".$group_id."' AND is_mod = 1");
		while($row = mysql_fetch_array($sql)){
			$result['wp_bp_groups_members'][] = $row;
		}

		$current_user = wp_get_current_user();
		$result['user_account'] = $current_user->user_login;

		return $result;
	}

	function get_subteam_list($group_id){
		$result = array();
		$row = array();
		$result['subteam'] = array();

		$sql = "SELECT id, name from yami_sub_team where group_id=$group_id";
		$rs = mysql_query($sql);
		while($row = mysql_fetch_assoc($rs)){
			$result['subteam'][] = $row;
		}
		return $result;
	}

	function roster_team_meeting_pt($subteam_id){
		$result = array();
		$subteam_id = mysql_real_escape_string($subteam_id);
		$sql = sprintf("SELECT meeting_time, date, venue, meeting_place, opponents, official_incharge from yami_game_sched where subteam_id = %d", $subteam_id);
		if($rs = mysql_query($sql)){
			while ($row = mysql_fetch_assoc($rs)) {
				$result[] = $row;
			}
		}
		return $result;
	}

	function roster_team_league_position($subteam_id){
		$result = array();
		$subteam_id = mysql_real_escape_string($subteam_id);
		$sql = sprintf("SELECT date, position from yami_roster_league where subteam_id = %d", $subteam_id);
		if($rs = mysql_query($sql)){
			while ($row = mysql_fetch_assoc($rs)) {
				$result[] = $row;
			}
		}
		return $result;	
	}

	function roster_team_foster($subteam_id){
		$result = array();
		$subteam_id = mysql_real_escape_string($subteam_id);
		$sql = sprintf("SELECT position, roster_name, car_roster from yami_roster_car where subteam_id = %d", $subteam_id);
		if($rs = mysql_query($sql)){
			while ($row = mysql_fetch_assoc($rs)) {
				$result[] = $row;
			}
		}
		return $result;	
	}
}