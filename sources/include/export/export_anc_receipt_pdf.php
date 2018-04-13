<?php

/*
 *   This file is part of NOALYSS.
 *
 *   NOALYSS is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   NOALYSS is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with NOALYSS; if not, write to the Free Software
 *   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

// Copyright Author Dany De Bontridder danydb@aevalys.eu
// Copyright Author Dany De Bontridder danydb@aevalys.eu
if (!defined('ALLOWED'))
    die('Appel direct ne sont pas permis');

// unlock session
session_write_close();
/**
 * export all the selected documents for Ana Accountancy in PDF
 */
require_once NOALYSS_INCLUDE.'/class/document_export.class.php';
require_once NOALYSS_INCLUDE.'/lib/http_input.class.php';
require_once NOALYSS_INCLUDE.'/lib/progress_bar.class.php';
$http=new HttpInput();
$ck = $http->get('ck',"string", 0);
if ($ck == 0)
{
    echo _("Aucune sélection");
    exit();
}
$anc=new Document_Export();
$task_id=$http->request("task_id");
$progress=new Progress_Bar($task_id);
$anc->export_all($ck,$progress);
