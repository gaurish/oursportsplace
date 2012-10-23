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

	#team td {
		padding: 2px 0!important;
	    text-align: center;
	}
</style>
<script src="<?php bloginfo("template_url");?>/js/val.js"></script>
<script>
valxx = jQuery.noConflict();
valxx(document).ready(function(){
	valxx("#formmed").validate();
});
</script>