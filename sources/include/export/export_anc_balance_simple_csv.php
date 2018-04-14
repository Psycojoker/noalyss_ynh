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

/*!\file
* \brief  export the operation in pdf
 */
if ( ! defined ('ALLOWED') ) die('Appel direct ne sont pas permis');

require_once  NOALYSS_INCLUDE.'/class/anc_balance_simple.class.php';
require_once  NOALYSS_INCLUDE.'/lib/noalyss_csv.class.php';

$cn=Dossier::connect();

$bal=new Anc_Balance_Simple($cn);
$bal->get_request();
echo $bal->display_csv();