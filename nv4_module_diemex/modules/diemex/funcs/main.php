<?php

/**
 * @Project NUKEVIET 3.4
 * @Author hongoctrien (01692777913@yahoo.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2012 by hongoctrien
 * @Createdate July 05, 2012 10:47:41 AM
 */

if( ! defined( 'NV_IS_MOD_DIEMEX' ) ) die( 'Stop!!!' );

$page_title = $module_info['custom_title'];

$base_url = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name;

$xtpl = new XTemplate( "main.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'ACTION_FILE', $base_url );
    
$xtpl->parse( 'main.bodytext' );

$notice = "";
$contents = "";
$bodytext = "";
$content_file = NV_ROOTDIR . '/' . NV_DATADIR . '/' . NV_LANG_DATA . '_' . $module_data . 'Content.txt';

if( file_exists( $content_file ) )
{
	$bodytext = file_get_contents( $content_file );
}

$maso = $nv_Request->get_title ('maso', 'post/get','');
$pr = $nv_Request->get_title ('pr', 'post/get','');
$print_url = NV_BASE_SITEURL . "index.php?language=vi&nv=diemex&op=print&maso=" . $maso;
$xtpl->assign( 'PRINT', $print_url );

if (isset($maso) && !empty($maso))
{
	
    $maso1 = stripUnicode(chuthuong($maso));
	
    $data = array();
	
	$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '';
	
	$result = $db->query( $sql );

    $found = 0;
    
    while ( $item = $result->fetch() )
    {
		//die('2');
        if($maso1 == stripUnicode(chuthuong($item['sbd'])) 
        OR $maso1 == stripUnicode(chuthuong($item['ten']))        
        OR $maso1 == stripUnicode(chuthuong($item['ho'].' '.$item['ten']))
        OR $maso1 == stripUnicode(chuthuong($item['lop']))
        OR $maso1 == stripUnicode(chuthuong($item['phong'])))
        {
            $found ++;
            $data[] = array (
                 "sbd" => $item['sbd'],
                 "ho" => $item['ho'],
                 "ten" => $item['ten'],
                 "lop" => $item['lop'],
                 "ngsinh" => $item['ngsinh'],
                 "phong" => $item['phong'],
                 "toan" => $item['toan'],
                 "ly" => $item['ly'],
                 "hoa" => $item['hoa'],
                 
                 "van" => $item['van'],
                 "su" => $item['su'],
                 "dia" => $item['dia'],
				"sinh" => $item['sinh'],
                 "anh" => $item['anh'],
                 "gd" => $item['gd']);
         }
    }
    
    //In thong bao
    if($found != 0)
    {
        foreach($data as $tde)
        {
            if($found == 1)
            {
                $notice = $lang_module['f1'] . $tde['ho'] ." ". $tde['ten'] ." (".$tde['sbd'].")";
            }
        }
        
        if($found > 1)
        {
            $notice = sprintf($lang_module['f2'], $found, $maso); 
        }
        
        if($pr == 'lop')
        {
            $notice = $lang_module['ht_lop'] . $maso;
        }
        
        if($pr == 'phong')
        {
            $notice = $lang_module['ht_phong'] . $maso;
        }
                  
        //Tieu de thong bao
        $xtpl->assign( 'NOTICE', $notice);
  
            
        //Hien thi bang
        $xtpl->parse( 'main.table' );
        
        //Hien thi cac icon
        $xtpl->parse( 'main.icon' );
    }
    else
    {
        $xtpl->assign( 'NOTICE', $lang_module['error']);
    }
    
    //Hien thi ket qua tim dc
    if(!empty($data) && $maso!="")
    {
        foreach ($data as $row)
        {
            $xtpl->assign( 'TABLE', $row );
            $xtpl->parse( 'main.loop' );
        }
    }
    
    //Hien thi tieu de duoi
    if($found>6)
    {
        $xtpl->parse( 'main.tde_duoi' );
    }
    
}

$xtpl->parse( 'main' );

$contents .= $bodytext;
$contents .= $xtpl->text( 'main' );

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

