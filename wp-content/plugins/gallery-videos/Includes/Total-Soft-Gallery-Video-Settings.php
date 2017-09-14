<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	require_once(dirname(__FILE__) . '/Total-Soft-Gallery-Video-Install.php');
	global $wpdb;

	$table_name  = $wpdb->prefix . "totalsoft_fonts";
	$table_name4 = $wpdb->prefix . "totalsoft_galleryv_dbt";
	$table_name5 = $wpdb->prefix . "totalsoft_galleryv_gvg";
	$table_name6 = $wpdb->prefix . "totalsoft_galleryv_lvg";
	$table_name7 = $wpdb->prefix . "totalsoft_galleryv_ttvg";
	$table_name8 = $wpdb->prefix . "totalsoft_galleryv_ctpg";
	$table_name9 = $wpdb->prefix . "totalsoft_galleryv_hlg";
	$table_name10 = $wpdb->prefix . "totalsoft_galleryv_fg";
	$table_name11 = $wpdb->prefix . "totalsoft_galleryv_sg";

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(check_admin_referer( 'edit-menu_'.$comment_id, 'TS_VGallery_Nonce' ))
		{
			$TotalSoftGalleryV_SetName=sanitize_text_field($_POST['TotalSoftGalleryV_SetName']); $TotalSoftGalleryV_SetType=sanitize_text_field($_POST['TotalSoftGalleryV_SetType']); 
			//Grid Video Gallery
			$TotalSoft_VG_GVG_TShow=sanitize_text_field($_POST['TotalSoft_VG_GVG_TShow']); $TotalSoft_VG_GVG_DShow=sanitize_text_field($_POST['TotalSoft_VG_GVG_DShow']); $TotalSoft_VG_GVG_CC=sanitize_text_field($_POST['TotalSoft_VG_GVG_CC']); $TotalSoft_VG_GVG_PB=sanitize_text_field($_POST['TotalSoft_VG_GVG_PB']); $TotalSoft_VG_GVG_VR=sanitize_text_field($_POST['TotalSoft_VG_GVG_VR']); $TotalSoft_VG_GVG_HE=sanitize_text_field($_POST['TotalSoft_VG_GVG_HE']); $TotalSoft_VG_GVG_HO=sanitize_text_field($_POST['TotalSoft_VG_GVG_HO'])/100; $TotalSoft_VG_GVG_DSC=sanitize_text_field($_POST['TotalSoft_VG_GVG_DSC']); 
			//LightBox Video Gallery
			$TotalSoft_VG_LVG_CC=sanitize_text_field($_POST['TotalSoft_VG_LVG_CC']); $TotalSoft_VG_LVG_PB=sanitize_text_field($_POST['TotalSoft_VG_LVG_PB']); $TotalSoft_VG_LVG_Pad=sanitize_text_field($_POST['TotalSoft_VG_LVG_Pad']); $TotalSoft_VG_LVG_BgC=sanitize_text_field($_POST['TotalSoft_VG_LVG_BgC']); $TotalSoft_VG_LVG_VBW=sanitize_text_field($_POST['TotalSoft_VG_LVG_VBW']); $TotalSoft_VG_LVG_VBS=sanitize_text_field($_POST['TotalSoft_VG_LVG_VBS']); $TotalSoft_VG_LVG_VBC=sanitize_text_field($_POST['TotalSoft_VG_LVG_VBC']); $TotalSoft_VG_LVG_VBR=sanitize_text_field($_POST['TotalSoft_VG_LVG_VBR']); $TotalSoft_VG_LVG_Img_Zoom_Type=sanitize_text_field($_POST['TotalSoft_VG_LVG_Img_Zoom_Type']); $TotalSoft_VG_LVG_Img_Zoom_Effect_Time=sanitize_text_field($_POST['TotalSoft_VG_LVG_Img_Zoom_Effect_Time']);
			//Thumbnails Video
			$TotalSoft_VG_TV_SE=sanitize_text_field($_POST['TotalSoft_VG_TV_SE']); $TotalSoft_VG_TV_HE=sanitize_text_field($_POST['TotalSoft_VG_TV_HE']); $TotalSoft_VG_TV_AS=sanitize_text_field($_POST['TotalSoft_VG_TV_AS']); $TotalSoft_VG_TV_FC=sanitize_text_field($_POST['TotalSoft_VG_TV_FC']); $TotalSoft_VG_TV_Sl=sanitize_text_field($_POST['TotalSoft_VG_TV_Sl']); $TotalSoft_VG_TV_BC=sanitize_text_field($_POST['TotalSoft_VG_TV_BC']); $TotalSoft_VG_TV_BR=sanitize_text_field($_POST['TotalSoft_VG_TV_BR']); $TotalSoft_VG_TV_POM=sanitize_text_field($_POST['TotalSoft_VG_TV_POM']); $TotalSoft_VG_TV_POS=sanitize_text_field($_POST['TotalSoft_VG_TV_POS']); $TotalSoft_VG_TV_ShC=sanitize_text_field($_POST['TotalSoft_VG_TV_ShC']);
			//Content Popup
			$TotalSoft_VG_CP_W=sanitize_text_field($_POST['TotalSoft_VG_CP_W']); $TotalSoft_VG_CP_H=sanitize_text_field($_POST['TotalSoft_VG_CP_H']); $TotalSoft_VG_CP_BW=sanitize_text_field($_POST['TotalSoft_VG_CP_BW']); $TotalSoft_VG_CP_BC=sanitize_text_field($_POST['TotalSoft_VG_CP_BC']); $TotalSoft_VG_CP_PB=sanitize_text_field($_POST['TotalSoft_VG_CP_PB']); $TotalSoft_VG_CP_BSShow=sanitize_text_field($_POST['TotalSoft_VG_CP_BSShow']); $TotalSoft_VG_CP_BSW=sanitize_text_field($_POST['TotalSoft_VG_CP_BSW']); $TotalSoft_VG_CP_BSC=sanitize_text_field($_POST['TotalSoft_VG_CP_BSC']);
			//Elastic Gallery
			$TotalSoft_VG_HLG_W=sanitize_text_field($_POST['TotalSoft_VG_HLG_W']); $TotalSoft_VG_HLG_H=sanitize_text_field($_POST['TotalSoft_VG_HLG_H']); $TotalSoft_VG_HLG_BW=sanitize_text_field($_POST['TotalSoft_VG_HLG_BW']); $TotalSoft_VG_HLG_BS=sanitize_text_field($_POST['TotalSoft_VG_HLG_BS']); $TotalSoft_VG_HLG_BC=sanitize_text_field($_POST['TotalSoft_VG_HLG_BC']); $TotalSoft_VG_HLG_BSh=sanitize_text_field($_POST['TotalSoft_VG_HLG_BSh']); $TotalSoft_VG_HLG_BShC=sanitize_text_field($_POST['TotalSoft_VG_HLG_BShC']); $TotalSoft_VG_HLG_IHovT=sanitize_text_field($_POST['TotalSoft_VG_HLG_IHovT']); $TotalSoft_VG_HLG_IHovTr=sanitize_text_field($_POST['TotalSoft_VG_HLG_IHovTr']);
			//Fancy Gallery	
			$TotalSoft_VG_FG_W=sanitize_text_field($_POST['TotalSoft_VG_FG_W']); $TotalSoft_VG_FG_H=sanitize_text_field($_POST['TotalSoft_VG_FG_H']); $TotalSoft_VG_FG_BW=sanitize_text_field($_POST['TotalSoft_VG_FG_BW']); $TotalSoft_VG_FG_BC=sanitize_text_field($_POST['TotalSoft_VG_FG_BC']); $TotalSoft_VG_FG_BSh=sanitize_text_field($_POST['TotalSoft_VG_FG_BSh']); $TotalSoft_VG_FG_BShC=sanitize_text_field($_POST['TotalSoft_VG_FG_BShC']); $TotalSoft_VG_FG_PBI=sanitize_text_field($_POST['TotalSoft_VG_FG_PBI']); $TotalSoft_VG_FG_BR=sanitize_text_field($_POST['TotalSoft_VG_FG_BR']);
			//Parallax Engine
			$TotalSoft_JGV_H=sanitize_text_field($_POST['TotalSoft_JGV_H']); $TotalSoft_JGV_W=sanitize_text_field($_POST['TotalSoft_JGV_W']); $TotalSoft_JGV_BR=sanitize_text_field($_POST['TotalSoft_JGV_BR']); $TotalSoft_JGV_BSh=sanitize_text_field($_POST['TotalSoft_JGV_BSh']); $TotalSoft_JGV_BShC=sanitize_text_field($_POST['TotalSoft_JGV_BShC']); $TotalSoft_JGV_BShT=sanitize_text_field($_POST['TotalSoft_JGV_BShT']); $TotalSoft_JGV_ET=sanitize_text_field($_POST['TotalSoft_JGV_ET']); $TotalSoft_JGV_PBI=sanitize_text_field($_POST['TotalSoft_JGV_PBI']); 		
			if($TotalSoft_VG_GVG_TShow=='on'){ $TotalSoft_VG_GVG_TShow='true'; }else{ $TotalSoft_VG_GVG_TShow='false'; }
			if($TotalSoft_VG_GVG_DShow=='on'){ $TotalSoft_VG_GVG_DShow='true'; }else{ $TotalSoft_VG_GVG_DShow='false'; }
			if($TotalSoft_VG_GVG_CC=='2'){ $TotalSoft_VG_GVG_CC='2.04'; }		
			if($TotalSoft_VG_CP_BSShow=='on'){ $TotalSoft_VG_CP_BSShow='true'; }else{ $TotalSoft_VG_CP_BSShow='false'; }

			if(isset($_POST['Total_Soft_Gallery_Video_Update_Option']))
			{
				$Total_SoftGallery_Video_Update=sanitize_text_field($_POST['Total_SoftGallery_Video_Update']);

				$wpdb->query($wpdb->prepare("UPDATE $table_name4 set TotalSoftGalleryV_SetName=%s, TotalSoftGalleryV_SetType=%s WHERE id=%d", $TotalSoftGalleryV_SetName, $TotalSoftGalleryV_SetType, $Total_SoftGallery_Video_Update));

				if($TotalSoftGalleryV_SetType=='Grid Video Gallery')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name5 set TotalSoft_VG_GVG_TShow=%s, TotalSoft_VG_GVG_DShow=%s, TotalSoft_VG_GVG_CC=%s, TotalSoft_VG_GVG_PB=%s, TotalSoft_VG_GVG_VR=%s, TotalSoft_VG_GVG_HE=%s, TotalSoft_VG_GVG_HO=%s, TotalSoft_VG_GVG_DSC=%s WHERE TotalSoftGalleryV_SetID=%s", $TotalSoft_VG_GVG_TShow, $TotalSoft_VG_GVG_DShow, $TotalSoft_VG_GVG_CC, $TotalSoft_VG_GVG_PB, $TotalSoft_VG_GVG_VR, $TotalSoft_VG_GVG_HE, $TotalSoft_VG_GVG_HO, $TotalSoft_VG_GVG_DSC, $Total_SoftGallery_Video_Update));
				}
				else if($TotalSoftGalleryV_SetType=='LightBox Video Gallery')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name6 set TotalSoft_VG_LVG_CC=%s, TotalSoft_VG_LVG_PB=%s, TotalSoft_VG_LVG_Pad=%s, TotalSoft_VG_LVG_BgC=%s, TotalSoft_VG_LVG_VBW=%s, TotalSoft_VG_LVG_VBS=%s, TotalSoft_VG_LVG_VBC=%s, TotalSoft_VG_LVG_VBR=%s, TotalSoft_VG_LVG_Img_Zoom_Type=%s, TotalSoft_VG_LVG_Img_Zoom_Effect_Time=%s WHERE TotalSoftGalleryV_SetID=%s", $TotalSoft_VG_LVG_CC, $TotalSoft_VG_LVG_PB, $TotalSoft_VG_LVG_Pad, $TotalSoft_VG_LVG_BgC, $TotalSoft_VG_LVG_VBW, $TotalSoft_VG_LVG_VBS, $TotalSoft_VG_LVG_VBC, $TotalSoft_VG_LVG_VBR, $TotalSoft_VG_LVG_Img_Zoom_Type, $TotalSoft_VG_LVG_Img_Zoom_Effect_Time, $Total_SoftGallery_Video_Update));
				}
				else if($TotalSoftGalleryV_SetType=='Thumbnails Video')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name7 set TotalSoft_VG_TV_SE=%s, TotalSoft_VG_TV_HE=%s, TotalSoft_VG_TV_AS=%s, TotalSoft_VG_TV_FC=%s, TotalSoft_VG_TV_Sl=%s, TotalSoft_VG_TV_BC=%s, TotalSoft_VG_TV_BR=%s, TotalSoft_VG_TV_POM=%s, TotalSoft_VG_TV_POS=%s, TotalSoft_VG_TV_ShC=%s WHERE TotalSoftGalleryV_SetID=%s", $TotalSoft_VG_TV_SE, $TotalSoft_VG_TV_HE, $TotalSoft_VG_TV_AS, $TotalSoft_VG_TV_FC, $TotalSoft_VG_TV_Sl, $TotalSoft_VG_TV_BC, $TotalSoft_VG_TV_BR, $TotalSoft_VG_TV_POM, $TotalSoft_VG_TV_POS, $TotalSoft_VG_TV_ShC, $Total_SoftGallery_Video_Update));
				}
				else if($TotalSoftGalleryV_SetType=='Content Popup')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name8 set TotalSoft_VG_CP_W=%s, TotalSoft_VG_CP_H=%s, TotalSoft_VG_CP_BW=%s, TotalSoft_VG_CP_BC=%s, TotalSoft_VG_CP_PB=%s, TotalSoft_VG_CP_BSShow=%s, TotalSoft_VG_CP_BSW=%s, TotalSoft_VG_CP_BSC=%s WHERE TotalSoftGalleryV_SetID=%s", $TotalSoft_VG_CP_W, $TotalSoft_VG_CP_H, $TotalSoft_VG_CP_BW, $TotalSoft_VG_CP_BC, $TotalSoft_VG_CP_PB, $TotalSoft_VG_CP_BSShow, $TotalSoft_VG_CP_BSW, $TotalSoft_VG_CP_BSC, $Total_SoftGallery_Video_Update));
				}
				else if($TotalSoftGalleryV_SetType=='Elastic Gallery')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name9 set TotalSoft_VG_HLG_W=%s, TotalSoft_VG_HLG_H=%s, TotalSoft_VG_HLG_BW=%s, TotalSoft_VG_HLG_BS=%s, TotalSoft_VG_HLG_BC=%s, TotalSoft_VG_HLG_BSh=%s, TotalSoft_VG_HLG_BShC=%s, TotalSoft_VG_HLG_IHovT=%s, TotalSoft_VG_HLG_IHovTr=%s WHERE TotalSoftGalleryV_SetID=%s", $TotalSoft_VG_HLG_W, $TotalSoft_VG_HLG_H, $TotalSoft_VG_HLG_BW, $TotalSoft_VG_HLG_BS, $TotalSoft_VG_HLG_BC, $TotalSoft_VG_HLG_BSh, $TotalSoft_VG_HLG_BShC, $TotalSoft_VG_HLG_IHovT, $TotalSoft_VG_HLG_IHovTr, $Total_SoftGallery_Video_Update));
				}
				else if($TotalSoftGalleryV_SetType=='Fancy Gallery')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name10 set TotalSoft_VG_FG_W=%s, TotalSoft_VG_FG_H=%s, TotalSoft_VG_FG_BW=%s, TotalSoft_VG_FG_BC=%s, TotalSoft_VG_FG_BSh=%s, TotalSoft_VG_FG_BShC=%s, TotalSoft_VG_FG_BR=%s, TotalSoft_VG_FG_PBI=%s WHERE TotalSoftGalleryV_SetID=%s", $TotalSoft_VG_FG_W, $TotalSoft_VG_FG_H, $TotalSoft_VG_FG_BW, $TotalSoft_VG_FG_BC, $TotalSoft_VG_FG_BSh, $TotalSoft_VG_FG_BShC, $TotalSoft_VG_FG_BR, $TotalSoft_VG_FG_PBI, $Total_SoftGallery_Video_Update));
				}
				else if($TotalSoftGalleryV_SetType=='Parallax Engine')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name11 set TotalSoft_JGV_H=%s, TotalSoft_JGV_W=%s, TotalSoft_JGV_BSh=%s, TotalSoft_JGV_BShC=%s, TotalSoft_JGV_BShT=%s, TotalSoft_JGV_ET=%s, TotalSoft_JGV_PBI=%s, TotalSoft_JGV_BR=%s WHERE TotalSoftGalleryV_SetID=%s", $TotalSoft_JGV_H, $TotalSoft_JGV_W, $TotalSoft_JGV_BSh, $TotalSoft_JGV_BShC, $TotalSoft_JGV_BShT, $TotalSoft_JGV_ET, $TotalSoft_JGV_PBI, $TotalSoft_JGV_BR, $Total_SoftGallery_Video_Update));
				}
			}
		}
	    else
	    {
	        wp_die('Security check fail'); 
	    }
	}
		
	$TotalSoftFontCount=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d", 0));
	$TotalSoftGalleryVOptions=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id>%d", 0));
