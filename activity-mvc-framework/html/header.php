<style type="text/css">
	.gallery-orange ul li {
	    float: left;
	    height: 120px;
	    list-style: none outside none;
	    margin: 0 1px;
	    text-align: center;
	    width: 120px;
	}
	.video-list iframe {
		max-height: 180px;
		max-width: 220px;
		float: left;
		padding: 0 0 10px 15px;
	}
	.video-sm iframe{
		max-height: 120px;
		max-width: 120px;
	}
	.group-bg {
		background: url("<?php bloginfo("siteurl"); echo "/uploads/".$row['bg_image'];?>") no-repeat 0 0 transparent;
	    height: 675px;
	    margin: 110px 0 0 -15px;
	    position: absolute;
	    width: 1055px;
	}

	#team td, #team th {
		padding: 2px 0!important;
	    text-align: center;
	}
	input[type="text"]{
		width:	85px;
	}
</style>
<script src="<?php bloginfo("template_url");?>/js/val.js"></script>
<script>
function ajaxSubmit() {
    var FormData = jQuery(this).serialize();    
    jQuery.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        data: FormData,	
        success: function(data) {
		       console.log(data);
        }
    });
    return false;
}

jQuery(function($) {
    $('#team_meeting_pt_add_row').click(function() {
    	//add new row of text inputs  for data entry
    	var i = $('#team_meeting_pt tr').size() + 1;
        $('#team_meeting_pt').append("<tr><td><input type=\"text\" name=\"team_meeting_pt[" + i + "][date]\"></td><td><input type=\"text\" name=\"team_meeting_pt[" + i + "][meeting_time]\"></td><td><input type=\"text\" name=\"team_meeting_pt][" + i + "][meeting_place ]\"></td><input type=\"text\" name=\"team_meeting_pt[" + i + "][venue]\"></td><td><input type=\"text\" name=\"team_meeting_pt[" + i + "][opponents]\"></td><td><input type=\"text\" name=\"team_meeting_pt[" + i + "][official_incharge]\"></td></tr>");
    });
    $('#team_league_position_add_row').click(function(){
    	var i = $('#team_league_position tr').size() + 1;
    	$('#team_league_position').append('<tr><td><input type="text" name="team_league_position[' + i + '][date]"></td><td><input type="text" name="team_league_position[' + i + '][position]"></td></tr>');
    });
    $("#formmed").validate();
    $('#team_meeting_pt_entry_form').submit(ajaxSubmit);
    $('#team_league_position_entry_form').submit(ajaxSubmit);
});
</script>