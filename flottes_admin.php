<?php
/***************************************************************************
*	filename	: flotte_admin.php
*	desc.		:
*	Author		: 1.03
***************************************************************************/

if (!defined('IN_SPYOGAME')) {
	die("Hacking attempt");
}
require_once("./mod/flottes/function_flottes.php");
require_once("./mod/flottes/flottes_inc.php");

buttons_bar($pub_subaction);



$color= array('black','maroon','green','olive','navy','purple','teal','gray','white','red','lime','yellow','blue','fuchsia','aqua','silver','cyan','orange','pink');
$nb_color=19;
$game=array('OGAME','UNIVERS');
/*
black	#000000	 
maroon	#800000	 
green	#008000	 
olive	#808000	 
navy	#000080	 
purple	#800080	 
teal	#008080	 
gray	#808080	 
white	#FFFFFF	 
red	#FF0000	 
lime	#00FF00	 
yellow	#FFFF00	 
blue	#0000FF	 
fuchsia	#FF00FF	 
aqua	#00FFFF	 
silver	#C0C0C0	 
*/


$TCF = isset($_POST['cf']) ? $_POST['cf'] : '';
$TCFO = isset($_POST['cfo']) ? $_POST['cfo'] : '';
$TCFU = isset($_POST['cfu']) ? $_POST['cfu'] : '';
$TCFP = isset($_POST['cfp']) ? $_POST['cfp'] : '';
$TCFA = isset($_POST['cfa']) ? $_POST['cfa'] : '';
$TCB1 = isset($_POST['cb1']) ? $_POST['cb1'] : '';
$TCB2 = isset($_POST['cb2']) ? $_POST['cb2'] : '';
$TCB3 = isset($_POST['cb3']) ? $_POST['cb3'] : '';
$TCB4 = isset($_POST['cb4']) ? $_POST['cb4'] : '';
$TCB5 = isset($_POST['cb5']) ? $_POST['cb5'] : '';
$TGA = isset($_POST['ga']) ? $_POST['ga'] : '';
$TPLA= isset($_POST['pla']) ? $_POST['pla'] : '';
 
if ($TCF) {$CF=$TCF;}
if ($TCFO) {$CFO=$TCFO;}
if ($TCFU) {$CFU=$TCFU;}
if ($TCFP) {$CFP=$TCFP;}
if ($TCFA) {$CFA=$TCFA;}
if ($TCB1) {$CB1=$TCB1;}
if ($TCB2) {$CB2=$TCB2;}
if ($TCB3) {$CB3=$TCB3;}
if ($TCB4) {$CB4=$TCB4;}
if ($TCB5) {$CB5=$TCB5;}
if ($TGA) {$GA=$TGA;}
if ($TPLA) {$PLA=$TPLA;}


// validation modification couleur
if(isset($pub_add_adm) ){
	switch($pub_add_adm) {
		case "Mise à jour couleur":
			sauve_color($CF,$CFO,$CFU,$CFP,$CFA,$CB1,$CB2,$CB3,$CB4,$CB5,$GA,$TPLA);
		break;
		
		case "Couleur par défaut":
			$CF='lime';
			$CFO='yellow';
			$CFU='red';
			$CFP='lime';
			$CFA='teal';
			$CB1='yellow';
			$CB2='red';
			$CB3='green';
			$CB4='cyan';
			$CB5='orange';
			$GA='OGAME';
			$PLA='9';
			echo "Couleurs par défaut";
		break;
	}
}
/// fin modification couleur

echo '<form method="POST">';
echo '<table width="40%">';
echo "<td class='c' colspan='12'>Flottes</td>";


/// couleur flotte
echo "<tr>";
echo "<th colspan='6'>";
echo "<b><span color='" .$CF. "'>Couleur Flotte</span></b></th>";
echo "<th colspan='6'>";
echo    '<select name="cf">';
    	for ($i = 0; $i <$nb_color; $i++)
    	{
        echo "<option value='".$color[$i]."' ".($color[$i] == $CF ? "selected" : "").">".$color[$i]."</option>";
    	}
echo "</select>";
echo "<input type='submit' value='OK'/></th></tr>";

/// couleur flotte old
echo "<tr>";
echo "<th colspan='6'>";
echo "<b><span color='" .$CFO. "'>Couleur Flotte ancien (+ de 2 jours)</span></b></th>";
echo "<th colspan='6'>";
echo    '<select name="cfo">';
    	for ($i = 0; $i <$nb_color; $i++)
    	{
        echo "<option value='".$color[$i]."' ".($color[$i] == $CFO ? "selected" : "").">".$color[$i]."</option>";
    	}
echo "</select>";
echo "<input type='submit' value='OK'/></th></tr>";

/// couleur flotte joueur
echo "<tr>";
echo "<th colspan='6'>";
echo "<b><span color='" .$CFU. "'>Couleur Flotte total joueur</span></b></th>";
echo "<th colspan='6'>";
echo    '<select name="cfu">';
    	for ($i = 0; $i <$nb_color; $i++)
    	{
        echo "<option value='".$color[$i]."' ".($color[$i] == $CFU ? "selected" : "").">".$color[$i]."</option>";
    	}