?>
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/totalsoft.css',__FILE__);?>">
<form method="POST" oninput="TotalSoft_VGallery_Out()">
	<?php wp_nonce_field( 'edit-menu_'.$comment_id, 'TS_VGallery_Nonce' );?>
	<div class="Total_Soft_Gallery_Video_AMD">
		<a href="http://total-soft.pe.hu/gallery-video/" target="_blank" title="Click to Buy">
			<div class="Full_Version"><i class="totalsoft totalsoft-cart-arrow-down"></i> Get The Full Version</div>
		</a>
		<div class="Full_Version_Span">
			This is the free version of the plugin.
		</div>
		<div class="Support_Span">
			<a href="https://wordpress.org/support/plugin/gallery-videos/" target="_blank" title="Click Here to Ask">
				<i class="totalsoft totalsoft-comments-o"></i><span style="margin-left:5px;">If you have any questions click here to ask it to our support.</span>
			</a>
		</div>
		<div class="Total_Soft_Gallery_Video_AMD1"></div>
		<div class="Total_Soft_Gallery_Video_AMD2">
			<i class="Total_Soft_Help totalsoft totalsoft-question-circle-o" title="Click for Creating New Gallery Video Setting"></i>
			<input type="button" name="" value="New Option (Pro)" class="Total_Soft_Gallery_Video_AMD2_But" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
		</div>
		<div class="Total_Soft_Gallery_Video_AMD3">
			<i class="Total_Soft_Help totalsoft totalsoft-question-circle-o" title="Click for Canceling"></i>
			<input type="button" value="Cancel" class="Total_Soft_Gallery_Video_AMD2_But" onclick='TotalSoft_Reload()'>
			<i class="Total_Soft_Gallery_Video_Update_Option Total_Soft_Help totalsoft totalsoft-question-circle-o" title="Click for Updating Settings"></i>
			<input type="submit" name="Total_Soft_Gallery_Video_Update_Option" value="Update" class="Total_Soft_Gallery_Video_Update_Option Total_Soft_Gallery_Video_AMD2_But">
			<input type="text" style="display:none" name="Total_SoftGallery_Video_Update" id="Total_SoftGallery_Video_Update">
		</div>
	</div>

	<table class="Total_Soft_AMMTable">
		<tr class="Total_Soft_AMMTableFR">
			<td>No</td>
			<td>Setting Title</td>
			<td>Gallery Type</td>
			<td>Actions</td>
		</tr>
	</table>
	<table class="Total_Soft_AMOTable">
	 	<?php for($i=0;$i<count($TotalSoftGalleryVOptions);$i++){ ?> 
	 		<tr id="Total_Soft_AMOTable_tr_<?php echo $TotalSoftGalleryVOptions[$i]->id;?>">
				<td><?php echo $i+1;?></td>
				<td><?php echo $TotalSoftGalleryVOptions[$i]->TotalSoftGalleryV_SetName;?></td>
				<td><?php echo $TotalSoftGalleryVOptions[$i]->TotalSoftGalleryV_SetType;?></td>
				<td><i class="Total_Soft_icon totalsoft totalsoft-file-text" onclick="TotalSoftGalleryV_Clone_Option(<?php echo $TotalSoftGalleryVOptions[$i]->id;?>)"></i></td>
				<td><i class="Total_Soft_icon totalsoft totalsoft-pencil" onclick="TotalSoftGalleryV_Edit_Option(<?php echo $TotalSoftGalleryVOptions[$i]->id;?>)"></i></td>
				<td>
					<i class="Total_Soft_icon totalsoft totalsoft-trash" onclick="TotalSoftGalleryV_Del_Option(<?php echo $TotalSoftGalleryVOptions[$i]->id;?>)"></i>
					<span class="Total_Soft_GVideo_Del_Span">
						<i class="Total_Soft_GVideo_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></i>
						<i class="Total_Soft_GVideo_Del_Span_No totalsoft totalsoft-times" onclick="TotalSoftGalleryV_Del_Option_No(<?php echo $TotalSoftGalleryVOptions[$i]->id;?>)"></i>
					</span>
				</td>
			</tr>
	 	<?php }?>
	</table>
	<table class="Total_Soft_AMSet_Table">
		<tr>
			<td>Setting Title <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can give name to gallery which will be saved with effects created by yourself."></i></td>
			<td><input type="text" name="TotalSoftGalleryV_SetName" id="TotalSoftGalleryV_SetName" class="Total_Soft_Select" required placeholder=" * Required"></td>
			<td>Gallery Type <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose that version which you want to see."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftGalleryV_SetType" id="TotalSoftGalleryV_SetType">
					<option value="Grid Video Gallery">     Grid Video Gallery     </option>
					<option value="LightBox Video Gallery"> LightBox Video Gallery </option>
					<option value="Thumbnails Video">       Thumbnails Video       </option>
					<option value="Content Popup">          Content Popup          </option>
					<option value="Elastic Gallery">        Elastic Gallery        </option>
					<option value="Fancy Gallery">          Fancy Gallery          </option>
					<option value="Parallax Engine">        Parallax Engine        </option>
				</select>
			</td>
		</tr>
	</table>

	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_1">
		<tr class="Total_Soft_Titles">
			<td colspan="4">General Options</td>			
		</tr>
		<tr>
			<td>Show Title <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select show the name or no."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_VG_GVG_TShow" name="TotalSoft_VG_GVG_TShow">
		            <label for="TotalSoft_VG_GVG_TShow" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Show Description <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select show the description or no."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_VG_GVG_DShow" name="TotalSoft_VG_GVG_DShow">
		            <label for="TotalSoft_VG_GVG_DShow" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
		</tr>
		<tr>
			<td>Image Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the video and it is all responsive in gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_GVG_CC" id="TotalSoft_VG_GVG_CC" min="100" max="500" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_GVG_CC_Output" for="TotalSoft_VG_GVG_CC"></output>
			</td>
			<td>Place Between <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the distance between the videos."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_GVG_PB" id="TotalSoft_VG_GVG_PB" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_GVG_PB_Output" for="TotalSoft_VG_GVG_PB"></output>
			</td>
		</tr>
		<tr>
			<td>Video Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the radius of video in general Gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_GVG_VR" id="TotalSoft_VG_GVG_VR" min="0" max="150" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_GVG_VR_Output" for="TotalSoft_VG_GVG_VR"></output>
			</td>
			<td>Hover Effect <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Keeping the mouse on the image select the Hover Effects which you will see."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_VG_GVG_HE" id="TotalSoft_VG_GVG_HE" onchange="TotalSoft_VG_GVG_HEffect()">
					<option value="none">                None                </option>
					<option value="blur">                Blur                </option>
					<option value="brightness">          Brightness          </option>
					<option value="contrast">            Contrast            </option>
					<option value="grayscale">           Grayscale           </option>
					<option value="hue-rotate">          Hue-rotate          </option>
					<option value="invert">              Invert              </option>
					<option value="drop-shadow">         Drop-shadow         </option>
					<option value="opacity">             Opacity             </option>
					<option value="saturate">            Saturate            </option>
					<option value="sepia">               Sepia               </option>
					<option value="contrast-brightness"> Contrast-Brightness </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Opacity <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the opacity of hover effect."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangeper" name="TotalSoft_VG_GVG_HO" id="TotalSoft_VG_GVG_HO" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_GVG_HO_Output" for="TotalSoft_VG_GVG_HO"></output>
			</td>
			<td>Drop Shadow Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow color."></i></td>
			<td class="DropShadow"><input type="text" name="TotalSoft_VG_GVG_DSC" id="TotalSoft_VG_GVG_DSC" class="Total_Soft_VGallery_Color" value=""></td>
			<td class="DropShadow1"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title & Description Area</td>			
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose a background color for the title and description. They are on the same area."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_TDA_BgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Margin Top (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the distance between the video and the title. For galleries you can choose according to your taste."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_GVG_TDA_MT" min="0" max="25" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_GVG_TDA_MT_Output" for="TotalSoft_VG_GVG_TDA_MT"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title Options</td>			
		</tr>
		<tr>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="This function is for the main title. You can select font size. The size of the title in responsive gallery."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_GVG_TFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_GVG_TFS_Output" for="TotalSoft_VG_GVG_TFS"></output>
			</td>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select the font family that you want to show."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_GVG_TFF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the main title."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_TC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Text Align (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the position where you want to put the headline. The gallery will be show all what you have chosen."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_GVG_TTA" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Line After Title</td>			
		</tr>
		<tr>
			<td>Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the line width. Line is located between title and description."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_GVG_LAT_W" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_GVG_LAT_W_Output" for="TotalSoft_VG_GVG_LAT_W"></output>
			</td>
			<td>Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the style of the dividing line: None, Solid, Dashed or Dotted."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_GVG_LAT_S" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation between the title and description."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_LAT_C" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Options</td>			
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose background color for the description, title and video in a popup window."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_Pop_BgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the width of the border for the popup container."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_GVG_Pop_BW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_GVG_Pop_BW_Output" for="TotalSoft_VG_GVG_Pop_BW"></output>
			</td>
		</tr>
		<tr>
			<td>Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the style for the border of the popup."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_GVG_Pop_BS" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine border color which is in the lightbox gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_Pop_BC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Border Radius (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It is possible to give a border radius in the popup window. You can specify the radius by the pixels. In gallery it is all responsive."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_GVG_Pop_BR" min="0" max="150" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_GVG_Pop_BR_Output" for="TotalSoft_VG_GVG_Pop_BR"></output>
			</td>
			<td>Padding (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose border width for popup."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_GVG_Pop_Pad" min="0" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_GVG_Pop_Pad_Output" for="TotalSoft_VG_GVG_Pop_Pad"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Title Options</td>			
		</tr>
		<tr>
			<td>Show Title (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In gallery you have opportunity to choose in the popup show the title or no."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_VG_GVG_Pop_TShow" name="">
		            <label for="TotalSoft_VG_GVG_Pop_TShow" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="This function is for the popup window. You can select font size for headers. For each screen or mobile version will be its own size for responsiveness."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_GVG_Pop_TFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_GVG_Pop_TFS_Output" for="TotalSoft_VG_GVG_Pop_TFS"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the title in popup."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_GVG_Pop_TFF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In gallery it is necessary to choose the color for video titles which is in the popup window."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_Pop_TC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>			
			<td>Text Align (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine alignment for the title which is in the popup window and provides information about your video."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_GVG_Pop_TTA" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>					
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Description Options</td>			
		</tr>
		<tr>
			<td>Show Description (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the description should appear or no in popup gallery."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_VG_GVG_Pop_DShow" name="">
		            <label for="TotalSoft_VG_GVG_Pop_DShow" data-on="Yes" data-off="No"></label>
		        </div>
			</td>			
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Line After Title in Popup</td>			
		</tr>
		<tr>
			<td>Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the width for the line in a popup. The line is between the title and description."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_GVG_Pop_LAT_W" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_GVG_Pop_LAT_W_Output" for="TotalSoft_VG_GVG_Pop_LAT_W"></output>
			</td>
			<td>Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the style of the dividing line: None , Solid , Dashed or Dotted."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_GVG_Pop_LAT_S" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation between the title and description in a popup."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_Pop_LAT_C" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Arrows Option</td>			
		</tr>
		<tr>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the left and right icons for the gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_GVG_Pop_AType" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="1">  Type 1  </option>
					<option value="2">  Type 2  </option>
					<option value="3">  Type 3  </option>
					<option value="4">  Type 4  </option>
					<option value="5">  Type 5  </option>
					<option value="6">  Type 6  </option>
					<option value="7">  Type 7  </option>
					<option value="8">  Type 8  </option>
					<option value="9">  Type 9  </option>
					<option value="10"> Type 10 </option>
					<option value="11"> Type 11 </option>
				</select>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color to change the video."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_Pop_AC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Change the icon size regardless of the container. The Gallery Video plugin allows to get most suitable navigation arrows that are most appropriate for your site."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_GVG_Pop_AFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_GVG_Pop_AFS_Output" for="TotalSoft_VG_GVG_Pop_AFS"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Close Icon Option</td>			
		</tr>
		<tr>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety beautifully designed sets in the gallery to close the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_GVG_Pop_CType" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="1"> Type 1 </option>
					<option value="2"> Type 2 </option>
					<option value="3"> Type 3 </option>
				</select>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the icon to close the window. When you close the window with it closes and the video."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_Pop_CC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the size of the icon that is to close the popup window. The icon is in the right corner."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_GVG_Pop_CFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_GVG_Pop_CFS_Output" for="TotalSoft_VG_GVG_Pop_CFS"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Link Option</td>			
		</tr>
		<tr>
			<td>Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border width for link."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_GVG_Pop_LBW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_GVG_Pop_LBW_Output" for="TotalSoft_VG_GVG_Pop_LBW"></output>
			</td>
			<td>Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border style for link."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_GVG_Pop_LBS" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border color which is in the lightbox gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_Pop_LBC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Border Radius (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Install the border radius for Gallery link."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_GVG_Pop_LBR" min="0" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_GVG_Pop_LBR_Output" for="TotalSoft_VG_GVG_Pop_LBR"></output>
			</td>
		</tr>
		<tr>
			<td>Link Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in link button. When you have created a gallery in each box has URL. If you wrote something in your popup window, now you can see it."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_Pop_LText" class="Total_Soft_Select" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define a background color which is intended for the link button."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_Pop_LBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the text for the button which you will see in a popup."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_Pop_LC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size from gallery popup."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_GVG_Pop_LFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_GVG_Pop_LFS_Output" for="TotalSoft_VG_GVG_Pop_LFS"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select that font family that will make your gallery more beautiful."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_GVG_Pop_LFF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover background color for link in the gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_Pop_LHBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover color for link in the gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_Pop_LHC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Pagination & Load More</td>			
		</tr>
		<tr>
			<td>Next Button Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can write the text that you want to see on this button. This NEXT button to change the page. But it all in the gallery. You choose how many videos to show in a page."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_P_NBT" maxlength="10" class="Total_Soft_Select" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Prev Button Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write the text for the button that changes the page backward. But in one picture. You choose how many videos to show."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_P_PBT" maxlength="10" class="Total_Soft_Select" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select your preferred color for pagination. The text and font will be on a same color."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_P_BgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the text and number buttons."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_P_C" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the number of paging ' pagination '. The same color for the text and number."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_GVG_P_FS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_GVG_P_FS_Output" for="TotalSoft_VG_GVG_P_FS"></output>
			</td>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the pagination used from the video in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_GVG_P_FF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Current Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current background color of the gallery pagination that all the pages are displayed in the main pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_P_CBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Current Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current color of the pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_P_CC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferred hover background color for the pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_P_HBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the text color for hover."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_P_HC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>			
			<td>Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the preferred color for the border."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_GVG_P_BS" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="none">  None  </option>
					<option value="solid"> Solid </option>
				</select>
			</td>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the preferred color for the border."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_GVG_P_BC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>		
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_2">
		<tr class="Total_Soft_Titles">
			<td colspan="4">General Option</td>			
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the video and it is all responsive in gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_LVG_CC" id="TotalSoft_VG_LVG_CC" min="100" max="500" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_CC_Output" for="TotalSoft_VG_LVG_CC"></output>
			</td>
			<td>Place Between <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the distance between each image. Here the image from your Youtube and Vimeo videos."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_LVG_PB" id="TotalSoft_VG_LVG_PB" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_PB_Output" for="TotalSoft_VG_LVG_PB"></output>
			</td>
		</tr>
		<tr>
			<td>Box Shadow <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow value for the image window."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_LVG_Pad" id="TotalSoft_VG_LVG_Pad" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_Pad_Output" for="TotalSoft_VG_LVG_Pad"></output>
			</td>
			<td>Shadow Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow of the image."></i></td>
			<td><input type="text" name="TotalSoft_VG_LVG_BgC" id="TotalSoft_VG_LVG_BgC" class="Total_Soft_VGallery_Color" value=""></td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the preferred width of the border for video."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_LVG_VBW" id="TotalSoft_VG_LVG_VBW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_VBW_Output" for="TotalSoft_VG_LVG_VBW"></output>
			</td>
			<td>Border Style <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Identify the basic style of the image border and you can change it at any time."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_VG_LVG_VBS" id="TotalSoft_VG_LVG_VBS">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the image border color which is in the gallery."></i></td>
			<td><input type="text" name="TotalSoft_VG_LVG_VBC" id="TotalSoft_VG_LVG_VBC" class="Total_Soft_VGallery_Color" value=""></td>
			<td>Border Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the border radius in your lightbox gallery video."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_LVG_VBR" id="TotalSoft_VG_LVG_VBR" min="0" max="200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_VBR_Output" for="TotalSoft_VG_LVG_VBR"></output>
			</td>
		</tr>
		<tr>
			<td>Zoom Type <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select the type of scaling of different and beautifully designed sets from the image."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_VG_LVG_Img_Zoom_Type" id="TotalSoft_VG_LVG_Img_Zoom_Type">
					<option value="lImgZoom1"> Effect 1 </option>
					<option value="lImgZoom2"> Effect 2 </option>
					<option value="lImgZoom3"> Effect 3 </option>
					<option value="lImgZoom4"> Effect 4 </option>
					<option value="lImgZoom5"> Effect 5 </option>
					<option value="lImgZoom6"> Effect 6 </option>
					<option value="lImgZoom7"> Effect 7 </option>
				</select>
			</td>
			<td>Zoom Time <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the time to increase the effect on the gallery. When you hover the mouse over the video you can see the zoom effect."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangesec" name="TotalSoft_VG_LVG_Img_Zoom_Effect_Time" id="TotalSoft_VG_LVG_Img_Zoom_Effect_Time" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_Img_Zoom_Effect_Time_Output" for="TotalSoft_VG_LVG_Img_Zoom_Effect_Time"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Overlay Option</td>			
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the overlay on the video as you keep the mouse arrow on it. The effects are very beautiful and they are very suitable in the gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_Hov_Ov_Bg_Color" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Effect Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the hover effect type. There are 13 effects type in lightbox gallery. They are all different from each other."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_LVG_Hov_Ov_Effect_Type" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="hovLayTVG1">  Effect 1  </option>
					<option value="hovLayTVG2">  Effect 2  </option>
					<option value="hovLayTVG3">  Effect 3  </option>
					<option value="hovLayTVG4">  Effect 4  </option>
					<option value="hovLayTVG5">  Effect 5  </option>
					<option value="hovLayTVG6">  Effect 6  </option>
					<option value="hovLayTVG7">  Effect 7  </option>
					<option value="hovLayTVG8">  Effect 8  </option>
					<option value="hovLayTVG9">  Effect 9  </option>
					<option value="hovLayTVG10"> Effect 10 </option>
					<option value="hovLayTVG11"> Effect 11 </option>
					<option value="hovLayTVG12"> Effect 12 </option>
					<option value="hovLayTVG13"> Effect 13 </option>
				</select> 
			</td>
		</tr>
		<tr>
			<td>Effect Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time of hover effect for gallery video."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangesec" name="" id="TotalSoft_VG_LVG_Hov_Ov_Effect_Time" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_Hov_Ov_Effect_Time_Output" for="TotalSoft_VG_LVG_Hov_Ov_Effect_Time"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title Option</td>			
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the background color for the text container."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_Title_Bg_Color" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font size for the video title."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_LVG_Title_Font_Size" min="10" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_Title_Font_Size_Output" for="TotalSoft_VG_LVG_Title_Font_Size"></output>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for your title which will be seen in gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_Title_Color" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Hover Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine preferable type of your hover effects."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_LVG_Title_Effect_Type" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="hovTit1">  Effect 1  </option>
					<option value="hovTit2">  Effect 2  </option>
					<option value="hovTit3">  Effect 3  </option>
					<option value="hovTit4">  Effect 4  </option>
					<option value="hovTit5">  Effect 5  </option>
					<option value="hovTit6">  Effect 6  </option>
					<option value="hovTit7">  Effect 7  </option>
					<option value="hovTit8">  Effect 8  </option>
					<option value="hovTit9">  Effect 9  </option>
					<option value="hovTit10"> Effect 10 </option>
					<option value="hovTit11"> Effect 11 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Hover Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time of hover effect for gallery video."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangesec" name="" id="TotalSoft_VG_LVG_Title_Effect_Time" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_Title_Effect_Time_Output" for="TotalSoft_VG_LVG_Title_Effect_Time"></output>
			</td>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the preferred font family for the title. Gallery has a basic Google font."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_LVG_Title_Text_Shadow" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Line Option</td>			
		</tr>
		<tr>
			<td>Line Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the line width."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_LVG_Line_Width" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_Line_Width_Output" for="TotalSoft_VG_LVG_Line_Width"></output>
			</td>
			<td>Line Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the style to be applied to the line."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_LVG_Line_Style" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Line Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_Line_Color" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Effect Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="There are 7 different line effect types."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_LVG_Line_Hov_Type" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="hovLine1"> Effect 1 </option>
					<option value="hovLine2"> Effect 2 </option>
					<option value="hovLine3"> Effect 3 </option>
					<option value="hovLine4"> Effect 4 </option>
					<option value="hovLine5"> Effect 5 </option>
					<option value="hovLine6"> Effect 6 </option>
					<option value="hovLine7"> Effect 7 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Effect Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select effect time for hover line effect."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangesec" name="" id="TotalSoft_VG_LVG_Line_Hov_Time" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_Line_Hov_Time_Output" for="TotalSoft_VG_LVG_Line_Hov_Time"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Link Option</td>			
		</tr>
		<tr>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the font size for the link button."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_LVG_Link_Font_Size" min="10" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_Link_Font_Size_Output" for="TotalSoft_VG_LVG_Link_Font_Size"></output>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the button which you will see in image."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_Link_Color" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border color which is in the image container."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_Link_Border_Color" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border width which is in the image container."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_LVG_Link_Border_Width" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_Link_Border_Width_Output" for="TotalSoft_VG_LVG_Link_Border_Width"></output>
			</td>
		</tr>
		<tr>
			<td>Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border style."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_LVG_Link_Border_Style" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Link Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in link button. When you have created a gallery in each box has URL."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_Link_Bg_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Hover Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine preferable link type of your hover effects."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_LVG_Link_Hov_Type" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="hovLink1"> Effect 1 </option>
					<option value="hovLink2"> Effect 2 </option>
					<option value="hovLink3"> Effect 3 </option>
					<option value="hovLink4"> Effect 4 </option>
					<option value="hovLink5"> Effect 5 </option>
					<option value="hovLink6"> Effect 6 </option>
					<option value="hovLink7"> Effect 7 </option>
					<option value="hovLink8"> Effect 8 </option>
					<option value="hovLink9"> Effect 9 </option>
				</select>
			</td>
			<td>Hover Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time for hover effect."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangesec" name="" id="TotalSoft_VG_LVG_Link_Hov_Time" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_Link_Hov_Time_Output" for="TotalSoft_VG_LVG_Link_Hov_Time"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the preferred font family for the link button. Plugin has a basic Google font."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_LVG_Title_Shadow_Color" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Option</td>			
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Open the gallery edit and choose your preferable background color for popup."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_Pop_BgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the width of the border for the container in a popup window."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_LVG_Pop_BW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_Pop_BW_Output" for="TotalSoft_VG_LVG_Pop_BW"></output>
			</td>
		</tr>
		<tr>
			<td>Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the style for the border of the popup."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_LVG_Pop_BS" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine border color which is in the popup."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_Pop_BC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Border Radius (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the popup window it is possible to give a border radius. You can specify the radius by pixels. In plugin it is all responsive."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_LVG_Pop_BR" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_Pop_BR_Output" for="TotalSoft_VG_LVG_Pop_BR"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title in Popup Option</td>			
		</tr>
		<tr>
			<td>Show (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the title or no in popup."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_VG_LVG_Pop_TShow" name="">
		            <label for="TotalSoft_VG_LVG_Pop_TShow" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Text Align (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose text to align for title (left, center or right)."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_LVG_Pop_TTA" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the image title."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_LVG_Pop_TFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_Pop_TFS_Output" for="TotalSoft_VG_LVG_Pop_TFS"></output>
			</td>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the font family for the image title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_LVG_Pop_TFF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the gallery set the color for the image title."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_Pop_TC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Play Icon Option</td>			
		</tr>
		<tr>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_LVG_Pop_PType" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="1"> Type 1 </option>
					<option value="2"> Type 2 </option>
					<option value="3"> Type 3 </option>
				</select>
			</td>
			<td>Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the size of the play icon."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_LVG_Pop_PIS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_Pop_PIS_Output" for="TotalSoft_VG_LVG_Pop_PIS"></output>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color to change images."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_Pop_PIC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Close Icon Option</td>			
		</tr>
		<tr>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can choose icons from different beautifully designed sets in video to close the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_LVG_Pop_CType" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="1"> Type 1 </option>
					<option value="2"> Type 2 </option>
					<option value="3"> Type 3 </option>
				</select>
			</td>
			<td>Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose in the gallery for the close box which size is approriate."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_LVG_Pop_CIS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_Pop_CIS_Output" for="TotalSoft_VG_LVG_Pop_CIS"></output>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for close the popup."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_Pop_CIC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in close button."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_Pop_CIT" maxlength="10" class="Total_Soft_Select" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferable font family for close button."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_LVG_Pop_CTF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Arrows Option</td>			
		</tr>
		<tr>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the right and the left icons for popup which are for change the images by sequence."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_LVG_Pop_AType" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="1">  Type 1  </option>
					<option value="2">  Type 2  </option>
					<option value="3">  Type 3  </option>
					<option value="4">  Type 4  </option>
					<option value="5">  Type 5  </option>
					<option value="6">  Type 6  </option>
					<option value="7">  Type 7  </option>
					<option value="8">  Type 8  </option>
					<option value="9">  Type 9  </option>
					<option value="10"> Type 10 </option>
					<option value="11"> Type 11 </option>
				</select>
			</td>
			<td>Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Change the icon size regardless of the container. This plugin allows to get most suitable navigation arrows that are most appropriate for your site."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_LVG_Pop_ArrS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_Pop_ArrS_Output" for="TotalSoft_VG_LVG_Pop_ArrS"></output>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color to change the image."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_Pop_ArrC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Numbers Option</td>			
		</tr>
		<tr>
			<td>Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Note the size of the numbers. It is fully responsive."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_LVG_Pop_NFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_Pop_NFS_Output" for="TotalSoft_VG_LVG_Pop_NFS"></output>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the numbers."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_Pop_NC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Pagination & Load More</td>			
		</tr>
		<tr>
			<td>Next Button Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can write the text that you want to see on this button. This next button to change the page. You choose how many videos to show in a page."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_P_NBT" maxlength="10" class="Total_Soft_Select" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Prev Button Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write the text for the button that changes the page backward. But in one picture. You choose how many videos to show."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_P_PBT" maxlength="10" class="Total_Soft_Select" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select your preferred color for pagination. The text and font will be on a same color."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_P_BgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the text and number buttons."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_P_C" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=" Define the font size for the number of paging ' pagination '. The same color for the text and number."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_LVG_P_FS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_LVG_P_FS_Output" for="TotalSoft_VG_LVG_P_FS"></output>
			</td>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the pagination used from the video in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_LVG_P_FF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Current Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current background color of the pagination that all the pages are displayed in the main pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_P_CBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Current Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current color of the pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_P_CC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferred hover background color for the pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_P_HBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the text color for hover."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_P_HC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the preferred color for the border."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_LVG_P_BC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>			
			<td>Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the gallery select the border style for the pagination."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_LVG_P_BS" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="none">  None  </option>
					<option value="solid"> Solid </option>
				</select>
			</td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_3">
		<tr class="Total_Soft_Titles">
			<td colspan="4">General Options</td>			
		</tr>
		<tr>
			<td>Start Effect <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the effect for start which should be applied by images to changing albums."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_VG_TV_SE" id="TotalSoft_VG_TV_SE">
					<option value="normal">      Normal      </option>
					<option value="transparent"> Transparent </option>
					<option value="overlay">     Overlay     </option>
				</select>
			</td>
			<td>Hover Effect <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Keeping the mouse on the image select the Hover Effects which you will see."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_VG_TV_HE" id="TotalSoft_VG_TV_HE">
					<option value="normal">             Normal                </option>
					<option value="popout">             Popout                </option>
					<option value="sliceDown">          Slice Down            </option>
					<option value="sliceDownLeft">      Slice Down Left       </option>
					<option value="sliceUp">            Slice Up              </option>
					<option value="sliceUpLeft">        Slice Up Left         </option>
					<option value="sliceUpRandom">      Slice Up Random       </option>
					<option value="sliceDownRandom">    Slice Down Random     </option>
					<option value="sliceUpDown">        Slice Up Down         </option>
					<option value="sliceUpDownLeft">    Slice Up Down Left    </option>
					<option value="fold">               Fold                  </option>
					<option value="foldLeft">           Fold Left             </option>
					<option value="boxRandom">          Box Random            </option>
					<option value="boxRain">            Box Rain              </option>
					<option value="boxRainReverse">     Box Rain Reverse      </option>
					<option value="boxRainGrow">        Box Rain Grow         </option>
					<option value="boxRainGrowReverse"> Box Rain Grow Reverse </option>
				</select>
			</td>
		</tr>
		<tr>			
			<td>Animation Speed <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="The animation time function specifies the speed of an animation."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangemsec" name="TotalSoft_VG_TV_AS" id="TotalSoft_VG_TV_AS" min="100" max="1000" step="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_TV_AS_Output" for="TotalSoft_VG_TV_AS"></output>
			</td>	
			<td>Fill Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="The fill property in CSS is for filling in the color of a shape."></i></td>
			<td><input type="text" name="TotalSoft_VG_TV_FC" id="TotalSoft_VG_TV_FC" class="Total_Soft_VGallery_Color" value=""></td>
		</tr>
		<tr>
			<td>Slices <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="The slice effect creates a beautiful look in a slideshow and has become quite popular."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range" name="TotalSoft_VG_TV_Sl" id="TotalSoft_VG_TV_Sl" min="1" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_TV_Sl_Output" for="TotalSoft_VG_TV_Sl"></output>
			</td>
			<td>Box Cols <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the number of box cols which will be shown."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range" name="TotalSoft_VG_TV_BC" id="TotalSoft_VG_TV_BC" min="1" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_TV_BC_Output" for="TotalSoft_VG_TV_BC"></output>
			</td>
		</tr>
		<tr>
			<td>Box Rows <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the number of box rows which will be shown."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range" name="TotalSoft_VG_TV_BR" id="TotalSoft_VG_TV_BR" min="1" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_TV_BR_Output" for="TotalSoft_VG_TV_BR"></output>
			</td>
			<td>PopOut Margin <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select image zoom size in Popout hover effect."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_TV_POM" id="TotalSoft_VG_TV_POM" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_TV_POM_Output" for="TotalSoft_VG_TV_POM"></output>
			</td>
		</tr>
		<tr>
			<td>PopOut Shadow <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select size which allows to show the shadow of the image in Popout hover effect."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_TV_POS" id="TotalSoft_VG_TV_POS" min="0" max="40" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_TV_POS_Output" for="TotalSoft_VG_TV_POS"></output>
			</td>
			<td>Shadow Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow of the image in Popout hover effect."></i></td>
			<td><input type="text" name="TotalSoft_VG_TV_ShC" id="TotalSoft_VG_TV_ShC" class="Total_Soft_VGallery_Color" value=""></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Video Options</td>			
		</tr>
		<tr>
			<td>Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define video width for the gallery browser view option."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_TV_VW" min="150" max="1200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_TV_VW_Output" for="TotalSoft_VG_TV_VW"></output>
			</td>
			<td>Height (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify video height for the browser view option."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_TV_VH" min="150" max="1200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_TV_VH_Output" for="TotalSoft_VG_TV_VH"></output>
			</td>
		</tr>
		<tr>
			<td>Place Between Videos (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set place between item container images."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_TV_V_PBImgs" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_TV_V_PBImgs_Output" for="TotalSoft_VG_TV_V_PBImgs"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Video Icon Options</td>			
		</tr>
		<tr>
			<td>Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Alter the size of the icon regardless of the container."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_TV_Ic_S" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_TV_Ic_S_Output" for="TotalSoft_VG_TV_V_PBImgs"></output>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_Ic_C" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the slide."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_TV_Ic_T" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="totalsoft totalsoft-play">          Type 1 </option>
					<option value="totalsoft totalsoft-play-circle">   Type 2 </option>
					<option value="totalsoft totalsoft-play-circle-o"> Type 3 </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title Options</td>			
		</tr>
		<tr>
			<td>Show (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the title or no."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_VG_TV_TShow" name="">
		            <label for="TotalSoft_VG_TV_TShow" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select background color for the title."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_TBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color for the title."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_TC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine your preferred font size for image title."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_TV_TFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_TV_TFS_Output" for="TotalSoft_VG_TV_TFS"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font family for the title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_TV_TFF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>Position (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions: top, center, bottom."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_TV_TPos" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="top">    Top    </option>
					<option value="center"> Center </option>
					<option value="bottom"> Bottom </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Options</td>			
		</tr>
		<tr>
			<td>Overlay Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for the overlay."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_Pop_OC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Background (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the background or no."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_VG_TV_Pop_Bg" name="">
		            <label for="TotalSoft_VG_TV_Pop_Bg" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for popup."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_Pop_BgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Border Radius (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border radius."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_TV_Pop_BR" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_TV_Pop_BR_Output" for="TotalSoft_VG_TV_Pop_BR"></output>
			</td>
		</tr>
		<tr>			
			<td>Box Shadow Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the color for box shadow."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_Pop_BSC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title in Popup</td>			
		</tr>
		<tr>
			<td>Background (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the background for title or no."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_VG_TV_Pop_TBg" name="">
		            <label for="TotalSoft_VG_TV_Pop_TBg" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for title."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_Pop_TBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>		
		<tr>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the title."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_TV_Pop_TFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_TV_Pop_TFS_Output" for="TotalSoft_VG_TV_Pop_TFS"></output>
			</td>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font family for the title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_TV_Pop_TFF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Clicking on the image opens a popup select your preferable title color for popup."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_Pop_TC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Text Align (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose text align for title (left, center or right)."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_TV_Pop_TTA" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="left">   Left   </option>
					<option value="center"> Center </option>
					<option value="right">  Right  </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Numbers Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the numbers."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_Pop_NC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Numbers Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Note the size of the numbers. It is fully responsive."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_TV_Pop_NS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_TV_Pop_NS_Output" for="TotalSoft_VG_TV_Pop_NS"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Arrow Options</td>			
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferable background color of the icons."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_Pop_ABgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color of the icon."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_Pop_AC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Radius (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the radius for your icon in gallery."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangeper" name="" id="TotalSoft_VG_TV_Pop_AR" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_TV_Pop_AR_Output" for="TotalSoft_VG_TV_Pop_AR"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Close Icon Options</td>			
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the close icon background color."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_Pop_CBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for closing popup in the gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_Pop_CC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Radius (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the radius for your icon in gallery."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangeper" name="" id="TotalSoft_VG_TV_Pop_CR" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_TV_Pop_CR_Output" for="TotalSoft_VG_TV_Pop_CR"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Pagination & Load More</td>			
		</tr>
		<tr>
			<td>Next Button Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can write the text that you want to see on this button. This next button to change the page. You choose how many videos to show in a page."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_P_NBT" maxlength="10" class="Total_Soft_Select" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Prev Button Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write the text for the button that changes the page backward. But in one picture. You choose how many videos to show."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_P_PBT" maxlength="10" class="Total_Soft_Select" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select your preferred color for pagination. The text and font will be on a same color."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_P_BgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the text and number buttons."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_P_C" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the number of paging ' pagination '. The same color for the text and number."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_TV_P_FS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_TV_P_FS_Output" for="TotalSoft_VG_TV_P_FS"></output>
			</td>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the pagination used from the video in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_TV_P_FF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Current Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current background color of the pagination that all the pages are displayed in the main pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_P_CBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Current Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current color of the pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_P_CC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferred hover background color for the pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_P_HBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the text color for hover."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_P_HC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the gallery select the border style for the pagination."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_TV_P_BS" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="none">  None  </option>
					<option value="solid"> Solid </option>
				</select>
			</td>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the preferred color for the border."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_TV_P_BC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_4">
		<tr class="Total_Soft_Titles">
			<td colspan="4">General Options</td>			
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the image and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_CP_W" id="TotalSoft_VG_CP_W" min="150" max="1200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_CP_W_Output" for="TotalSoft_VG_CP_W"></output>
			</td>
			<td>Height <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred height of the image and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_CP_H" id="TotalSoft_VG_CP_H" min="150" max="1200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_CP_H_Output" for="TotalSoft_VG_CP_H"></output>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the borders of individual images."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_CP_BW" id="TotalSoft_VG_CP_BW" min="0" max="15" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_CP_BW_Output" for="TotalSoft_VG_CP_BW"></output>
			</td>
			<td>Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the frame border color for image."></i></td>
			<td><input type="text" name="TotalSoft_VG_CP_BC" id="TotalSoft_VG_CP_BC" class="Total_Soft_VGallery_Color" value=""></td>
		</tr>
		<tr>			
			<td>Place Between <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Between each element you may configure padding size."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_CP_PB" id="TotalSoft_VG_CP_PB" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_CP_PB_Output" for="TotalSoft_VG_CP_PB"></output>
			</td>
			<td>Box Shadow <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the shadow or no."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_VG_CP_BSShow" name="TotalSoft_VG_CP_BSShow">
		            <label for="TotalSoft_VG_CP_BSShow" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
		</tr>
		<tr>			
			<td>Shadow <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow value by the pixels."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_CP_BSW" id="TotalSoft_VG_CP_BSW" min="0" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_CP_BSW_Output" for="TotalSoft_VG_CP_BSW"></output>
			</td>
			<td>Shadow Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow of the image."></i></td>
			<td><input type="text" name="TotalSoft_VG_CP_BSC" id="TotalSoft_VG_CP_BSC" class="Total_Soft_VGallery_Color" value=""></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Options</td>			
		</tr>
		<tr>
			<td>Effect (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the hover effect type. There are 10 effect types. They are all different from each other."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_CP_HEff" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="1">  Effect 1  </option>
					<option value="2">  Effect 2  </option>
					<option value="3">  Effect 3  </option>
					<option value="4">  Effect 4  </option>
					<option value="5">  Effect 5  </option>
					<option value="6">  Effect 6  </option>
					<option value="7">  Effect 7  </option>
					<option value="8">  Effect 8  </option>
					<option value="9">  Effect 9  </option>
					<option value="10"> Effect 10 </option>
				</select>
			</td>
			<td>Overlay Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the overlay as you keep the mouse arrow on it. The effects are very beautiful and they are very suitable."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_HOC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title Options</td>			
		</tr>
		<tr>
			<td>Show (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the title or no."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_VG_CP_TShow" name="">
		            <label for="TotalSoft_VG_CP_TShow" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Configure the preferable color of the font."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_TC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the preferable size of the letters of the title."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_CP_TFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_CP_TFS_Output" for="TotalSoft_VG_CP_TFS"></output>
			</td>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the font family for the title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_CP_TFF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the background color for the title."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_TBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Description Options</td>			
		</tr>
		<tr>
			<td>Show (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose whether to see the description text or no."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_VG_CP_DShow" name="">
		            <label for="TotalSoft_VG_CP_DShow" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Line After Title</td>			
		</tr>
		<tr>			
			<td>Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose Width for separation line the after title."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_CP_LATW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_CP_LATW_Output" for="TotalSoft_VG_CP_LATW"></output>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose color for separation line the after title."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_LATC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Link Option</td>			
		</tr>
		<tr>
			<td>Show (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select whether to see the link or no."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_VG_CP_LShow" name="">
		            <label for="TotalSoft_VG_CP_LShow" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in link button. When you have created a gallery in each box has URL."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_LText" maxlength="15" class="Total_Soft_Select" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>			
			<td>Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border width which is in the container."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_CP_LBW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_CP_LBW_Output" for="TotalSoft_VG_CP_LBW"></output>
			</td>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border color which is in the container."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_LBC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>			
			<td>Border Radius (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can specify the radius by the pixels."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_CP_LBR" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_CP_LBR_Output" for="TotalSoft_VG_CP_LBR"></output>
			</td>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the color for link background."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_LBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>			
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the button which you will see in image."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_LC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the font size for the link button."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_CP_LFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_CP_LFS_Output" for="TotalSoft_VG_CP_LFS"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the font family for the link button."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_CP_LFF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the color for the link background while hovering by mouse."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_LHBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the color for the font while hovering by mouse."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_LHC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Pagination & Load More</td>			
		</tr>
		<tr>
			<td>Next Button Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can write the text that you want to see on this button. This next button to change the page. You choose how many videos to show in a page."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_P_NBT" maxlength="10" class="Total_Soft_Select" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Prev Button Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write the text for the button that changes the page backward. But in one picture. You choose how many videos to show."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_P_PBT" maxlength="10" class="Total_Soft_Select" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select your preferred color for pagination. The text and font will be on a same color."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_P_BgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the text and number buttons."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_P_C" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the number of paging ' pagination '. The same color for the text and number."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_CP_P_FS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_CP_P_FS_Output" for="TotalSoft_VG_CP_P_FS"></output>
			</td>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the pagination used from the video in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_CP_P_FF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Current Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current background color of the pagination that all the pages are displayed in the main pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_P_CBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Current Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current color of the pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_P_CC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferred hover background color for the pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_P_HBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the text color for hover."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_P_HC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>			
			<td>Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the gallery select the border style for the pagination."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_CP_P_BS" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="none">  None  </option>
					<option value="solid"> Solid </option>
				</select>
			</td>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the preferred color for the border."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_P_BC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Options</td>			
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose background color for the description, title and video in a popup window."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_Pop_BgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the width of the border for the container in a content popup."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_CP_Pop_BW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_CP_Pop_BW_Output" for="TotalSoft_VG_CP_Pop_BW"></output>
			</td>
		</tr>
		<tr>
			<td>Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the style for the border of the content popup."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_CP_Pop_BS" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine border color which is in the content popup."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_Pop_BC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title in Popup</td>			
		</tr>
		<tr>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the title in content popup."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_CP_Pop_TFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_CP_Pop_TFS_Output" for="TotalSoft_VG_CP_Pop_TFS"></output>
			</td>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font family for the title in content popup."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_CP_Pop_TFF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Clicking on the image opens a popup select your preferable title color for popup."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_Pop_TC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for title."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_Pop_TBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Text Align (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose text align for title (left, center or right)."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_CP_Pop_TTA" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Link in Popup</td>			
		</tr>
		<tr>
			<td>Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in link button."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_Pop_LText" maxlength="15" class="Total_Soft_Select" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border width which is in the popup container."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_CP_Pop_LBW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_CP_Pop_LBW_Output" for="TotalSoft_VG_CP_Pop_LBW"></output>
			</td>
		</tr>
		<tr>
			<td>Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the border style for the link button in the content popup."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_CP_Pop_LBS" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border color which is in the popup container."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_Pop_LBC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Border Radius (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can specify the radius for link by the pixels."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_CP_Pop_LBR" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_CP_Pop_LBR_Output" for="TotalSoft_VG_CP_Pop_LBR"></output>
			</td>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the color for link background in the popup."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_Pop_LBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>			
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the button which you will see in container."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_Pop_LC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the font size for the link button."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_CP_Pop_LFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_CP_Pop_LFS_Output" for="TotalSoft_VG_CP_Pop_LFS"></output>
			</td>
		</tr>
		<tr>			
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the link text."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_CP_Pop_LFF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the color for the link background while hovering by mouse."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_Pop_LHBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>			
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the color for the font while hovering by mouse."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_Pop_LHC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Icons in Popup</td>			
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferable background color of the icons."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_Pop_IBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Close Icon Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose for the close box which size is approriate."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_CP_Pop_CIS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_CP_Pop_CIS_Output" for="TotalSoft_VG_CP_Pop_CIS"></output>
			</td>
		</tr>
		<tr>
			<td>Close Icon Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the close icon color for the popup."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_Pop_CIC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Close Icon Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=" You can choose icons from different beautifully designed sets to close the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_CP_Pop_CIT" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="1"> Type 1 </option>
					<option value="2"> Type 2 </option>
					<option value="3"> Type 3 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Arrows Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Change the icon size regardless of the container. Plugin allows to get most suitable navigation arrows that are most appropriate for your site."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_CP_Pop_AS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_CP_Pop_AS_Output" for="TotalSoft_VG_CP_Pop_AS"></output>
			</td>
			<td>Arrows Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color to change the video."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_CP_Pop_AC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Arrows Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the right and the left icons for popup which are for change the videos by sequence."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_CP_Pop_AT" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="1">  Type 1  </option>
					<option value="2">  Type 2  </option>
					<option value="3">  Type 3  </option>
					<option value="4">  Type 4  </option>
					<option value="5">  Type 5  </option>
					<option value="6">  Type 6  </option>
					<option value="7">  Type 7  </option>
					<option value="8">  Type 8  </option>
					<option value="9">  Type 9  </option>
					<option value="10"> Type 10 </option>
					<option value="11"> Type 11 </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_5">
		<tr class="Total_Soft_Titles">
			<td colspan="4">Video Image Options</td>			
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width and it is all responsive in gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_HLG_W" id="TotalSoft_VG_HLG_W" min="100" max="400" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_HLG_W_Output" for="TotalSoft_VG_HLG_W"></output>
			</td>
			<td>Height <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred height and it is all responsive in gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_HLG_H" id="TotalSoft_VG_HLG_H" min="100" max="400" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_HLG_H_Output" for="TotalSoft_VG_HLG_H"></output>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the width of the border for the image container."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_HLG_BW" id="TotalSoft_VG_HLG_BW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_HLG_BW_Output" for="TotalSoft_VG_HLG_BW"></output>
			</td>
			<td>Border Style <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the style for the border."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_VG_HLG_BS" id="TotalSoft_VG_HLG_BS">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine border color which is in the elastic gallery."></i></td>
			<td><input type="text" name="TotalSoft_VG_HLG_BC" id="TotalSoft_VG_HLG_BC" class="Total_Soft_VGallery_Color" value=""></td>
			<td>Box Shadow <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow value by the pixels."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_HLG_BSh" id="TotalSoft_VG_HLG_BSh" min="0" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_HLG_BSh_Output" for="TotalSoft_VG_HLG_BSh"></output>
			</td>
		</tr>
		<tr>
			<td>Shadow Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow of the image."></i></td>
			<td><input type="text" name="TotalSoft_VG_HLG_BShC" id="TotalSoft_VG_HLG_BShC" class="Total_Soft_VGallery_Color" value=""></td>
			<td>Zoom Type <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select the type of scaling of different and beautifully designed sets from the image."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_VG_HLG_IHovT" id="TotalSoft_VG_HLG_IHovT">
					<option value="zEff9"> None   </option>
					<option value="zEff1"> Type 1 </option>
					<option value="zEff2"> Type 2 </option>
					<option value="zEff3"> Type 3 </option>
					<option value="zEff4"> Type 4 </option>
					<option value="zEff5"> Type 5 </option>
					<option value="zEff6"> Type 6 </option>
					<option value="zEff7"> Type 7 </option>
					<option value="zEff8"> Type 8 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Effect Time <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time of hover effect."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangesec" name="TotalSoft_VG_HLG_IHovTr" id="TotalSoft_VG_HLG_IHovTr" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_HLG_IHovTr_Output" for="TotalSoft_VG_HLG_IHovTr"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Video Title Options</td>			
		</tr>
		<tr>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font size for the title."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_HLG_TFS" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_HLG_TFS_Output" for="TotalSoft_VG_HLG_TFS"></output>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for your title which will be seen in elastic type."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_TC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the preferred font family for the title. Plugin has a basic Google font."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_HLG_TFF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the background color for the text container."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_TBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Hover Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine preferable type of your hover effects."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_HLG_THovT" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="zTitfHov1"> Type 1 </option>
					<option value="zTitfHov2"> Type 2 </option>
					<option value="zTitfHov3"> Type 3 </option>
					<option value="zTitfHov4"> Type 4 </option>
				</select>
			</td>
			<td>Effect Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time of hover effect."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangesec" name="" id="TotalSoft_VG_HLG_THovTr" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_HLG_THovTr_Output" for="TotalSoft_VG_HLG_THovTr"></output>
			</td>
		</tr>
		<tr>
			<td>Show Title (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You have opportunity to choose in the elastic type show the title or no."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_VG_HLG_ShowT" name="">
		            <label for="TotalSoft_VG_HLG_ShowT" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td colspan="2"></td>			
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Icon Options</td>			
		</tr>
		<tr>
			<td>Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Alter the size of the icon."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_HLG_PIcS" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_HLG_PIcS_Output" for="TotalSoft_VG_HLG_PIcS"></output>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color of the icon."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_PIcC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Icon Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icons for image popup."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_HLG_PIcT" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="totalsoft totalsoft-file-video-o"> Type 1 </option>
					<option value="totalsoft totalsoft-video-camera"> Type 2 </option>
					<option value="totalsoft totalsoft-camera-retro"> Type 3 </option>
					<option value="totalsoft totalsoft-eye">          Type 4 </option>
					<option value="totalsoft totalsoft-film">         Type 5 </option>
					<option value="totalsoft totalsoft-youtube-play"> Type 6 </option>
				</select>
			</td>
			<td>Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border width for popup icon."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_HLG_PIcBW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_HLG_PIcBW_Output" for="TotalSoft_VG_HLG_PIcBW"></output>
			</td>
		</tr>
		<tr>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the border color for icon in the gallery popup container."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_PIcBC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the style for the border."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_HLG_PIcBS" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferable background color of the icons."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_PIcBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Link Icon Options</td>			
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the icon for the button which you will see in a popup."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_LC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border color."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_LBC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define a background color which is intended for the link button."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_LBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Icon Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select the icon type of different and beautifully designed sets."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_HLG_LIcT" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="totalsoft totalsoft-external-link">        Type 1 </option>
					<option value="totalsoft totalsoft-external-link-square"> Type 2 </option>
					<option value="totalsoft totalsoft-link">                 Type 3 </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Options</td>			
		</tr>
		<tr>
			<td>Overlay Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose a background color for the overlay."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_POvBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Slider Effect Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the time interval between the slideshow videos in seconds when autoplay is enabled. Otherwise videos will be changed when clicking on navigation buttons."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangesec" name="" id="TotalSoft_VG_HLG_PSShChDur" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_HLG_PSShChDur_Output" for="TotalSoft_VG_HLG_PSShChDur"></output>
			</td>
		</tr>
		<tr>
			<td>Close Icon Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose close icon color in the gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_PSlOpC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Close Icon Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Possibility choose a size for close icon which has intended to return to the gallery from the lightbox."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_HLG_PSlOpFS" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_HLG_PSlOpFS_Output" for="TotalSoft_VG_HLG_PSlOpFS"></output>
			</td>
		</tr>
		<tr>
			<td>Close Icon Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can choose icons from different beautifully designed sets to close the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_HLG_PDelIcT" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="totalsoft totalsoft-times">          Type 1 </option>
					<option value="totalsoft totalsoft-times-circle-o"> Type 2 </option>
					<option value="totalsoft totalsoft-times-circle">   Type 3 </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Slider Options</td>			
		</tr>
		<tr>
			<td>Icon Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Change the slider icon size regardless of the container. The plugin allows to get most suitable navigation arrows that are most appropriate for your site."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_HLG_PSlIcFS" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_HLG_PSlIcFS_Output" for="TotalSoft_VG_HLG_PSlIcFS"></output>
			</td>
			<td>Icon Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for slideshow in the popup slider."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_PSlIcC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Icon Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon background color for slideshow in the popup slider."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_PSlIcBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Icon Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the left and right icons for the slideshow in which the videos should be placed for slide."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_HLG_PSlIcT" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="1">  Type 1  </option>
					<option value="2">  Type 2  </option>
					<option value="3">  Type 3  </option>
					<option value="4">  Type 4  </option>
					<option value="5">  Type 5  </option>
					<option value="6">  Type 6  </option>
					<option value="7">  Type 7  </option>
					<option value="8">  Type 8  </option>
					<option value="9">  Type 9  </option>
					<option value="10"> Type 10 </option>
					<option value="11"> Type 11 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Show Autoplay (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="If this parameter is not specified autoplay for slideshow will be disabled."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_VG_HLG_PSlAutPl" name="">
		            <label for="TotalSoft_VG_HLG_PSlAutPl" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Loop (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="When the videos are finished to begins again with the same video or no."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_VG_HLG_PSlLoop" name="">
		            <label for="TotalSoft_VG_HLG_PSlLoop" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
		</tr>
		<tr>
			<td>Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the width of the border for the container in a popup window."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_HLG_PSlBW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_HLG_PSlBW_Output" for="TotalSoft_VG_HLG_PSlBW"></output>
			</td>
			<td>Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the style for the border of the popup slider."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_HLG_PSlBS" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine border color which is in the popup slider."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_PSlBC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Shadow (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow value by the pixel."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_HLG_PSlBSh" min="0" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_HLG_PSlBSh_Output" for="TotalSoft_VG_HLG_PSlBSh"></output>
			</td>
		</tr>
		<tr>
			<td>Shadow Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_PSlBShC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Pagination & Load More Options</td>			
		</tr>
		<tr>
			<td>Next Button Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can write the text that you want to see on this button. This next button to change the page. You choose how many videos to show in a page."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_P_NBT" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Prev Button Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write the text for the button that changes the page backward. But in one picture. You choose how many videos to show."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_P_PBT" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select your preferred color for pagination. The text and font will be on a same color."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_P_BgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the text and number buttons."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_P_C" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the number of paging ' pagination '. The same color for the text and number."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_HLG_P_FS" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_HLG_P_FS_Output" for="TotalSoft_VG_HLG_P_FS"></output>
			</td>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the pagination used from the video in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_HLG_P_FF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Current Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current background color of the pagination that all the pages are displayed in the main pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_P_CBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Current Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current color of the pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_P_CC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferred hover background color for the pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_P_HBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the text color for hover."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_P_HC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>			
			<td>Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the gallery select the border style for the pagination."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_HLG_P_BS" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the preferred color for the border."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_HLG_P_BC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_6">
		<tr class="Total_Soft_Titles">
			<td colspan="4">Video Image Options</td>			
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_FG_W" id="TotalSoft_VG_FG_W" min="100" max="400" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_W_Output" for="TotalSoft_VG_FG_W"></output>
			</td>
			<td>Height <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred height and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_FG_H" id="TotalSoft_VG_FG_H" min="100" max="400" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_H_Output" for="TotalSoft_VG_FG_H"></output>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the width of the border for the image container."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_FG_BW" id="TotalSoft_VG_FG_BW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_BW_Output" for="TotalSoft_VG_FG_BW"></output>
			</td>
			<td>Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine border color which is in the fancy gallery."></i></td>
			<td><input type="text" name="TotalSoft_VG_FG_BC" id="TotalSoft_VG_FG_BC" class="Total_Soft_VGallery_Color" value=""></td>
		</tr>
		<tr>
			<td>Box Shadow <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow value."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_FG_BSh" id="TotalSoft_VG_FG_BSh" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_BSh_Output" for="TotalSoft_VG_FG_BSh"></output>
			</td>
			<td>Shadow Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow."></i></td>
			<td><input type="text" name="TotalSoft_VG_FG_BShC" id="TotalSoft_VG_FG_BShC" class="Total_Soft_VGallery_Color" value=""></td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border radius for image."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangeper" name="TotalSoft_VG_FG_BR" id="TotalSoft_VG_FG_BR" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_BR_Output" for="TotalSoft_VG_FG_BR"></output>
			</td>
			<td>Place Between Videos <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the distance between each image. Here is the image from your Youtube and Vimeo videos."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_VG_FG_PBI" id="TotalSoft_VG_FG_PBI" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_PBI_Output" for="TotalSoft_VG_FG_PBI"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title Options</td>			
		</tr>
		<tr>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="This function is for the main title. You can select font size. For each screen or mobile version will be its own size for responsiveness."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_FG_TFS" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_TFS_Output" for="TotalSoft_VG_FG_TFS"></output>
			</td>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select the font family that you want to show."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_FG_TFF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the main title."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_TC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Bottom Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the border width for the bottom line."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_FG_TBBW" min="0" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_TBBW_Output" for="TotalSoft_VG_FG_TBBW"></output>
			</td>
		</tr>
		<tr>
			<td>Bottom Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the border style for the bottom line."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_FG_TBBS" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Bottom Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the border color for the bottom line."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_TBBC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Top Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the border width for the top line."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_FG_TTBW" min="0" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_TTBW_Output" for="TotalSoft_VG_FG_TTBW"></output>
			</td>
			<td>Top Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the border color for the top line."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_TTBC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Link Options</td>			
		</tr>
		<tr>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size for link."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_FG_LFS" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_LFS_Output" for="TotalSoft_VG_FG_LFS"></output>
			</td>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select font family that will make your gallery more beautiful."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_FG_LFF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the text for the link button."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_LC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Position (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions: left, center, right."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_FG_LP" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="left">   Left   </option>
					<option value="center"> Center </option>
					<option value="right">  Right  </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border width for link."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_FG_LBW" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_LBW_Output" for="TotalSoft_VG_FG_LBW"></output>
			</td>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border color which is in the image container."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_LBC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Border Radius (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Install the border radius for link."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_FG_LBR" min="0" max="25" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_LBR_Output" for="TotalSoft_VG_FG_LBR"></output>
			</td>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define a background color which is intended for the link button."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_LBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover color for link."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_LHC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Hover Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select hover border color for link button."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_LHBC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select hover background color for link button."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_LHBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in link button. When you have created a gallery in each box has URL. If you wrote something in your popup window now you can see it."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_LT" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Overlay Options</td>
		</tr>
		<tr>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose type of overlay."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_FG_LHOvT" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="Default"> Default </option>
					<option value="Inverse"> Inverse </option>
				</select>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose a color for the overlay."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_LHOvC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Options</td>
		</tr>
		<tr>
			<td>Overlay Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the preferred background color of the content popup."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_POvC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Video Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose background color for the title and video in a popup window."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_PVBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Video Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the video for popup and it is all responsive."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_FG_PVW" min="300" max="1000" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_PVW_Output" for="TotalSoft_VG_FG_PVW"></output>
			</td>
			<td>Video Height (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred height of the video for popup and it is all responsive."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_FG_PVH" min="200" max="800" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_PVH_Output" for="TotalSoft_VG_FG_PVH"></output>
			</td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Thumbnail Options</td>
		</tr>
		<tr>
			<td>Hover Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the hover color of the borders around the thumbnails."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_PTumbHBC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the border width for thumbnail photos."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_FG_PTumbHBW" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_PTumbHBW_Output" for="TotalSoft_VG_FG_PTumbHBW"></output>
			</td>
		</tr>
		<tr>
			<td>Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the thumbnails for popup and it is all responsive."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_FG_PTumbIW" min="50" max="150" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_PTumbIW_Output" for="TotalSoft_VG_FG_PTumbIW"></output>
			</td>
			<td>Height (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred height of the thumbnails for popup and it is all responsive."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_FG_PTumbIH" min="50" max="150" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_PTumbIH_Output" for="TotalSoft_VG_FG_PTumbIH"></output>
			</td>
		</tr>
		<tr>
			<td>Carusel Icon Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for carousel in the popup thumbnails."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_PVBC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Title Options</td>
		</tr>
		<tr>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="This function is for the popup window. You can select font size for headers. For each screen or mobile version will be its size for responsiveness."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_FG_PTFS" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_PTFS_Output" for="TotalSoft_VG_FG_PTFS"></output>
			</td>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the title used in a popup."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_FG_PTFF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It is necessary to choose the color for video titles which is in the popup window."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_PTC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Slider Icons Options</td>
		</tr>
		<tr>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the left and right icons for the slideshow in which the videos should be placed for slide."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_FG_SlIcT" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="1">  Type 1  </option>
					<option value="2">  Type 2  </option>
					<option value="3">  Type 3  </option>
					<option value="4">  Type 4  </option>
					<option value="5">  Type 5  </option>
					<option value="6">  Type 6  </option>
					<option value="7">  Type 7  </option>
					<option value="8">  Type 8  </option>
					<option value="9">  Type 9  </option>
					<option value="10"> Type 10 </option>
					<option value="11"> Type 11 </option>
				</select>
			</td>
			<td>Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Change the slider icon size regardless of the container. The plugin allows to get most suitable navigation arrows that are most appropriate for your site."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_FG_SlIcS" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_SlIcS_Output" for="TotalSoft_VG_FG_SlIcS"></output>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for slideshow in the popup."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_SlIcC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Close Icon Options</td>
		</tr>
		<tr>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety beautifully designed sets to close the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_FG_SlDelIcT" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="1"> Type 1 </option>
					<option value="2"> Type 2 </option>
					<option value="3"> Type 3 </option>
				</select>
			</td>
			<td>Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=" Select the size of the icon that is to close the popup window. The icon is in the right corner."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_FG_SlDelIcS" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_SlDelIcS_Output" for="TotalSoft_VG_FG_SlDelIcS"></output>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the icon to close the popup. When you close the window with it closes and the video."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_SlDelIcC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Slider General Options</td>
		</tr>
		<tr>
			<td>Video Autoplay (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="If this parameter is not specified autoplay for video will be disabled."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_VG_FG_ShVAut" name="">
		            <label for="TotalSoft_VG_FG_ShVAut" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Show Navigation (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the navigation or no in popup."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_VG_FG_ShN" name="">
		            <label for="TotalSoft_VG_FG_ShN" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
		</tr>
		<tr>
			<td>Show Video Title (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="If this parameter is not specified title for popup will be disabled."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_VG_FG_ShPT" name="">
		            <label for="TotalSoft_VG_FG_ShPT" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Show Play Icon (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="If this parameter is not specified play icon for popup will be disabled."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_VG_FG_ShSlPlIc" name="">
		            <label for="TotalSoft_VG_FG_ShSlPlIc" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Pagination & Load More Options</td>			
		</tr>
		<tr>
			<td>Next Button Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can write the text that you want to see on this button. This next button to change the page. You choose how many videos to show in a page."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_P_NBT" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Prev Button Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write the text for the button that changes the page backward. But in one picture. You choose how many videos to show."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_P_PBT" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select your preferred color for pagination. The text and font will be on a same color."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_P_BgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the text and number buttons."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_P_C" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the number of paging ' pagination '. The same color for the text and number."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_VG_FG_P_FS" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_VG_FG_P_FS_Output" for="TotalSoft_VG_FG_P_FS"></output>
			</td>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the pagination used from the video in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_FG_P_FF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Current Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current background color of the pagination that all the pages are displayed in the main pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_P_CBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Current Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current color of the pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_P_CC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferred hover background color for the pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_P_HBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the text color for hover."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_P_HC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>			
			<td>Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the gallery select the border style for the pagination."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_VG_FG_P_BS" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the preferred color for the border."></i></td>
			<td><input type="text" name="" id="TotalSoft_VG_FG_P_BC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_7">
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Video Image Options</td>
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the image and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_JGV_W" id="TotalSoft_JGV_W" min="100" max="500" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_JGV_W_Output" for="TotalSoft_JGV_W"></output>
			</td>
			<td>Height <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred height of the image and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_JGV_H" id="TotalSoft_JGV_H" min="100" max="500" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_JGV_H_Output" for="TotalSoft_JGV_H"></output>
			</td>
		</tr>
		<tr>
			<td>Box Shadow <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow value by the pixels."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_JGV_BSh" id="TotalSoft_JGV_BSh" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_JGV_BSh_Output" for="TotalSoft_JGV_BSh"></output>
			</td>
			<td>Shadow Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow of the photos."></i></td>
			<td><input type="text" name="TotalSoft_JGV_BShC" id="TotalSoft_JGV_BShC" class="Total_Soft_VGallery_Color" value=""></td>
		</tr>
		<tr>
			<td>Shadow Type<i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose from these two shadow types."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_JGV_BShT" name="TotalSoft_JGV_BShT">
					<option value="1"> Type 1 </option>
					<option value="2"> Type 2 </option>
				</select>
			</td>
			<td>Effect Type<i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select type of hover effect."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_JGV_ET" name="TotalSoft_JGV_ET">
					<option value="TotalSoft_H_Ef1"> Rotate    </option>
					<option value="TotalSoft_H_Ef2"> Translate </option>
					<option value="TotalSoft_H_Ef3"> None      </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Place Between Video Images <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the distance between each image. Here is the image from your Youtube and Vimeo videos."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_JGV_PBI" id="TotalSoft_JGV_PBI" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_JGV_PBI_Output" for="TotalSoft_JGV_PBI"></output>
			</td>
			<td>Border Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the radius for the border."></i></td>
			<td>
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="TotalSoft_JGV_BR" id="TotalSoft_JGV_BR" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_JGV_BR_Output" for="TotalSoft_JGV_BR"></output>
			</td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Title Options</td>
		</tr>
		<tr>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select font size for title. For each screen or mobile version will be its own size for responsiveness."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_JGV_T_FS" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_JGV_T_FS_Output" for="TotalSoft_JGV_T_FS"></output>
			</td>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_JGV_T_FF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It is necessary to choose the color for photo titles."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_T_C" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Text Shadow (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the shadow color for the photo title."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_JGV_T_TSh" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_JGV_T_TSh_Output" for="TotalSoft_JGV_T_TSh"></output>
			</td>
		</tr>
		<tr>
			<td>Shadow Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow of the titles."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_T_TShC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Effect Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select the type of scaling of different and beautifully designed sets."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_JGV_T_ET" name="" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="TotalSoft_Title_Ef1"> Translate </option>
					<option value="TotalSoft_Title_Ef2"> Scale     </option>
					<option value="TotalSoft_Title_Ef3"> None      </option>
					<option value="TotalSoft_Title_Ef4"> Rotate    </option>
				</select>
			</td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Icon Options</td>
		</tr>
		<tr>
			<td>Show Icon (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the icon or no."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_JGV_PI_Sh" name="">
		            <label for="TotalSoft_JGV_PI_Sh" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icons for popup."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_JGV_PI_T" name="" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="totalsoft totalsoft-play-circle">  Type1 </option>
					<option value="totalsoft totalsoft-play">         Type2 </option>
					<option value="totalsoft totalsoft-youtube-play"> Type3 </option>
					<option value="totalsoft totalsoft-file-video-o"> Type1 </option>
					<option value="totalsoft totalsoft-video-camera"> Type2 </option>
					<option value="totalsoft totalsoft-search">       Type3 </option>
					<option value="totalsoft totalsoft-eye">          Type3 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Alter the size of the icon."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_JGV_PI_S" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_JGV_PI_S_Output" for="TotalSoft_JGV_PI_S"></output>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for icon in the gallery popup container."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_PI_C" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Hover Line Options</td>
		</tr>
		<tr>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="There are 13 different line effect types."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_JGV_L_T" name="" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="TotalSoft_HovLine1">  Type1  </option>
					<option value="TotalSoft_HovLine2">  Type2  </option>
					<option value="TotalSoft_HovLine3">  Type3  </option>
					<option value="TotalSoft_HovLine4">  Type4  </option>
					<option value="TotalSoft_HovLine5">  Type5  </option>
					<option value="TotalSoft_HovLine6">  Type6  </option>
					<option value="TotalSoft_HovLine7">  Type7  </option>
					<option value="TotalSoft_HovLine8">  Type8  </option>
					<option value="TotalSoft_HovLine9">  Type9  </option>
					<option value="TotalSoft_HovLine10"> Type10 </option>
					<option value="TotalSoft_HovLine11"> Type11 </option>
					<option value="TotalSoft_HovLine12"> Type12 </option>
					<option value="TotalSoft_HovLine13"> Type13 </option>
				</select>
			</td>
			<td>Show Line (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the separation line or no."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_JGV_L_Sh" name="">
		            <label for="TotalSoft_JGV_L_Sh" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
		</tr>
		<tr>
			<td>Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the line width for separation."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_JGV_L_W" min="0" max="15" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_JGV_L_W_Output" for="TotalSoft_JGV_L_W"></output>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_L_C" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Box Shadow (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow value by the pixels."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_JGV_L_BSh" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_JGV_L_BSh_Output" for="TotalSoft_JGV_L_BSh"></output>
			</td>
			<td>Shadow Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow for seperation line."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_L_BShC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Hover Overlay Options</td>
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the overlay on the video as you keep the mouse arrow on it. The effects are very beautiful and they are very suitable in the gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_Ov_BgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the hover effect type. There are 5 effects type in lightbox. They are all different from each other."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_JGV_Ov_T" name="" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="TotalSoft_Hov_Overlay1"> Type1 </option>
					<option value="TotalSoft_Hov_Overlay2"> Type2 </option>
					<option value="TotalSoft_Hov_Overlay3"> Type3 </option>
					<option value="TotalSoft_Hov_Overlay4"> Type4 </option>
					<option value="TotalSoft_Hov_Overlay5"> Type5 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Show Overlay (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the overlay or no."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_JGV_Ov_Sh" name="">
		            <label for="TotalSoft_JGV_Ov_Sh" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td colspan="2"></td>	
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Options</td>
		</tr>
		<tr>
			<td>Overlay Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a background color for overlay."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_Pop_OvBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Effect Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the hover effect type. There are 2 effects type in lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_JGV_Pop_T" name="" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="1"> Type1 </option>
					<option value="2"> Type2 </option>
				</select>
			</td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Slider Options</td>
		</tr>
		<tr>
			<td>Popup 2 Slider Effect Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the slide effect type. There are 2 effects type in lightbox. They are all different from each other."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_JGV_P1S_ET" name="" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="elastic"> Elastic </option>
					<option value="fade">    Fade    </option>
				</select>
			</td>
			<td>Popup 2 Slider Video Title Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the background color for title in the popup slider."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_P2S_ITBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the width of the border for the container in a popup window."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_JGV_PS_IBW" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_JGV_PS_IBW_Output" for="TotalSoft_JGV_PS_IBW"></output>
			</td>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine border color which is in the popup slider."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_PS_IBC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Box Shadow (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow value by the pixels."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_JGV_PS_IBSh" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_JGV_PS_IBSh_Output" for="TotalSoft_JGV_PS_IBSh"></output>
			</td>
			<td>Shadow Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_PS_BShC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Video Title Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select font size for title. For each screen or mobile version will be its own size for responsiveness."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_JGV_PS_ITFS" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_JGV_PS_ITFS_Output" for="TotalSoft_JGV_PS_ITFS"></output>
			</td>
			<td>Video Title Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_JGV_PS_ITFF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Video Title Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It is necessary to choose the color for titles."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_PS_ITC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Options Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the background color for the popup slider."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_PS_OpBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr class='Total_Soft_Titles'>
			<td colspan="4">Popup Slider Icons Options</td>
		</tr>
		<tr>
			<td>Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Change the slider icon size regardless of the container. The plugin allows to get most suitable navigation arrows that are most appropriate for your site."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_JGV_PS_IcS" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_JGV_PS_IcS_Output" for="TotalSoft_JGV_PS_IcS"></output>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for slideshow in the popup slider."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_PS_IcC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the left and right icons for the slideshow. In which the videos should be placed for slide."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_JGV_PS_IcT" name="" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="1">  Type 1  </option>
					<option value="2">  Type 2  </option>
					<option value="3">  Type 3  </option>
					<option value="4">  Type 4  </option>
					<option value="5">  Type 5  </option>
					<option value="6">  Type 6  </option>
					<option value="7">  Type 7  </option>
					<option value="8">  Type 8  </option>
					<option value="9">  Type 9  </option>
					<option value="10"> Type 10 </option>
					<option value="11"> Type 11 </option>
				</select>
			</td>
			<td>Close Icon Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can choose icons from different beautifully designed sets to close the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_JGV_PS_DIcT" name="" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="totalsoft totalsoft-times">          Type 1 </option>
					<option value="totalsoft totalsoft-times-circle">   Type 2 </option>
					<option value="totalsoft totalsoft-times-circle-o"> Type 3 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Loading Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can choose icons for loading."></i></td>
			<td>
				<select class="Total_Soft_Select" id="TotalSoft_JGV_PS_LT" name="" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="1"> Type 1 </option>
					<option value="2"> Type 2 </option>
					<option value="3"> Type 3 </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Pagination & Load More Options</td>			
		</tr>
		<tr>
			<td>Next Button Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can write the text that you want to see on this button. This next button to change the page. You choose how many videos to show in a page."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_P_NBT" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Prev Button Text (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write the text for the button that changes the page backward. But in one picture. You choose how many videos to show."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_P_PBT" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=" You can select your preferred color for pagination. The text and font will be on a same color."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_P_BgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the text and number buttons."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_P_C" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the number of paging ' pagination '. The same color for the text and number."></i></td>
			<td onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_VG_Range TotalSoft_VG_Rangepx" name="" id="TotalSoft_JGV_P_FS" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_JGV_P_FS_Output" for="TotalSoft_JGV_P_FS"></output>
			</td>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the pagination used from the video in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_JGV_P_FF" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Current Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current background color of the pagination that all the pages are displayed in the main pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_P_CBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Current Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current color of the pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_P_CC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferred hover background color for the pagination."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_P_HBgC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the text color for hover."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_P_HC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
		<tr>			
			<td>Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the gallery select the border style for the pagination."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_JGV_P_BS" onchange="Total_Soft_Gallery_Video_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the preferred color for the border."></i></td>
			<td><input type="text" name="" id="TotalSoft_JGV_P_BC" class="Total_Soft_VGallery_Color" value="" onclick="Total_Soft_Gallery_Video_Opt_AMD2_But1()"></td>
		</tr>
	</table>
</form>