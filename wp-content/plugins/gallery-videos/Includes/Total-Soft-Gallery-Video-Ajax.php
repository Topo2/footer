<?php
	// Admin Menu
	add_action( 'wp_ajax_TotalSoftGallery_Video_Del', 'TotalSoftGallery_Video_Del_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftGallery_Video_Del', 'TotalSoftGallery_Video_Del_Callback' );

	function TotalSoftGallery_Video_Del_Callback()
	{
		$GalleryV_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name2 = $wpdb->prefix . "totalsoft_galleryv_manager";
		$table_name3 = $wpdb->prefix . "totalsoft_galleryv_videos";

		$wpdb->query($wpdb->prepare("DELETE FROM $table_name2 WHERE id=%d", $GalleryV_ID));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name3 WHERE GalleryV_ID=%s", $GalleryV_ID));
		die();
	}

	add_action( 'wp_ajax_TotalSoftGallery_Video_Clone', 'TotalSoftGallery_Video_Clone_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftGallery_Video_Clone', 'TotalSoftGallery_Video_Clone_Callback' );

	function TotalSoftGallery_Video_Clone_Callback()
	{
		$GalleryV_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name1 = $wpdb->prefix . "totalsoft_galleryv_id";
		$table_name2 = $wpdb->prefix . "totalsoft_galleryv_manager";
		$table_name3 = $wpdb->prefix . "totalsoft_galleryv_videos";
		
		$Total_Soft_GalleryVManager = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id=%d", $GalleryV_ID));
		$Total_Soft_GalleryVVideos = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE GalleryV_ID=%s order by id", $GalleryV_ID));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, TotalSoftGallery_Video_Gallery_Title, TotalSoftGallery_Video_Option, TotalSoftGallery_Video_ShowType, TotalSoftGallery_Video_PerPage, TotalSoftGallery_LoadMore) VALUES (%d, %s, %s, %s, %s, %s)", '', $Total_Soft_GalleryVManager[0]->TotalSoftGallery_Video_Gallery_Title, $Total_Soft_GalleryVManager[0]->TotalSoftGallery_Video_Option, $Total_Soft_GalleryVManager[0]->TotalSoftGallery_Video_ShowType, $Total_Soft_GalleryVManager[0]->TotalSoftGallery_Video_PerPage, $Total_Soft_GalleryVManager[0]->TotalSoftGallery_LoadMore));

		$New_GalleryV_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE id>%d order by id desc limit 1",0));
		$New_Total_SoftGVID=$New_GalleryV_ID[0]->GalleryV_ID + 1;
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, GalleryV_ID) VALUES (%d, %s)", '', $New_Total_SoftGVID));

		for($j = 0; $j < count($Total_Soft_GalleryVVideos); $j++)
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, TotalSoftGallery_Video_VT, TotalSoftGallery_Video_VDesc, TotalSoftGallery_Video_VLink, TotalSoftGallery_Video_VONT, TotalSoftGallery_Video_VURL, TotalSoftGallery_Video_IURL, TotalSoftGallery_Video_Video, GalleryV_ID) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Total_Soft_GalleryVVideos[$j]->TotalSoftGallery_Video_VT, $Total_Soft_GalleryVVideos[$j]->TotalSoftGallery_Video_VDesc, $Total_Soft_GalleryVVideos[$j]->TotalSoftGallery_Video_VLink, $Total_Soft_GalleryVVideos[$j]->TotalSoftGallery_Video_VONT, $Total_Soft_GalleryVVideos[$j]->TotalSoftGallery_Video_VURL, $Total_Soft_GalleryVVideos[$j]->TotalSoftGallery_Video_IURL, $Total_Soft_GalleryVVideos[$j]->TotalSoftGallery_Video_Video, $New_Total_SoftGVID));
		}

		die();
	}

	add_action( 'wp_ajax_TotalSoftGallery_Video_Edit', 'TotalSoftGallery_Video_Edit_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftGallery_Video_Edit', 'TotalSoftGallery_Video_Edit_Callback' );

	function TotalSoftGallery_Video_Edit_Callback()
	{
		$GalleryV_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;

		$table_name2 = $wpdb->prefix . "totalsoft_galleryv_manager";

		$Total_Soft_GalleryVManager=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id=%d", $GalleryV_ID));

		print_r($Total_Soft_GalleryVManager);
		die();
	}

	add_action( 'wp_ajax_TotalSoftGallery_Video_Edit_Videos', 'TotalSoftGallery_Video_Edit_Videos_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftGallery_Video_Edit_Videos', 'TotalSoftGallery_Video_Edit_Videos_Callback' );

	function TotalSoftGallery_Video_Edit_Videos_Callback()
	{
		$GalleryV_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;

		$table_name3 = $wpdb->prefix . "totalsoft_galleryv_videos";

		$Total_Soft_GalleryVVideos=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE GalleryV_ID=%s order by id", $GalleryV_ID));

		for($i = 0; $i < count($Total_Soft_GalleryVVideos); $i++)
		{
			$Total_Soft_GalleryVVideos[$i]->TotalSoftGallery_Video_VDesc = html_entity_decode($Total_Soft_GalleryVVideos[$i]->TotalSoftGallery_Video_VDesc);
		}	

		print_r($Total_Soft_GalleryVVideos);
		die();
	}

	add_action( 'wp_ajax_TSoft_Vimeo_Video_Image', 'TSoft_Vimeo_Video_Image_Callback' );
	add_action( 'wp_ajax_nopriv_TSoft_Vimeo_Video_Image', 'TSoft_Vimeo_Video_Image_Callback' );

	function TSoft_Vimeo_Video_Image_Callback()
	{
		$GET_Video_Video_Src = sanitize_text_field($_POST['foobar']);

		$TSoft_GV_Image_Src=explode('video/',$GET_Video_Video_Src);
		$TSoft_GV_Image_Src_Real=unserialize(file_get_contents("http://vimeo.com/api/v2/video/$TSoft_GV_Image_Src[1].php"));
		$TSoft_GV_Image_Src_Real=$TSoft_GV_Image_Src_Real[0]['thumbnail_large'];

		echo $TSoft_GV_Image_Src_Real;

		die();
	}

	add_action( 'wp_ajax_TSoft_Wistia_Video_Image', 'TSoft_Wistia_Video_Image_Callback' );
	add_action( 'wp_ajax_nopriv_TSoft_Wistia_Video_Image', 'TSoft_Wistia_Video_Image_Callback' );

	function TSoft_Wistia_Video_Image_Callback()
	{
		$GET_Video_Video_Src = sanitize_text_field($_POST['foobar']);

		$wistia_api_uri = 'http://fast.wistia.com/oembed?url=' . $GET_Video_Video_Src;
		$wistia_response = wp_remote_get( $wistia_api_uri );
		
		$wistia_response = json_decode( $wistia_response['body'], true );
		echo $wistia_response['thumbnail_url'];
		die();
	}	
	// Theme Menu
	add_action( 'wp_ajax_TotalSoftGallery_VideoOpt_Edit', 'TotalSoftGallery_VideoOpt_Edit_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftGallery_VideoOpt_Edit', 'TotalSoftGallery_VideoOpt_Edit_Callback' );

	function TotalSoftGallery_VideoOpt_Edit_Callback()
	{
		$GalleryV_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name4 = $wpdb->prefix . "totalsoft_galleryv_dbt";
		$table_name5 = $wpdb->prefix . "totalsoft_galleryv_gvg";
		$table_name6 = $wpdb->prefix . "totalsoft_galleryv_lvg";
		$table_name7 = $wpdb->prefix . "totalsoft_galleryv_ttvg";
		$table_name8 = $wpdb->prefix . "totalsoft_galleryv_ctpg";
		$table_name9 = $wpdb->prefix . "totalsoft_galleryv_hlg";
		$table_name10 = $wpdb->prefix . "totalsoft_galleryv_fg";
		$table_name11 = $wpdb->prefix . "totalsoft_galleryv_sg";
		
		$Total_Soft_GalleryVName=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id=%d", $GalleryV_ID));
		if($Total_Soft_GalleryVName[0]->TotalSoftGalleryV_SetType=='Grid Video Gallery')
		{
			$Total_Soft_GalleryVSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE TotalSoftGalleryV_SetID=%s", $GalleryV_ID));
		}
		else if($Total_Soft_GalleryVName[0]->TotalSoftGalleryV_SetType=='LightBox Video Gallery')
		{
			$Total_Soft_GalleryVSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE TotalSoftGalleryV_SetID=%s", $GalleryV_ID));
		}
		else if($Total_Soft_GalleryVName[0]->TotalSoftGalleryV_SetType=='Thumbnails Video')
		{
			$Total_Soft_GalleryVSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE TotalSoftGalleryV_SetID=%s", $GalleryV_ID));
		}
		else if($Total_Soft_GalleryVName[0]->TotalSoftGalleryV_SetType=='Content Popup')
		{
			$Total_Soft_GalleryVSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE TotalSoftGalleryV_SetID=%s", $GalleryV_ID));
		}
		else if($Total_Soft_GalleryVName[0]->TotalSoftGalleryV_SetType=='Elastic Gallery')
		{
			$Total_Soft_GalleryVSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE TotalSoftGalleryV_SetID=%s", $GalleryV_ID));
		}
		else if($Total_Soft_GalleryVName[0]->TotalSoftGalleryV_SetType=='Fancy Gallery')
		{
			$Total_Soft_GalleryVSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name10 WHERE TotalSoftGalleryV_SetID=%s", $GalleryV_ID));
		}
		else if($Total_Soft_GalleryVName[0]->TotalSoftGalleryV_SetType=='Parallax Engine')
		{
			$Total_Soft_GalleryVSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name11 WHERE TotalSoftGalleryV_SetID=%s", $GalleryV_ID));
		}
		print_r($Total_Soft_GalleryVSet);
		die();
	}

	add_action( 'wp_ajax_TotalSoftGalleryV_Clone_Option', 'TotalSoftGalleryV_Clone_Option_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftGalleryV_Clone_Option', 'TotalSoftGalleryV_Clone_Option_Callback' );

	function TotalSoftGalleryV_Clone_Option_Callback()
	{
		$GalleryV_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name4 = $wpdb->prefix . "totalsoft_galleryv_dbt";
		$table_name5 = $wpdb->prefix . "totalsoft_galleryv_gvg";
		$table_name6 = $wpdb->prefix . "totalsoft_galleryv_lvg";
		$table_name7 = $wpdb->prefix . "totalsoft_galleryv_ttvg";
		$table_name8 = $wpdb->prefix . "totalsoft_galleryv_ctpg";
		$table_name9 = $wpdb->prefix . "totalsoft_galleryv_hlg";
		$table_name10 = $wpdb->prefix . "totalsoft_galleryv_fg";
		$table_name11 = $wpdb->prefix . "totalsoft_galleryv_sg";
		
		$Total_Soft_GalleryVName=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id=%d", $GalleryV_ID));
		
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, TotalSoftGalleryV_SetName, TotalSoftGalleryV_SetType) VALUES (%d, %s, %s)", '', $Total_Soft_GalleryVName[0]->TotalSoftGalleryV_SetName, $Total_Soft_GalleryVName[0]->TotalSoftGalleryV_SetType));

		$TotalSoftGalleryV_SetNameID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id>%d order by id desc limit 1", 0));
		if($Total_Soft_GalleryVName[0]->TotalSoftGalleryV_SetType=='Grid Video Gallery')
		{
			$Total_Soft_GalleryVSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE TotalSoftGalleryV_SetID=%s", $GalleryV_ID));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, TotalSoftGalleryV_SetID, TotalSoftGalleryV_SetName, TotalSoftGalleryV_SetType, TotalSoft_VG_GVG_TShow, TotalSoft_VG_GVG_DShow, TotalSoft_VG_GVG_CC, TotalSoft_VG_GVG_PB, TotalSoft_VG_GVG_VR, TotalSoft_VG_GVG_HE, TotalSoft_VG_GVG_HO, TotalSoft_VG_GVG_DSC, TotalSoft_VG_GVG_TDA_BgC, TotalSoft_VG_GVG_TDA_MT, TotalSoft_VG_GVG_TFS, TotalSoft_VG_GVG_TFF, TotalSoft_VG_GVG_TC, TotalSoft_VG_GVG_TTA, TotalSoft_VG_GVG_DFS, TotalSoft_VG_GVG_DFF, TotalSoft_VG_GVG_DC, TotalSoft_VG_GVG_DTA, TotalSoft_VG_GVG_LAT_W, TotalSoft_VG_GVG_LAT_S, TotalSoft_VG_GVG_LAT_C, TotalSoft_VG_GVG_Pop_BgC, TotalSoft_VG_GVG_Pop_BW, TotalSoft_VG_GVG_Pop_BS, TotalSoft_VG_GVG_Pop_BC, TotalSoft_VG_GVG_Pop_BR, TotalSoft_VG_GVG_Pop_Pad, TotalSoft_VG_GVG_Pop_TFS, TotalSoft_VG_GVG_Pop_TFF, TotalSoft_VG_GVG_Pop_TC, TotalSoft_VG_GVG_Pop_TTA, TotalSoft_VG_GVG_Pop_DFS, TotalSoft_VG_GVG_Pop_DFF, TotalSoft_VG_GVG_Pop_DC, TotalSoft_VG_GVG_Pop_DTA, TotalSoft_VG_GVG_Pop_LAT_W, TotalSoft_VG_GVG_Pop_LAT_S, TotalSoft_VG_GVG_Pop_LAT_C, TotalSoft_VG_GVG_Pop_AType, TotalSoft_VG_GVG_Pop_ALeft, TotalSoft_VG_GVG_Pop_ARight, TotalSoft_VG_GVG_Pop_AC, TotalSoft_VG_GVG_Pop_AFS, TotalSoft_VG_GVG_Pop_CType, TotalSoft_VG_GVG_Pop_CIcon, TotalSoft_VG_GVG_Pop_CC, TotalSoft_VG_GVG_Pop_CFS, TotalSoft_VG_GVG_Pop_LBW, TotalSoft_VG_GVG_Pop_LBS, TotalSoft_VG_GVG_Pop_LBC, TotalSoft_VG_GVG_Pop_LBR, TotalSoft_VG_GVG_Pop_LText, TotalSoft_VG_GVG_Pop_LBgC, TotalSoft_VG_GVG_Pop_LC, TotalSoft_VG_GVG_Pop_LFS, TotalSoft_VG_GVG_Pop_LFF, TotalSoft_VG_GVG_Pop_LHBgC, TotalSoft_VG_GVG_Pop_LHC, TotalSoft_VG_GVG_P_NBT, TotalSoft_VG_GVG_P_PBT, TotalSoft_VG_GVG_P_BgC, TotalSoft_VG_GVG_P_C, TotalSoft_VG_GVG_P_FS, TotalSoft_VG_GVG_P_FF, TotalSoft_VG_GVG_P_H, TotalSoft_VG_GVG_P_CBgC, TotalSoft_VG_GVG_P_CC, TotalSoft_VG_GVG_P_HBgC, TotalSoft_VG_GVG_P_HC, TotalSoft_VG_GVG_Pop_TShow, TotalSoft_VG_GVG_Pop_DShow, TotalSoft_VG_GVG_P_BS, TotalSoft_VG_GVG_P_BC) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftGalleryV_SetNameID[0]->id, $Total_Soft_GalleryVSet[0]->TotalSoftGalleryV_SetName, $Total_Soft_GalleryVSet[0]->TotalSoftGalleryV_SetType, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_TShow, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_DShow, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_CC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_PB, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_VR, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_HE, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_HO, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_DSC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_TDA_BgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_TDA_MT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_TFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_TFF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_TC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_TTA, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_DFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_DFF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_DC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_DTA, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_LAT_W, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_LAT_S, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_LAT_C, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_BgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_BW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_BS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_BC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_BR, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_Pad, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_TFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_TFF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_TC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_TTA, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_DFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_DFF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_DC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_DTA, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_LAT_W, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_LAT_S, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_LAT_C, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_AType, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_ALeft, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_ARight, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_AC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_AFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_CType, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_CIcon, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_CC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_CFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_LBW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_LBS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_LBC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_LBR, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_LText, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_LBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_LC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_LFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_LFF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_LHBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_LHC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_P_NBT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_P_PBT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_P_BgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_P_C, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_P_FS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_P_FF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_P_H, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_P_CBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_P_CC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_P_HBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_P_HC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_TShow, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_Pop_DShow, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_P_BS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_GVG_P_BC));
		}
		else if($Total_Soft_GalleryVName[0]->TotalSoftGalleryV_SetType=='LightBox Video Gallery')
		{
			$Total_Soft_GalleryVSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE TotalSoftGalleryV_SetID=%s", $GalleryV_ID));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name6 (id, TotalSoftGalleryV_SetID, TotalSoftGalleryV_SetName, TotalSoftGalleryV_SetType, TotalSoft_VG_LVG_CC, TotalSoft_VG_LVG_PB, TotalSoft_VG_LVG_Pad, TotalSoft_VG_LVG_BgC, TotalSoft_VG_LVG_VBW, TotalSoft_VG_LVG_VBS, TotalSoft_VG_LVG_VBC, TotalSoft_VG_LVG_VBR, TotalSoft_VG_LVG_Pop_BgC, TotalSoft_VG_LVG_Pop_BW, TotalSoft_VG_LVG_Pop_BS, TotalSoft_VG_LVG_Pop_BC, TotalSoft_VG_LVG_Pop_BR, TotalSoft_VG_LVG_Pop_TShow, TotalSoft_VG_LVG_Pop_TTA, TotalSoft_VG_LVG_Pop_TFS, TotalSoft_VG_LVG_Pop_TFF, TotalSoft_VG_LVG_Pop_TC, TotalSoft_VG_LVG_Pop_PType, TotalSoft_VG_LVG_Pop_PIcon, TotalSoft_VG_LVG_Pop_Pause, TotalSoft_VG_LVG_Pop_PIS, TotalSoft_VG_LVG_Pop_PIC, TotalSoft_VG_LVG_Pop_CType, TotalSoft_VG_LVG_Pop_CIcon, TotalSoft_VG_LVG_Pop_CIS, TotalSoft_VG_LVG_Pop_CIC, TotalSoft_VG_LVG_Pop_CIT, TotalSoft_VG_LVG_Pop_CTF, TotalSoft_VG_LVG_Pop_AType, TotalSoft_VG_LVG_Pop_ALeft, TotalSoft_VG_LVG_Pop_ARight, TotalSoft_VG_LVG_Pop_ArrS, TotalSoft_VG_LVG_Pop_ArrC, TotalSoft_VG_LVG_Pop_NFS, TotalSoft_VG_LVG_Pop_NC, TotalSoft_VG_LVG_P_NBT, TotalSoft_VG_LVG_P_PBT, TotalSoft_VG_LVG_P_BgC, TotalSoft_VG_LVG_P_C, TotalSoft_VG_LVG_P_FS, TotalSoft_VG_LVG_P_FF, TotalSoft_VG_LVG_P_H, TotalSoft_VG_LVG_P_CBgC, TotalSoft_VG_LVG_P_CC, TotalSoft_VG_LVG_P_HBgC, TotalSoft_VG_LVG_P_HC, TotalSoft_VG_LVG_P_BS, TotalSoft_VG_LVG_P_BC, TotalSoft_VG_LVG_Img_Zoom_Type, TotalSoft_VG_LVG_Img_Zoom_Effect_Time, TotalSoft_VG_LVG_Hov_Ov_Bg_Color, TotalSoft_VG_LVG_Hov_Ov_Transparency, TotalSoft_VG_LVG_Hov_Ov_Effect_Type, TotalSoft_VG_LVG_Hov_Ov_Effect_Time, TotalSoft_VG_LVG_Title_Bg_Color, TotalSoft_VG_LVG_Title_Transparency, TotalSoft_VG_LVG_Title_Font_Size, TotalSoft_VG_LVG_Title_Color, TotalSoft_VG_LVG_Title_Text_Shadow, TotalSoft_VG_LVG_Title_Shadow_Color, TotalSoft_VG_LVG_Title_Effect_Type, TotalSoft_VG_LVG_Title_Effect_Time, TotalSoft_VG_LVG_Line_Width, TotalSoft_VG_LVG_Line_Style, TotalSoft_VG_LVG_Line_Color, TotalSoft_VG_LVG_Line_Hov_Type, TotalSoft_VG_LVG_Line_Hov_Time, TotalSoft_VG_LVG_Link_Font_Size, TotalSoft_VG_LVG_Link_Color, TotalSoft_VG_LVG_Link_Border_Color, TotalSoft_VG_LVG_Link_Border_Width, TotalSoft_VG_LVG_Link_Border_Style, TotalSoft_VG_LVG_Link_Bg_Color, TotalSoft_VG_LVG_Link_Hov_Type, TotalSoft_VG_LVG_Link_Hov_Time) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftGalleryV_SetNameID[0]->id, $Total_Soft_GalleryVSet[0]->TotalSoftGalleryV_SetName, $Total_Soft_GalleryVSet[0]->TotalSoftGalleryV_SetType, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_CC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_PB, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pad, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_BgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_VBW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_VBS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_VBC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_VBR, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_BgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_BW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_BS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_BC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_BR, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_TShow, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_TTA, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_TFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_TFF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_TC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_PType, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_PIcon, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_Pause, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_PIS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_PIC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_CType, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_CIcon, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_CIS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_CIC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_CIT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_CTF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_AType, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_ALeft, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_ARight, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_ArrS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_ArrC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_NFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Pop_NC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_P_NBT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_P_PBT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_P_BgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_P_C, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_P_FS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_P_FF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_P_H, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_P_CBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_P_CC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_P_HBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_P_HC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_P_BS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_P_BC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Img_Zoom_Type, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Img_Zoom_Effect_Time, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Hov_Ov_Bg_Color, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Hov_Ov_Transparency, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Hov_Ov_Effect_Type, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Hov_Ov_Effect_Time, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Title_Bg_Color, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Title_Transparency, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Title_Font_Size, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Title_Color, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Title_Text_Shadow, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Title_Shadow_Color, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Title_Effect_Type, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Title_Effect_Time, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Line_Width, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Line_Style, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Line_Color, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Line_Hov_Type, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Line_Hov_Time, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Link_Font_Size, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Link_Color, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Link_Border_Color, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Link_Border_Width, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Link_Border_Style, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Link_Bg_Color, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Link_Hov_Type, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_LVG_Link_Hov_Time));
		}
		else if($Total_Soft_GalleryVName[0]->TotalSoftGalleryV_SetType=='Thumbnails Video')
		{
			$Total_Soft_GalleryVSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE TotalSoftGalleryV_SetID=%s", $GalleryV_ID));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name7 (id, TotalSoftGalleryV_SetID, TotalSoftGalleryV_SetName, TotalSoftGalleryV_SetType, TotalSoft_VG_TV_SE, TotalSoft_VG_TV_HE, TotalSoft_VG_TV_O, TotalSoft_VG_TV_AS, TotalSoft_VG_TV_FC, TotalSoft_VG_TV_Sl, TotalSoft_VG_TV_BC, TotalSoft_VG_TV_BR, TotalSoft_VG_TV_POM, TotalSoft_VG_TV_POS, TotalSoft_VG_TV_ShC, TotalSoft_VG_TV_VW, TotalSoft_VG_TV_VH, TotalSoft_VG_TV_TShow, TotalSoft_VG_TV_TBgC, TotalSoft_VG_TV_TC, TotalSoft_VG_TV_TFS, TotalSoft_VG_TV_TFF, TotalSoft_VG_TV_TPos, TotalSoft_VG_TV_Pop_OC, TotalSoft_VG_TV_Pop_OO, TotalSoft_VG_TV_Pop_Bg, TotalSoft_VG_TV_Pop_BgC, TotalSoft_VG_TV_Pop_BR, TotalSoft_VG_TV_Pop_BSC, TotalSoft_VG_TV_Pop_TBg, TotalSoft_VG_TV_Pop_TBgC, TotalSoft_VG_TV_Pop_TFS, TotalSoft_VG_TV_Pop_TFF, TotalSoft_VG_TV_Pop_TC, TotalSoft_VG_TV_Pop_TTA, TotalSoft_VG_TV_Pop_NC, TotalSoft_VG_TV_Pop_NS, TotalSoft_VG_TV_Pop_ABgC, TotalSoft_VG_TV_Pop_AC, TotalSoft_VG_TV_Pop_AR, TotalSoft_VG_TV_Pop_AO, TotalSoft_VG_TV_Pop_CBgC, TotalSoft_VG_TV_Pop_CC, TotalSoft_VG_TV_Pop_CR, TotalSoft_VG_TV_P_NBT, TotalSoft_VG_TV_P_PBT, TotalSoft_VG_TV_P_BgC, TotalSoft_VG_TV_P_C, TotalSoft_VG_TV_P_FS, TotalSoft_VG_TV_P_FF, TotalSoft_VG_TV_P_H, TotalSoft_VG_TV_P_CBgC, TotalSoft_VG_TV_P_CC, TotalSoft_VG_TV_P_HBgC, TotalSoft_VG_TV_P_HC, TotalSoft_VG_TV_P_BS, TotalSoft_VG_TV_P_BC, TotalSoft_VG_TV_V_PBImgs, TotalSoft_VG_TV_Ic_S, TotalSoft_VG_TV_Ic_C, TotalSoft_VG_TV_Ic_T) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftGalleryV_SetNameID[0]->id, $Total_Soft_GalleryVSet[0]->TotalSoftGalleryV_SetName, $Total_Soft_GalleryVSet[0]->TotalSoftGalleryV_SetType, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_SE, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_HE, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_O, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_AS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_FC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Sl, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_BC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_BR, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_POM, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_POS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_ShC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_VW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_VH, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_TShow, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_TBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_TC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_TFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_TFF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_TPos, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_OC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_OO, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_Bg, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_BgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_BR, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_BSC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_TBg, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_TBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_TFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_TFF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_TC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_TTA, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_NC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_NS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_ABgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_AC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_AR, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_AO, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_CBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_CC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Pop_CR, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_P_NBT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_P_PBT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_P_BgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_P_C, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_P_FS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_P_FF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_P_H, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_P_CBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_P_CC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_P_HBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_P_HC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_P_BS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_P_BC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_V_PBImgs, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Ic_S, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Ic_C, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_TV_Ic_T));
		}
		else if($Total_Soft_GalleryVName[0]->TotalSoftGalleryV_SetType=='Content Popup')
		{
			$Total_Soft_GalleryVSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE TotalSoftGalleryV_SetID=%s", $GalleryV_ID));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name8 (id, TotalSoftGalleryV_SetID, TotalSoftGalleryV_SetName, TotalSoftGalleryV_SetType, TotalSoft_VG_CP_W, TotalSoft_VG_CP_H, TotalSoft_VG_CP_BW, TotalSoft_VG_CP_BC, TotalSoft_VG_CP_PB, TotalSoft_VG_CP_BSShow, TotalSoft_VG_CP_BSW, TotalSoft_VG_CP_BSC, TotalSoft_VG_CP_HEff, TotalSoft_VG_CP_HOC, TotalSoft_VG_CP_HOO, TotalSoft_VG_CP_TShow, TotalSoft_VG_CP_TC, TotalSoft_VG_CP_TFS, TotalSoft_VG_CP_TFF, TotalSoft_VG_CP_TBgC, TotalSoft_VG_CP_DShow, TotalSoft_VG_CP_DC, TotalSoft_VG_CP_DFS, TotalSoft_VG_CP_DFF, TotalSoft_VG_CP_LATW, TotalSoft_VG_CP_LATC, TotalSoft_VG_CP_LText, TotalSoft_VG_CP_LBW, TotalSoft_VG_CP_LBC, TotalSoft_VG_CP_LBR, TotalSoft_VG_CP_LBgC, TotalSoft_VG_CP_LC, TotalSoft_VG_CP_LFS, TotalSoft_VG_CP_LFF, TotalSoft_VG_CP_LHBgC, TotalSoft_VG_CP_LHC, TotalSoft_VG_CP_P_NBT, TotalSoft_VG_CP_P_PBT, TotalSoft_VG_CP_P_BgC, TotalSoft_VG_CP_P_C, TotalSoft_VG_CP_P_FS, TotalSoft_VG_CP_P_FF, TotalSoft_VG_CP_P_CBgC, TotalSoft_VG_CP_P_CC, TotalSoft_VG_CP_P_HBgC, TotalSoft_VG_CP_P_HC, TotalSoft_VG_CP_P_BS, TotalSoft_VG_CP_P_BC, TotalSoft_VG_CP_Pop_BgC, TotalSoft_VG_CP_Pop_BW, TotalSoft_VG_CP_Pop_BS, TotalSoft_VG_CP_Pop_BC, TotalSoft_VG_CP_Pop_TFS, TotalSoft_VG_CP_Pop_TFF, TotalSoft_VG_CP_Pop_TC, TotalSoft_VG_CP_Pop_TBgC, TotalSoft_VG_CP_Pop_TTA, TotalSoft_VG_CP_Pop_DFS, TotalSoft_VG_CP_Pop_DFF, TotalSoft_VG_CP_Pop_DC, TotalSoft_VG_CP_Pop_DBgC, TotalSoft_VG_CP_Pop_LText, TotalSoft_VG_CP_Pop_LBW, TotalSoft_VG_CP_Pop_LBS, TotalSoft_VG_CP_Pop_LBC, TotalSoft_VG_CP_Pop_LBR, TotalSoft_VG_CP_Pop_LBgC, TotalSoft_VG_CP_Pop_LC, TotalSoft_VG_CP_Pop_LFS, TotalSoft_VG_CP_Pop_LFF, TotalSoft_VG_CP_Pop_LHBgC, TotalSoft_VG_CP_Pop_LHC, TotalSoft_VG_CP_Pop_IBgC, TotalSoft_VG_CP_Pop_CIS, TotalSoft_VG_CP_Pop_CIC, TotalSoft_VG_CP_Pop_CIT, TotalSoft_VG_CP_Pop_CIcon, TotalSoft_VG_CP_Pop_AS, TotalSoft_VG_CP_Pop_AC, TotalSoft_VG_CP_Pop_AT, TotalSoft_VG_CP_Pop_ALeft, TotalSoft_VG_CP_Pop_ARight, TotalSoft_VG_CP_LShow) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftGalleryV_SetNameID[0]->id, $Total_Soft_GalleryVSet[0]->TotalSoftGalleryV_SetName, $Total_Soft_GalleryVSet[0]->TotalSoftGalleryV_SetType, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_W, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_H, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_BW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_BC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_PB, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_BSShow, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_BSW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_BSC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_HEff, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_HOC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_HOO, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_TShow, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_TC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_TFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_TFF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_TBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_DShow, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_DC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_DFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_DFF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_LATW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_LATC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_LText, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_LBW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_LBC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_LBR, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_LBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_LC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_LFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_LFF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_LHBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_LHC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_P_NBT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_P_PBT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_P_BgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_P_C, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_P_FS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_P_FF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_P_CBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_P_CC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_P_HBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_P_HC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_P_BS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_P_BC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_BgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_BW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_BS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_BC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_TFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_TFF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_TC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_TBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_TTA, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_DFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_DFF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_DC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_DBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_LText, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_LBW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_LBS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_LBC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_LBR, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_LBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_LC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_LFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_LFF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_LHBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_LHC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_IBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_CIS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_CIC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_CIT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_CIcon, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_AS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_AC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_AT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_ALeft, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_Pop_ARight, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_CP_LShow));
		}
		else if($Total_Soft_GalleryVName[0]->TotalSoftGalleryV_SetType=='Elastic Gallery')
		{
			$Total_Soft_GalleryVSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE TotalSoftGalleryV_SetID=%s", $GalleryV_ID));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name9 (id, TotalSoftGalleryV_SetID, TotalSoftGalleryV_SetName, TotalSoftGalleryV_SetType, TotalSoft_VG_HLG_W, TotalSoft_VG_HLG_H, TotalSoft_VG_HLG_BW, TotalSoft_VG_HLG_BS, TotalSoft_VG_HLG_BC, TotalSoft_VG_HLG_BSh, TotalSoft_VG_HLG_BShC, TotalSoft_VG_HLG_IHovT, TotalSoft_VG_HLG_IHovTr, TotalSoft_VG_HLG_TFS, TotalSoft_VG_HLG_TC, TotalSoft_VG_HLG_TFF, TotalSoft_VG_HLG_TBgC, TotalSoft_VG_HLG_THovT, TotalSoft_VG_HLG_THovTr, TotalSoft_VG_HLG_ShowT, TotalSoft_VG_HLG_TOp, TotalSoft_VG_HLG_PIcS, TotalSoft_VG_HLG_PIcC, TotalSoft_VG_HLG_PIcT, TotalSoft_VG_HLG_PIcBW, TotalSoft_VG_HLG_PIcBC, TotalSoft_VG_HLG_PIcBS, TotalSoft_VG_HLG_PIcBgC, TotalSoft_VG_HLG_LC, TotalSoft_VG_HLG_LBC, TotalSoft_VG_HLG_LBgC, TotalSoft_VG_HLG_LIcT, TotalSoft_VG_HLG_POvBgC, TotalSoft_VG_HLG_POvBgCOp, TotalSoft_VG_HLG_PSShChDur, TotalSoft_VG_HLG_PSlOpC, TotalSoft_VG_HLG_PSlOpFS, TotalSoft_VG_HLG_PDelIcT, TotalSoft_VG_HLG_PSlIcFS, TotalSoft_VG_HLG_PSlIcC, TotalSoft_VG_HLG_PSlIcBgC, TotalSoft_VG_HLG_PSlIcT, TotalSoft_VG_HLG_PSlAutPl, TotalSoft_VG_HLG_PSlLoop, TotalSoft_VG_HLG_PSlBW, TotalSoft_VG_HLG_PSlBS, TotalSoft_VG_HLG_PSlBC, TotalSoft_VG_HLG_PSlBSh, TotalSoft_VG_HLG_PSlBShC, TotalSoft_VG_HLG_P_NBT, TotalSoft_VG_HLG_P_PBT, TotalSoft_VG_HLG_P_BgC, TotalSoft_VG_HLG_P_C, TotalSoft_VG_HLG_P_FS, TotalSoft_VG_HLG_P_FF, TotalSoft_VG_HLG_P_H, TotalSoft_VG_HLG_P_CBgC, TotalSoft_VG_HLG_P_CC, TotalSoft_VG_HLG_P_HBgC, TotalSoft_VG_HLG_P_HC, TotalSoft_VG_HLG_P_BS, TotalSoft_VG_HLG_P_BC) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftGalleryV_SetNameID[0]->id, $Total_Soft_GalleryVSet[0]->TotalSoftGalleryV_SetName, $Total_Soft_GalleryVSet[0]->TotalSoftGalleryV_SetType, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_W, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_H, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_BW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_BS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_BC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_BSh, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_BShC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_IHovT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_IHovTr, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_TFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_TC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_TFF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_TBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_THovT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_THovTr, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_ShowT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_TOp, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PIcS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PIcC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PIcT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PIcBW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PIcBC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PIcBS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PIcBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_LC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_LBC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_LBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_LIcT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_POvBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_POvBgCOp, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PSShChDur, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PSlOpC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PSlOpFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PDelIcT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PSlIcFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PSlIcC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PSlIcBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PSlIcT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PSlAutPl, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PSlLoop, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PSlBW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PSlBS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PSlBC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PSlBSh, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_PSlBShC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_P_NBT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_P_PBT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_P_BgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_P_C, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_P_FS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_P_FF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_P_H, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_P_CBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_P_CC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_P_HBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_P_HC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_P_BS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_HLG_P_BC));
		}
		else if($Total_Soft_GalleryVName[0]->TotalSoftGalleryV_SetType=='Fancy Gallery')
		{
			$Total_Soft_GalleryVSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name10 WHERE TotalSoftGalleryV_SetID=%s", $GalleryV_ID));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name10 (id, TotalSoftGalleryV_SetID, TotalSoftGalleryV_SetName, TotalSoftGalleryV_SetType, TotalSoft_VG_FG_W, TotalSoft_VG_FG_H, TotalSoft_VG_FG_BW, TotalSoft_VG_FG_BC, TotalSoft_VG_FG_BSh, TotalSoft_VG_FG_BShC, TotalSoft_VG_FG_BR, TotalSoft_VG_FG_PBI, TotalSoft_VG_FG_TFS, TotalSoft_VG_FG_TFF, TotalSoft_VG_FG_TC, TotalSoft_VG_FG_TBBW, TotalSoft_VG_FG_TBBS, TotalSoft_VG_FG_TBBC, TotalSoft_VG_FG_TTBW, TotalSoft_VG_FG_TTBC, TotalSoft_VG_FG_LFS, TotalSoft_VG_FG_LFF, TotalSoft_VG_FG_LC, TotalSoft_VG_FG_LP, TotalSoft_VG_FG_LBW, TotalSoft_VG_FG_LBC, TotalSoft_VG_FG_LBR, TotalSoft_VG_FG_LBgC, TotalSoft_VG_FG_LHC, TotalSoft_VG_FG_LHBC, TotalSoft_VG_FG_LHBgC, TotalSoft_VG_FG_LHOvT, TotalSoft_VG_FG_LHOvC, TotalSoft_VG_FG_LHOvTr, TotalSoft_VG_FG_POvC, TotalSoft_VG_FG_POvTr, TotalSoft_VG_FG_PVBC, TotalSoft_VG_FG_PVBgC, TotalSoft_VG_FG_PVW, TotalSoft_VG_FG_PVH, TotalSoft_VG_FG_PTumbHBC, TotalSoft_VG_FG_PTumbHBW, TotalSoft_VG_FG_PTumbIW, TotalSoft_VG_FG_PTumbIH, TotalSoft_VG_FG_PTFS, TotalSoft_VG_FG_PTFF, TotalSoft_VG_FG_PTC, TotalSoft_VG_FG_SlIcT, TotalSoft_VG_FG_SlIcS, TotalSoft_VG_FG_SlIcC, TotalSoft_VG_FG_SlDelIcT, TotalSoft_VG_FG_SlDelIcS, TotalSoft_VG_FG_SlDelIcC, TotalSoft_VG_FG_ShVAut, TotalSoft_VG_FG_ShN, TotalSoft_VG_FG_ShPT, TotalSoft_VG_FG_ShSlPlIc, TotalSoft_VG_FG_PDFS, TotalSoft_VG_FG_PDFF, TotalSoft_VG_FG_PDC, TotalSoft_VG_FG_PDTA, TotalSoft_VG_FG_P_NBT, TotalSoft_VG_FG_P_PBT, TotalSoft_VG_FG_P_BgC, TotalSoft_VG_FG_P_C, TotalSoft_VG_FG_P_FS, TotalSoft_VG_FG_P_FF, TotalSoft_VG_FG_P_H, TotalSoft_VG_FG_P_CBgC, TotalSoft_VG_FG_P_CC, TotalSoft_VG_FG_P_HBgC, TotalSoft_VG_FG_P_HC, TotalSoft_VG_FG_P_BS, TotalSoft_VG_FG_P_BC, TotalSoft_VG_FG_LT) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftGalleryV_SetNameID[0]->id, $Total_Soft_GalleryVSet[0]->TotalSoftGalleryV_SetName, $Total_Soft_GalleryVSet[0]->TotalSoftGalleryV_SetType, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_W, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_H, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_BW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_BC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_BSh, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_BShC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_BR, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_PBI, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_TFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_TFF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_TC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_TBBW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_TBBS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_TBBC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_TTBW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_TTBC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_LFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_LFF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_LC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_LP, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_LBW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_LBC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_LBR, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_LBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_LHC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_LHBC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_LHBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_LHOvT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_LHOvC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_LHOvTr, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_POvC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_POvTr, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_PVBC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_PVBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_PVW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_PVH, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_PTumbHBC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_PTumbHBW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_PTumbIW, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_PTumbIH, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_PTFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_PTFF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_PTC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_SlIcT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_SlIcS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_SlIcC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_SlDelIcT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_SlDelIcS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_SlDelIcC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_ShVAut, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_ShN, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_ShPT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_ShSlPlIc, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_PDFS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_PDFF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_PDC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_PDTA, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_P_NBT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_P_PBT, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_P_BgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_P_C, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_P_FS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_P_FF, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_P_H, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_P_CBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_P_CC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_P_HBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_P_HC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_P_BS, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_P_BC, $Total_Soft_GalleryVSet[0]->TotalSoft_VG_FG_LT));
		}
		else if($Total_Soft_GalleryVName[0]->TotalSoftGalleryV_SetType=='Parallax Engine')
		{
			$Total_Soft_GalleryVSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name11 WHERE TotalSoftGalleryV_SetID=%s", $GalleryV_ID));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name11 (id, TotalSoftGalleryV_SetID, TotalSoftGalleryV_SetName, TotalSoftGalleryV_SetType, TotalSoft_JGV_H, TotalSoft_JGV_W, TotalSoft_JGV_BR, TotalSoft_JGV_BSh, TotalSoft_JGV_BShC, TotalSoft_JGV_BShT, TotalSoft_JGV_ET, TotalSoft_JGV_PBI, TotalSoft_JGV_T_FS, TotalSoft_JGV_T_FF, TotalSoft_JGV_T_C, TotalSoft_JGV_T_TSh, TotalSoft_JGV_T_TShC, TotalSoft_JGV_T_ET, TotalSoft_JGV_PI_Sh, TotalSoft_JGV_PI_T, TotalSoft_JGV_PI_S, TotalSoft_JGV_PI_C, TotalSoft_JGV_L_T, TotalSoft_JGV_L_Sh, TotalSoft_JGV_L_W, TotalSoft_JGV_L_C, TotalSoft_JGV_L_BSh, TotalSoft_JGV_L_BShC, TotalSoft_JGV_Ov_BgC, TotalSoft_JGV_Ov_T, TotalSoft_JGV_Ov_Tr, TotalSoft_JGV_Ov_Sh, TotalSoft_JGV_Pop_OvBgC, TotalSoft_JGV_Pop_T, TotalSoft_JGV_Pop_OvTr, TotalSoft_JGV_P1S_ET, TotalSoft_JGV_P2S_ITBgC, TotalSoft_JGV_PS_IBW, TotalSoft_JGV_PS_IBC, TotalSoft_JGV_PS_IBSh, TotalSoft_JGV_PS_BShC, TotalSoft_JGV_PS_OpBgC, TotalSoft_JGV_PS_ITFS, TotalSoft_JGV_PS_ITFF, TotalSoft_JGV_PS_ITC, TotalSoft_JGV_PS_IcS, TotalSoft_JGV_PS_IcC, TotalSoft_JGV_PS_IcT, TotalSoft_JGV_PS_DIcT, TotalSoft_JGV_PS_LT, TotalSoft_JGV_P_NBT, TotalSoft_JGV_P_PBT, TotalSoft_JGV_P_BgC, TotalSoft_JGV_P_C, TotalSoft_JGV_P_FS, TotalSoft_JGV_P_FF, TotalSoft_JGV_P_H, TotalSoft_JGV_P_CBgC, TotalSoft_JGV_P_CC, TotalSoft_JGV_P_HBgC, TotalSoft_JGV_P_HC, TotalSoft_JGV_P_BS, TotalSoft_JGV_P_BC) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftGalleryV_SetNameID[0]->id, $Total_Soft_GalleryVSet[0]->TotalSoftGalleryV_SetName, $Total_Soft_GalleryVSet[0]->TotalSoftGalleryV_SetType, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_H, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_W, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_BR, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_BSh, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_BShC, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_BShT, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_ET, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_PBI, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_T_FS, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_T_FF, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_T_C, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_T_TSh, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_T_TShC, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_T_ET, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_PI_Sh, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_PI_T, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_PI_S, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_PI_C, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_L_T, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_L_Sh, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_L_W, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_L_C, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_L_BSh, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_L_BShC, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_Ov_BgC, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_Ov_T, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_Ov_Tr, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_Ov_Sh, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_Pop_OvBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_Pop_T, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_Pop_OvTr, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_P1S_ET, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_P2S_ITBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_PS_IBW, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_PS_IBC, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_PS_IBSh, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_PS_BShC, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_PS_OpBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_PS_ITFS, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_PS_ITFF, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_PS_ITC, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_PS_IcS, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_PS_IcC, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_PS_IcT, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_PS_DIcT, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_PS_LT, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_P_NBT, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_P_PBT, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_P_BgC, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_P_C, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_P_FS, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_P_FF, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_P_H, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_P_CBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_P_CC, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_P_HBgC, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_P_HC, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_P_BS, $Total_Soft_GalleryVSet[0]->TotalSoft_JGV_P_BC));
		}
		die();
	}
	// Widget
	add_action( 'wp_ajax_TotalSoftGallery_Video_Page', 'TotalSoftGallery_Video_Page_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftGallery_Video_Page', 'TotalSoftGallery_Video_Page_Callback' );

	function TotalSoftGallery_Video_Page_Callback()
	{
		$GalleryV_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;

		$table_name3 = $wpdb->prefix . "totalsoft_galleryv_videos";

		$Total_Soft_GalleryVVideos=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE GalleryV_ID=%s order by id", $GalleryV_ID));

		for($i = 0; $i < count($Total_Soft_GalleryVVideos); $i++)
		{
			$Total_Soft_GalleryVVideos[$i]->TotalSoftGallery_Video_VDesc = html_entity_decode($Total_Soft_GalleryVVideos[$i]->TotalSoftGallery_Video_VDesc);
		}

		print_r($Total_Soft_GalleryVVideos);
		die();
	}

	add_action( 'wp_ajax_TotalSoftGallery_Video_PageGO', 'TotalSoftGallery_Video_PageGO_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftGallery_Video_PageGO', 'TotalSoftGallery_Video_PageGO_Callback' );

	function TotalSoftGallery_Video_PageGO_Callback()
	{
		$GalleryV_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name2 = $wpdb->prefix . "totalsoft_galleryv_manager";
		$table_name4 = $wpdb->prefix . "totalsoft_galleryv_dbt";
		$table_name5 = $wpdb->prefix . "totalsoft_galleryv_gvg";

		$Total_Soft_GalleryMan=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id=%d", $GalleryV_ID));
		$Total_Soft_GalleryVName=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE TotalSoftGalleryV_SetName=%s", $Total_Soft_GalleryMan[0]->TotalSoftGallery_Video_Option));
		if($Total_Soft_GalleryVName[0]->TotalSoftGalleryV_SetType=='Grid Video Gallery')
		{
			$Total_Soft_GalleryVSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE TotalSoftGalleryV_SetID=%s", $Total_Soft_GalleryVName[0]->id));
		}

		print_r($Total_Soft_GalleryVSet);
		
		die();
	}

	add_action( 'wp_ajax_TotalSoftGallery_Video_CP_Popup', 'TotalSoftGallery_Video_CP_Popup_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftGallery_Video_CP_Popup', 'TotalSoftGallery_Video_CP_Popup_Callback' );

	function TotalSoftGallery_Video_CP_Popup_Callback()
	{
		$TotalSoftGV_CP_VID = sanitize_text_field($_POST['foobar']);
		global $wpdb;

		$table_name3 = $wpdb->prefix . "totalsoft_galleryv_videos";

		$Total_Soft_GalleryVVideos=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id=%d order by id", $TotalSoftGV_CP_VID));
		for($i = 0; $i < count($Total_Soft_GalleryVVideos); $i++)
		{
			$Total_Soft_GalleryVVideos[$i]->TotalSoftGallery_Video_VDesc = html_entity_decode($Total_Soft_GalleryVVideos[$i]->TotalSoftGallery_Video_VDesc);
		}

		print_r($Total_Soft_GalleryVVideos);
		die();
	}

	add_action( 'wp_ajax_TotalSoftGallery_Video_CP_Popup_Left', 'TotalSoftGallery_Video_CP_Popup_Left_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftGallery_Video_CP_Popup_Left', 'TotalSoftGallery_Video_CP_Popup_Left_Callback' );

	function TotalSoftGallery_Video_CP_Popup_Left_Callback()
	{
		$TotalSoft_GV_CP_VID = sanitize_text_field($_POST['foobar']);
		global $wpdb;

		$table_name3 = $wpdb->prefix . "totalsoft_galleryv_videos";

		$Total_Soft_GalleryVVideo=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id=%d order by id", $TotalSoft_GV_CP_VID));
		
		$Total_Soft_GalleryVVideos=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE GalleryV_ID=%s order by id", $Total_Soft_GalleryVVideo[0]->GalleryV_ID));

		for($i=0;$i<count($Total_Soft_GalleryVVideos);$i++)
		{
			if($Total_Soft_GalleryVVideos[$i]->id==$TotalSoft_GV_CP_VID)
			{
				if($i!=0)
				{
					$Total_Soft_GalleryVVid=$Total_Soft_GalleryVVideos[$i-1];
				}
				else
				{
					$Total_Soft_GalleryVVid=$Total_Soft_GalleryVVideos[count($Total_Soft_GalleryVVideos)-1];
				}
			}
		}

		for($i = 0; $i < count($Total_Soft_GalleryVVideos); $i++)
		{
			$Total_Soft_GalleryVVideos[$i]->TotalSoftGallery_Video_VDesc = html_entity_decode($Total_Soft_GalleryVVideos[$i]->TotalSoftGallery_Video_VDesc);
		}
		print_r($Total_Soft_GalleryVVid);
		die();
	}

	add_action( 'wp_ajax_TotalSoftGallery_Video_CP_Popup_Right', 'TotalSoftGallery_Video_CP_Popup_Right_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftGallery_Video_CP_Popup_Right', 'TotalSoftGallery_Video_CP_Popup_Right_Callback' );

	function TotalSoftGallery_Video_CP_Popup_Right_Callback()
	{
		$TotalSoft_GV_CP_VID = sanitize_text_field($_POST['foobar']);
		global $wpdb;

		$table_name3 = $wpdb->prefix . "totalsoft_galleryv_videos";

		$Total_Soft_GalleryVVideo=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id=%d order by id", $TotalSoft_GV_CP_VID));
		
		$Total_Soft_GalleryVVideos=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE GalleryV_ID=%s order by id", $Total_Soft_GalleryVVideo[0]->GalleryV_ID));

		for($i=0;$i<count($Total_Soft_GalleryVVideos);$i++)
		{
			if($Total_Soft_GalleryVVideos[$i]->id==$TotalSoft_GV_CP_VID)
			{
				if($i!=count($Total_Soft_GalleryVVideos)-1)
				{
					$Total_Soft_GalleryVVid=$Total_Soft_GalleryVVideos[$i+1];
				}
				else
				{
					$Total_Soft_GalleryVVid=$Total_Soft_GalleryVVideos[0];
				}
			}
		}
		for($i = 0; $i < count($Total_Soft_GalleryVVideos); $i++)
		{
			$Total_Soft_GalleryVVideos[$i]->TotalSoftGallery_Video_VDesc = html_entity_decode($Total_Soft_GalleryVVideos[$i]->TotalSoftGallery_Video_VDesc);
		}
		print_r($Total_Soft_GalleryVVid);
		die();
	}	
?>