<?php

/**
 * @Project NUKEVIET 3.4
 * @Author hongoctrien (01692777913@yahoo.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2012 by hongoctrien
 * @Createdate July 05, 2012 10:47:41 AM
 */

if( ! defined( 'NV_ADMIN' ) or ! defined( 'NV_MAINFILE' ) or ! defined( 'NV_IS_MODADMIN' ) ) die( 'Stop!!!' );

define( 'NV_IS_FILE_ADMIN', true );


function nv_diemex_get_bodytext( $bodytext )
{
	// Get image tags
	if( preg_match_all( "/\<img[^\>]*src=\"([^\"]*)\"[^\>]*\>/is", $bodytext, $match ) )
	{
		foreach( $match[0] as $key => $_m )
		{
			$textimg = '';
			if( strpos( $match[1][$key], 'data:image/png;base64' ) === false )
			{
				$textimg = " " . $match[1][$key];
			}
			if( preg_match_all( "/\<img[^\>]*alt=\"([^\"]+)\"[^\>]*\>/is", $_m, $m_alt ) )
			{
				$textimg .= " " . $m_alt[1][0];
			}
			$bodytext = str_replace( $_m, $textimg, $bodytext );
		}
	}
	// Get link tags
	if( preg_match_all( "/\<a[^\>]*href=\"([^\"]+)\"[^\>]*\>(.*)\<\/a\>/isU", $bodytext, $match ) )
	{
		foreach( $match[0] as $key => $_m )
		{
			$bodytext = str_replace( $_m, $match[1][$key] . " " . $match[2][$key], $bodytext );
		}
	}

	$bodytext = str_replace( '&nbsp;', ' ', strip_tags( $bodytext ) );
	return preg_replace( '/[ ]+/', ' ', $bodytext );
}
