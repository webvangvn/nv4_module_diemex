<?php

/**
 * @Project NUKEVIET 3.4
 * @Author hongoctrien (01692777913@yahoo.com)
 * @Copyright (C) 2012 by hongoctrien
 * @Createdate July 05, 2012 10:47:41 AM
 */

if( ! defined( 'NV_IS_MOD_DIEMEX' ) ) die( 'Stop!!!' );

$page_title = $module_info['custom_title'];
global $global_config;

$xtpl = new XTemplate( "print.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'PAGE__TITLE', $global_config['site_name'] ." - ". $page_title );
$xtpl->assign( 'PAGE_URL', $global_config['my_domains']);

$contents = "";

$maso = $nv_Request->get_title ('maso', 'post/get','');
$pr = $nv_Request->get_title ('pr', 'post/get','');
if (isset($maso) && !empty($maso))
{
    $maso1 = stripUnicode(chuthuong($maso));
    $sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '';
	
	$result = $db->query( $sql );
    $found = 0;
    
    while ( $item = $result->fetch() )
    {
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
    
    //Hien thi ket qua tim dc
    if(!empty($data) && $maso!="")
    {
        foreach ($data as $row)
        {
            $xtpl->assign( 'TABLE', $row );
            $xtpl->parse( 'main.loop' );
        }
        $notice="";
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
    }
}

$xtpl->parse( 'main' );
$contents .= $xtpl->text( 'main' );


include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );


?>