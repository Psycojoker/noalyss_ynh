<?php
//@description: Test the class Acc_Ledger_Account
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
// Copyright (2016) Author Dany De Bontridder <dany@alchimerys.be>

/**
 * @file
 * @brief 
 * @param type $name Descriptionara
 */

 $_GET=array (
);
$_POST=array (
);
$_POST['gDossier']=$gDossierLogInput;
$_GET['gDossier']=$gDossierLogInput;
$_REQUEST=array_merge($_GET,$_POST);

require_once NOALYSS_INCLUDE."/class/fiche.class.php";

 $_GET=array (
);
$_POST=array (
);
$_POST['gDossier']=$gDossierLogInput;
$_GET['gDossier']=$gDossierLogInput;
$_REQUEST=array_merge($_GET,$_POST);

$a=new Fiche($cn,230);
echo h1("Fiche->get_row");
$result=$a->get_row(227,230);
var_dump($result);
echo h1("Fiche->get_row_date");
$result=$a->get_row_date('01.01.2015','01.01.2017');
var_dump($result);

