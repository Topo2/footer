<?php
	global $wpdb;

	$table_name2 = $wpdb->prefix . "totalsoft_galleryv_manager";
	$table_name3 = $wpdb->prefix . "totalsoft_galleryv_videos";
	$table_name4 = $wpdb->prefix . "totalsoft_galleryv_dbt";
	$table_name5 = $wpdb->prefix . "totalsoft_galleryv_gvg";
	$table_name6 = $wpdb->prefix . "totalsoft_galleryv_lvg";
	$table_name7 = $wpdb->prefix . "totalsoft_galleryv_ttvg";
	$table_name8 = $wpdb->prefix . "totalsoft_galleryv_ctpg";
	$table_name9 = $wpdb->prefix . "totalsoft_galleryv_hlg";
	$table_name10 = $wpdb->prefix . "totalsoft_galleryv_fg";
	$table_name11 = $wpdb->prefix . "totalsoft_galleryv_sg";

	$Total_Soft_GVideo_Desc=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id>%d", 0));

	for($i=0; $i<count($Total_Soft_GVideo_Desc); $i++)
	{
		if(strlen($Total_Soft_GVideo_Desc[$i]->TotalSoftGallery_Video_VDesc)>0 && strpos($Total_Soft_GVideo_Desc[$i]->TotalSoftGallery_Video_VDesc, "&lt;/p&gt;")<=0)
		{
			$GVideo_Params = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id = %d", $Total_Soft_GVideo_Desc[$i]->GalleryV_ID));
			$GalleryV_Params = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE TotalSoftGalleryV_SetName = %s", $GVideo_Params[0]->TotalSoftGallery_Video_Option));


			if($GalleryV_Params[0]->TotalSoftGalleryV_SetType=='Grid Video Gallery')
			{
				$TotalSoftGallery_Video_Opt=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE TotalSoftGalleryV_SetID = %s", $GalleryV_Params[0]->id));
				$New_VG_Desc = str_replace("\&","&", esc_html('<p><span style="color: ' . $TotalSoftGallery_Video_Opt[0]->TotalSoft_VG_GVG_DC . '; font-size: ' . $TotalSoftGallery_Video_Opt[0]->TotalSoft_VG_GVG_DFS . 'px; font-family: ' . $TotalSoftGallery_Video_Opt[0]->TotalSoft_VG_GVG_DFF . '; text-align: ' . $TotalSoftGallery_Video_Opt[0]->TotalSoft_VG_GVG_DTA . ';">' . $Total_Soft_GVideo_Desc[$i]->TotalSoftGallery_Video_VDesc . '</span></p>'));
			}
			else if($GalleryV_Params[0]->TotalSoftGalleryV_SetType=='LightBox Video Gallery' || $GalleryV_Params[0]->TotalSoftGalleryV_SetType=='Thumbnails Video' || $GalleryV_Params[0]->TotalSoftGalleryV_SetType=='Elastic Gallery' || $GalleryV_Params[0]->TotalSoftGalleryV_SetType=='Parallax Engine')
			{
				$New_VG_Desc = str_replace("\&","&", esc_html('<p>' . $Total_Soft_GVideo_Desc[$i]->TotalSoftGallery_Video_VDesc . '</p>'));
			}
			else if($GalleryV_Params[0]->TotalSoftGalleryV_SetType=='Content Popup')
			{
				$TotalSoftGallery_Video_Opt=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE TotalSoftGalleryV_SetID = %s", $GalleryV_Params[0]->id));
				$New_VG_Desc = str_replace("\&","&", esc_html('<p><span style="color: ' . $TotalSoftGallery_Video_Opt[0]->TotalSoft_VG_CP_DC . '; font-size: ' . $TotalSoftGallery_Video_Opt[0]->TotalSoft_VG_CP_DFS . 'px; font-family: ' . $TotalSoftGallery_Video_Opt[0]->TotalSoft_VG_CP_DFF . ';">' . $Total_Soft_GVideo_Desc[$i]->TotalSoftGallery_Video_VDesc . '</span></p>'));
			}
			else if($GalleryV_Params[0]->TotalSoftGalleryV_SetType=='Fancy Gallery')
			{
				$TotalSoftGallery_Video_Opt=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name10 WHERE TotalSoftGalleryV_SetID = %s", $GalleryV_Params[0]->id));
				$New_VG_Desc = str_replace("\&","&", esc_html('<p><span style="color: ' . $TotalSoftGallery_Video_Opt[0]->TotalSoft_VG_FG_PDC . '; font-size: ' . $TotalSoftGallery_Video_Opt[0]->TotalSoft_VG_FG_PDFS . 'px; font-family: ' . $TotalSoftGallery_Video_Opt[0]->TotalSoft_VG_FG_PDFF . '; text-align: ' . $TotalSoftGallery_Video_Opt[0]->TotalSoft_VG_FG_PDTA . ';">' . $Total_Soft_GVideo_Desc[$i]->TotalSoftGallery_Video_VDesc . '</span></p>'));
			}

			$wpdb->query($wpdb->prepare("UPDATE $table_name3 set TotalSoftGallery_Video_VDesc=%s WHERE id=%d", $New_VG_Desc, $Total_Soft_GVideo_Desc[$i]->id));
		}
	}
?>