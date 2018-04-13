<?php

/*
 *   This file is part of NOALYSS.
 *
 *   PhpCompta is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   PhpCompta is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with PhpCompta; if not, write to the Free Software
 *   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */
// Copyright (2018) Author Dany De Bontridder <dany@alchimerys.be>


/**
 * @file
 * @brief Test the tva parameters file
 */
//@description:Scenario file for VAT parameters
$_POST['gDossier']=$gDossierLogInput;
$_GET['gDossier']=$gDossierLogInput;
$_REQUEST=array_merge($_GET, $_POST);
require_once NOALYSS_INCLUDE."/class/tva_rate_mtable.class.php";

$is_ajax=$http->request("TestAjaxFile", "string", "-");

$tva_rate=new V_Tva_Rate_SQL($cn);
if ($is_ajax!="-")
{
    $p_id=$http->request('p_id', "number");
    $tva_rate->set_pk_value($p_id);
    $tva_rate->load();
}
$manage_table=new Tva_Rate_MTable($tva_rate);
$manage_table->set_callback("ajax_test.php");
$manage_table->add_json_param("TestAjaxFile", __FILE__);

if ($is_ajax!="-")
{
    $table=$http->request('table');
    $action=$http->request('action');
    $p_id=$http->request('p_id', "number");
    $ctl_id=$http->request('ctl');
    /*
     * we're in ajax part
     */
    if ($action=="input")
    {

        $manage_table->set_object_name($ctl_id);
        header('Content-type: text/xml; charset=UTF-8');
        echo $manage_table->ajax_input()->saveXML();
        return;
    }
    elseif ($action=="save")
    {
        $manage_table->set_object_name($ctl_id);
        header('Content-type: text/xml; charset=UTF-8');
        echo $manage_table->ajax_save()->saveXML();
        return;
    } 
    elseif ($action=="delete")
    {
        $manage_table->set_object_name($ctl_id);
        header('Content-type: text/xml; charset=UTF-8');
        echo $manage_table->ajax_delete()->saveXML();
    }
    return;
}
$manage_table->create_js_script();

$manage_table->display_table();
