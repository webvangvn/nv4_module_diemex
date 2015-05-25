<?php

/**
 * @Project NUKEVIET 4.x
 * @Author hongoctrien (01692777913@yahoo.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2012 by hongoctrien
 * @Createdate July 05, 2012 10:47:41 AM
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$page_title = $module_info['custom_title'];

global $module_file, $lang_module, $module_info;

$xtpl = new XTemplate( "main.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'IMP_ACTION', NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "" );

$data = array();
function add( $sbd, $ho, $ten, $lop, $ngsinh, $phong, $toan, $ly, $hoa,  $van, $su, $dia, $sinh, $anh, $gd)
{
	global $data;
	$data[] = array(
        'sbd'=>trim($sbd),
        'ho'=>trim($ho),
        'ten'=>trim($ten),
        'lop'=>trim($lop),
        'ngsinh'=>trim($ngsinh), 
        'phong'=>trim($phong), 
        'toan'=>$toan, 
        'ly'=>$ly, 
        'hoa'=>$hoa,
        'van'=>$van,
        'su'=>$su,
        'dia'=>$dia,
		'sinh'=>$sinh,
        'anh'=>$anh,
        'gd'=>$gd);
}

if (isset($_FILES['file']['tmp_name']))
{
    $notice = "";
    $dom = DOMDocument::load( $_FILES['file']['tmp_name'] );
    $rows = $dom->getElementsByTagName('Row');;
    $first_row = true;
    foreach ($rows as $row)
    {
        if( !$first_row)
        {
            $index = 1;
            $cells = $row->getElementsByTagName( 'Cell' );
            foreach( $cells as $cell )
            {
                $ind = $cell->getAttribute( 'Index' );
				if ( $ind != null ) $index = $ind;

				if ( $index == 1 ) $sbd = $cell->nodeValue;
				if ( $index == 2 ) $ho = $cell->nodeValue;
				if ( $index == 3 ) $ten = $cell->nodeValue;
				if ( $index == 4 ) $lop = $cell->nodeValue;
				if ( $index == 5 ) $ngsinh = $cell->nodeValue;
				if ( $index == 6 ) $phong = $cell->nodeValue;
				if ( $index == 7 ) $toan = $cell->nodeValue;
				if ( $index == 8 ) $ly = $cell->nodeValue;
				if ( $index == 9 ) $hoa = $cell->nodeValue;
				   
				if ( $index == 10 ) $van = $cell->nodeValue;
				if ( $index == 11 ) $su = $cell->nodeValue;
				if ( $index == 12 ) $dia = $cell->nodeValue;
				if ( $index == 13 ) $sinh = $cell->nodeValue;
				if ( $index == 14 ) $anh = $cell->nodeValue;
				if ( $index == 15 ) $gd = $cell->nodeValue;
				  
				$index += 1;
            }

            
            add( $sbd, $ho, $ten, $lop, $ngsinh, $phong, $toan, $ly, $hoa, $van, $su, $dia, $sinh,  $anh, $gd);
        }
        $first_row = false;
    }
}

foreach($data as $row)
{   
    /*
            if( ! empty( $row['ngsinh'] ) and preg_match( "/^([0-9]{1,2})\\/([0-9]{1,2})\/([0-9]{4})$/", $row['ngsinh'], $m ) )
            {
                $row['ngsinh1'] = mktime( 0, 0, 0, $m[2], $m[1], $m[3] );
            }
    */
    
//Neu gia tri khong phai la so thi gan mac dinh =0
if(!is_numeric($row['toan'])) $row['toan'] = 0;
if(!is_numeric($row['ly'])) $row['ly'] = 0;
if(!is_numeric($row['hoa'])) $row['hoa'] = 0;
if(!is_numeric($row['van'])) $row['van'] = 0;
if(!is_numeric($row['su'])) $row['su'] = 0;
if(!is_numeric($row['dia'])) $row['dia'] = 0;
if(!is_numeric($row['sinh'])) $row['sinh'] = 0;
if(!is_numeric($row['anh'])) $row['anh'] = 0;
if(!is_numeric($row['gd'])) $row['gd'] = 0;


$sql = "INSERT INTO " . NV_PREFIXLANG . "_" . $module_data . " ( sbd, ho,ten, lop, ngsinh, phong, toan, ly, hoa, van, su, dia, sinh, anh, gd) VALUES (
				:sbd,
				:ho,
				:ten,
				:lop,
				:ngsinh,
				:phong,
				:toan,
				:ly,
				:hoa,
				:van,
				:su,
				:dia,
				:sinh,
				:anh,
				:gd
			)";

			$data_insert = array();

	$data_insert['sbd'] = $row['sbd'];
	$data_insert['ho'] = $row['ho'];
	$data_insert['ten'] = $row['ten'];
	$data_insert['lop'] = $row['lop'];
	$data_insert['ngsinh'] = $row['ngsinh'];
	$data_insert['phong'] = $row['phong'];
	$data_insert['toan'] = $row['toan'];
	$data_insert['ly'] = $row['ly'];
	$data_insert['hoa'] = $row['hoa'];
	$data_insert['van'] = $row['van'];
	$data_insert['su'] = $row['su'];
	$data_insert['dia'] = $row['dia'];
	$data_insert['sinh'] = $row['sinh'];
	$data_insert['anh'] = $row['anh'];
	$data_insert['gd'] = $row['gd'];



    if($db->insert_id( $sql, 'id', $data_insert ))
    {
        $notice = $lang_module['error_csdl'];
    }
    else
    {
        $notice = $lang_module['ok_csdl'];        
    }
$xtpl->assign( 'NOTICE', $notice );

}
$from=NV_PREFIXLANG . "_" . $module_data;
$where="";
$db->sqlreset()->select( 'COUNT(*)' )->from( $from )->where( $where );
$num_row = $db->query( $db->sql() )->fetchColumn();

$xtpl->assign( 'NUM_ROW', $num_row );



$del = $nv_Request->get_string('del', 'get','');

if($del == 'ok')
{
   $sql = 'DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '';
	if( $db->exec( $sql ) )
	{
		header('Location:'.NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . ""); 
	}
}


$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_admin_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