echo "</select>";
echo "<input type='submit' value='OK'/></th></tr>";

/// couleur flotte points
echo "<tr>";
echo "<th colspan='6'>";
echo "<b><span color='" .$CFP. "'>Couleur Flotte total point</span></b></th>";
echo "<th colspan='6'>";
echo    '<select name="cfp">';
    	for ($i = 0; $i <$nb_color; $i++)
    	{
        echo "<option value='".$color[$i]."' ".($color[$i] == $CFP ? "selected" : "").">".$color[$i]."</option>";
    	}
echo "</select>";
echo "<input type='submit' value='OK'/></th></tr>";

/// couleur flotte alliance
echo "<tr>";
echo "<th colspan='6'>";
echo "<b><span color='" .$CFA. "'>Couleur Flotte total alliance</span></b></th>";
echo "<th colspan='6'>";
echo    '<select name="cfa">';
    	for ($i = 0; $i <$nb_color; $i++)
    	{
        echo "<option value='".$color[$i]."' ".($color[$i] == $CFA ? "selected" : "").">".$color[$i]."</option>";
    	}
echo "</select>";
echo "<input type='submit' value='OK'/></th></tr>";

/// couleur BBCode 1
echo "<tr>";
echo "<th colspan='6'>";
echo "<b><span color='" .$CB1. "'>Couleur BBCode 1</span></b></th>";
echo "<th colspan='6'>";
echo    '<select name="cb1">';
    	for ($i = 0; $i <$nb_color; $i++)
    	{
        echo "<option value='".$color[$i]."' ".($color[$i] == $CB1 ? "selected" : "").">".$color[$i]."</option>";
    	}
echo "</select>";
echo "<input type='submit' value='OK'/></th></tr>";

/// couleur BBCode 2
echo "<tr>";
echo "<th colspan='6'>";
echo "<b><span color='" .$CB2. "'>Couleur BBCode 2</span></b></th>";
echo "<th colspan='6'>";
echo    '<select name="cb2">';
    	for ($i = 0; $i <$nb_color; $i++)
    	{
        echo "<option value='".$color[$i]."' ".($color[$i] == $CB2 ? "selected" : "").">".$color[$i]."</option>";
    	}
echo "</select>";
echo "<input type='submit' value='OK'/></th></tr>";

/// couleur BBCode 3
echo "<tr>";
echo "<th colspan='6'>";
echo "<b><span color='" .$CB3. "'>Couleur BBCode 3</span></b></th>";
echo "<th colspan='6'>";
echo    '<select name="cb3">';
    	for ($i = 0; $i <$nb_color; $i++)
    	{
        echo "<option value='".$color[$i]."' ".($color[$i] == $CB3 ? "selected" : "").">".$color[$i]."</option>";
    	}
echo "</select>";
echo "<input type='submit' value='OK'/></th></tr>";

/// couleur BBCode 4
echo "<tr>";
echo "<th colspan='6'>";
echo "<b><span color='" .$CB4. "'>Couleur BBCode 4</span></b></th>";
echo "<th colspan='6'>";
echo    '<select name="cb4">';
    	for ($i = 0; $i <$nb_color; $i++)
    	{
        echo "<option value='".$color[$i]."' ".($color[$i] == $CB4 ? "selected" : "").">".$color[$i]."</option>";
    	}
echo "</select>";
echo "<input type='submit' value='OK'/></th></tr>";

/// couleur BBCode 5
echo "<tr>";
echo "<th colspan='6'>";
echo "<b><span color='" .$CB5. "'>Couleur BBCode 5</span></b></th>";
echo "<th colspan='6'>";
echo    '<select name="cb5">';
    	for ($i = 0; $i <$nb_color; $i++)
    	{
        echo "<option value='".$color[$i]."' ".($color[$i] == $CB5 ? "selected" : "").">".$color[$i]."</option>";
    	}
echo "</select>";
echo "<input type='submit' value='OK'/></th></tr>";

/// Jeux
echo "<tr>";
echo "<th colspan='6'>";
echo "<b><span style=\"color: white; \">Serveur pour le jeux</span></b></th>";
echo "<th colspan='6'>";
echo    '<select name="ga">';
    	for ($i = 0; $i <2; $i++)
    	{
        echo "<option value='".$game[$i]."' ".($game[$i] == $GA ? "selected" : "").">".$game[$i]."</option>";
    	}
echo "</select>";
echo "<input type='submit' value='OK'/></th></tr>";

/// NB planete par fiche
echo "<tr>";
echo "<th colspan='6'>";
echo "<b><span style=\"color: white; \">Nombre de planète par page (UNIVERS)</span></b></th>";
echo "<th colspan='6'>";
echo '<input type="text" name="pla" size="10" maxlength="20" value="'.$PLA.'">';



echo "</select>";
echo "<input type='submit' value='OK'/></th></tr>";

//// bouton de validation
echo "<tr>";
echo "<th colspan='6'>";
echo "<input type='submit' name='add_adm' value='Mise à jour couleur'></th>";
echo "<th colspan='6'>";
echo "<input type='submit' name='add_adm' value='Couleur par défaut'></th></tr>";
echo "</table>";

echo"</form>";


?>