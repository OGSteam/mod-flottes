<?php
/***************************************************************************
*   filename    : update.php
*   desc.       : 1.08beta1
*   Author      : 
*   created     : 
*   modified    : AirBAT
*   last modif. : added upgrade from v1.07  
***************************************************************************/

if (!defined('IN_SPYOGAME')) {
    die("Hacking attempt");
}

global $db,$table_prefix;
define("TABLE_MOD_FLOTTES", $table_prefix."mod_flottes");

$mod_folder = "flottes";
$mod_name = "flottes";

$query = "SELECT `version` FROM ".TABLE_MOD." WHERE action='flottes'";
$req = $db->sql_query($query);
$ver = $db->sql_fetch_row($req);

if (version_compare($ver[0], '1.2.0', '<'))  {
    $query = "ALTER TABLE " . TABLE_MOD_FLOTTES . " ADD `FAU` int(11) NOT NULL default '0' AFTER `SAT`";
    $req = $db->sql_query($query);
    $query = "ALTER TABLE " . TABLE_MOD_FLOTTES . " ADD `ECL` int(11) NOT NULL default '0' AFTER `FAU`";
    $req = $db->sql_query($query);
}

if (version_compare($ver[0], '1.2.1', '<'))  {
    $query = "ALTER TABLE " . TABLE_MOD_FLOTTES . " ADD `FOR` int(11) NOT NULL default '0' AFTER `SAT`";
    $req = $db->sql_query($query);
}


update_mod($mod_folder, $mod_name);


// Enregistrement du Mod Flottes dans Xtense2
define("TABLE_XTENSE_CALLBACKS", $table_prefix."xtense_callbacks");

// On regarde si la table xtense_callbacks existe
$query = "SELECT id, version FROM ".TABLE_MOD." WHERE action='flottes'";
$resultid = $db->sql_query($query);
list($mod_id, $version) = $db->sql_fetch_row($resultid);
$result = $db->sql_query('show tables from '.$db->dbname.' like "'.TABLE_XTENSE_CALLBACKS.'" ');
if($db->sql_numrows($result) != 0){

	//On regarde si le mod Flottes est inscrit dans xtense2
	$result = $db->sql_query("Select * From ".TABLE_XTENSE_CALLBACKS." where mod_id = $mod_id");

	// s'il n'y est pas, on l'ajoute
	if($db->sql_numrows($result) == 0)
		$db->sql_query("INSERT INTO ".TABLE_XTENSE_CALLBACKS." (mod_id, function, type, active) VALUES ('$mod_id', 'flottes_import_fleet', 'fleet', 1)");
    }


