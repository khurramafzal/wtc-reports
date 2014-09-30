<!DOCTYPE html>
<html>
    <body>

        <?php
        error_reporting(0);
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $db = 'webtimeclock';

        $conn = mysql_connect($dbhost, $dbuser, $dbpass);
        mysql_select_db($db);

        $drop = $_POST['drop_1'];
        $tier_two = $_POST['tier_two'];
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];
//CALCULATE PERCENTAGE Overall Employees ---------------------------------
        $query_total_users1 = mysql_query("select count(*) as NumberOfOrders from tc_timecard 
                                                      inner join photosheet_main ON tc_timecard.userid = photosheet_main.pmpid && photosheet_main.username ='$tier_two'
                                                            && timeIn between '$date1' and '$date2' ");
        list($result_total_users1) = mysql_fetch_row($query_total_users1);


        $query_A_dept = mysql_query("select count(*) as NumberOfOrders from tc_timecard 
                                                           inner join photosheet_main on tc_timecard.userid = photosheet_main.pmpid && time(tc_timecard.timeIn) > '09:00:00' 
                                                           && photosheet_main.username = '$tier_two'
                                                            && timeIn between '$date1' and '$date2'");
        list($result_A_dept) = mysql_fetch_row($query_A_dept);



//Calculate percentage before 09:00 AM ---------------------------------

        $query_b_nine = mysql_query("select count(*) as NumberOfOrders from tc_timecard 
                                                           inner join photosheet_main on tc_timecard.userid = photosheet_main.pmpid && time(tc_timecard.timeIn) <= '09:00:00' 
                                                           && photosheet_main.username ='$tier_two'
                                                            && timeIn between '$date1' and '$date2'");
        list($result_b_nine) = mysql_fetch_row($query_b_nine);
//Calculate percentage between 09:00 AM to 09:09 AM ---------------------------------
        $query_bt_nine = mysql_query("select count(*) as NumberOfOrders from tc_timecard 
                                                           inner join photosheet_main on
                                                           tc_timecard.userid = photosheet_main.pmpid && time(tc_timecard.timeIn) > '09:00:00' 
                                                           && time(tc_timecard.timeIn) <= '09:10:00'
                                                           && photosheet_main.username = '$tier_two'
                                                            && timeIn between '$date1' and '$date2'");
        list($result_bt_nine) = mysql_fetch_row($query_bt_nine);





//CALCULATE PERCENTAGE Overall Employees (Overall specific departments) --------------------------
        $query_Tuser_dept = mysql_query("select count(*) as NumberOfOrders from tc_timecard
                                                 inner join photosheet_main ON tc_timecard.userid = photosheet_main.pmpid
                                                 inner join photosheet_stream ON photosheet_main.stream = photosheet_stream.id
                                                 && photosheet_stream.name ='$drop'
                                                        && timeIn between '$date1' and '$date2'");
        list($result_Tusers_dept) = mysql_fetch_row($query_Tuser_dept);


        $query_Avdept = mysql_query("select count(*) as NumberOfOrders from tc_timecard 
                                                      inner join photosheet_main ON tc_timecard.userid = photosheet_main.pmpid
                                                      inner join photosheet_stream ON photosheet_main.stream = photosheet_stream.id
                                                        && time(tc_timecard.timeIn) > '09:00:00'
                                                        && photosheet_stream.name = '$drop'
                                                        && timeIn between '$date1' and '$date2'");
        list($result_Avdept) = mysql_fetch_row($query_Avdept);

//Calculate percentage before 09:00 AM (Overall specific departments) ----------------------------------------
        $query_bnine_dept = mysql_query("
                                                  select count(*) as NumberOfOrders from tc_timecard 
                                                   inner join photosheet_main ON tc_timecard.userid = photosheet_main.pmpid
                                                    inner join photosheet_stream ON photosheet_main.stream = photosheet_stream.id
                                                     && time(tc_timecard.timeIn) <= '09:00:00'
                                                      && photosheet_stream.name = '$drop'
                                                        && timeIn between '$date1' and '$date2'");
        list($result_bnine_dept) = mysql_fetch_row($query_bnine_dept);
//Calculate percentage between 09:00 AM to 09:09 AM (Overall specific departments) -----------------------------------

        $query_btnine_dept = mysql_query("select count(*) as NumberOfOrders from tc_timecard 
                                                inner join photosheet_main ON tc_timecard.userid = photosheet_main.pmpid
                                                 inner join photosheet_stream ON photosheet_main.stream = photosheet_stream.id
                                                  && time(tc_timecard.timeIn) between '09:00:00' and '09:10:00'
                                                   && photosheet_stream.name ='$drop'
                                                        && timeIn between '$date1' and '$date2'");
        list($result_btnine_dept) = mysql_fetch_row($query_btnine_dept);


//---------------- Department Average ----------------------------------------

        $q = "select name from photosheet_stream";
        $result = mysql_query($q);
        $total22 = 0;
        while ($row22 = mysql_fetch_array($result)) {
//            printf("ID: %s  Name: %s", $row["id"], $row["name"]);

            $q2 = "select count(*) as NumberOfOrders from tc_timecard 
inner join photosheet_main ON tc_timecard.userid = photosheet_main.pmpid
inner join photosheet_stream ON photosheet_main.stream = photosheet_stream.id
&& photosheet_stream.name = '" . $row22["name"] . "'
    && timeIn between '$date1' and '$date2'";


            $result2 = mysql_query($q2);
            while ($row22 = mysql_fetch_array($result2)) {

                $total22+=$total22 + $row22["NumberOfOrders"];
            }
        }



//---------------- All Dept Average ----------------------------------------

        $Query_Avg_all = "select name from photosheet_stream";
        $result_avg_all = mysql_query($Query_Avg_all);
        $total_all_avg = 0;
        while ($row_all = mysql_fetch_array($result_avg_all)) {
//            printf("ID: %s  Name: %s", $row["id"], $row["name"]);

            $Query_Avg_all2 = "select count(*) as NumberOfOrders from tc_timecard 
inner join photosheet_main ON tc_timecard.userid = photosheet_main.pmpid
inner join photosheet_stream ON photosheet_main.stream = photosheet_stream.id
&& time(tc_timecard.timeIn) > '09:00:00'
&& photosheet_stream.name =  '" . $row_all["name"] . "'
   && timeIn between '$date1' and '$date2' ";


            $result_avg_all2 = mysql_query($Query_Avg_all2);
            while ($row_all = mysql_fetch_array($result_avg_all2)) {

                $total_all_avg+=$total_all_avg + $row_all["NumberOfOrders"];
            }
        }
        ?>

    </body>
</html>