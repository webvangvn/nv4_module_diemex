<?php

/**
 * @Project NUKEVIET 3.4
 * @Author hongoctrien (01692777913@yahoo.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2012 by hongoctrien
 * @Createdate July 05, 2012 10:47:41 AM
 */

if( ! defined( 'NV_IS_FILE_MODULES' ) ) die( 'Stop!!!' );

$sql_drop_module = array();

$sql_drop_module[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "`";

$sql_create_module = $sql_drop_module;

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . " (
    sbd varchar(15) NOT NULL,
    ho varchar(100) NOT NULL,
    ten varchar(20) NOT NULL,
    lop varchar(10) NOT NULL,
    ngsinh varchar(10) NOT NULL,
    phong varchar(20) NOT NULL,
    toan float(3) default NULL,
    ly float(3) default NULL,
    hoa float(3) default NULL,
    sinh float(3) default NULL,
    van float(3) default NULL,
    su float(3) default NULL,
    dia float(3) default NULL,
    anh float(3) default NULL,
    gd float(3) default NULL,
    primary key (`sbd`)
) ENGINE=MyISAM";
