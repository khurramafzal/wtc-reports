<?php

error_reporting(E_ALL & ~E_NOTICE | E_WARNING);

//**************************************
//     Page load dropdown results     //
//**************************************
function getTierOne() {
    $result = mysql_query("SELECT DISTINCT name FROM photosheet_stream") or die(mysql_error());

    while ($tier = mysql_fetch_array($result)) {
        echo '<option value="' . $tier['name'] . '">' . $tier['name'] . '</option>';
    }
}

//**************************************
//     First selection results     //
//**************************************
if (isset($_GET['func']) == "drop_1" && isset($_GET['func'])) {
    drop_1($_GET['drop_var']);
}

function drop_1($drop_var) {
    include_once('connection.php');
//	$result = mysql_query("SELECT * FROM photosheet_stream WHERE name='$drop_var'") 
//	or die(mysql_error());
    $sql = "select * from photosheet_main inner join photosheet_stream  on photosheet_stream.id = photosheet_main.stream && photosheet_stream.name = '$drop_var'";
$str = "";
    if (isset($_GET["users_inactive"]) and $_GET["users_inactive"] ==1 and isset($_GET["users_active"]) and $_GET["users_active"] ==1 ) {
        
    } elseif (isset($_GET["users_active"]) and $_GET["users_active"] ==1 ) {
        $str = " && photosheet_main.active ='y' ";
    } elseif (isset($_GET["users_inactive"]) and $_GET["users_inactive"] ==1 ) {
        $str = " && photosheet_main.active ='n' ";
    }

    $sql = $sql . $str;
 //   echo $sql;
    $emp_user = mysql_query($sql) or die(mysql_error());

    echo '<select name="tier_two" id="tier_two">
	      <option value=" " disabled="disabled" selected="selected">Choose one</option>';

    while ($drop_2 = mysql_fetch_array($emp_user)) {
        echo '<option value="' . $drop_2['username'] . '">' . $drop_2['username'] . '</option>';
    }

    echo '</select> ';
    //  echo '<input type="submit" name="submit" value="Submit" />';
}

//if (isset($_POST['drop_1'])) {
//    echo $_POST['drop_1'];
//}
//else
//    echo "aaa";


//$query = "";
//if (isset($_POST["date1"]) and isset($_POST["date2"]) and isset($_POST['drop_1']) and isset($_POST['tier_two']))
//
//    $query = mysql_query("select count(*) from tc_timecard where timeIn between '" . $_POST["date1"] . "' and '" . $_POST["date2"] . "' && username = '" . $_POST['tier_two'] . "'");
//
//
//list($result) = mysql_fetch_row($query);
//echo $result;

//echo $query;
?>