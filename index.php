<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Webtime clock</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="khurram">
        <meta name="author" content="khurram">

        <!-- Le styles -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.css" rel="stylesheet">


        <link href="css/bootstap.min.css" rel="stylesheet">
        <link href="css/docs.css" rel="stylesheet">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

<!-- Date picker script to display the drop down calender    -->        
        <script>
            $(document).ready(function() {
                $('#dp1').datepicker({
                    format: 'yyyy-mm-dd'
                });
            });


        </script>
        <script>
            $(document).ready(function() {
                $('#dp2').datepicker({
                    format: 'yyyy-mm-dd'
                });
            });


        </script>


        <style type="text/css">

            body {

                padding-top: 60px;
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }

            @media (max-width: 980px) {
                /* Enable use of floated navbar text */
                .navbar-text.pull-right {
                    float: none;
                    padding-left: 5px;
                    padding-right: 5px;
                }

            }
        </style>
        <style>
            section {
                display: none;


            }

            #punctuality_rate { height: auto; background: beige; display: block;} 


        </style>



        <script>
            $(document).ready(function() {
                $("a").on("click", function() {
                    var id = $(this).data("section");

                    $("section:visible").fadeOut(function() {
                        $(id).fadeIn();
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#wait_1').hide();
                $('#drop_1').change(function() {

                    $('#wait_1').show();
                    $('#result_1').hide();
                    $.get("func.php", {
                        func: "drop_1",
                        drop_var: $('#drop_1').val(),
                        users_active: $('#users_active').attr('checked') ? 1 : 0,
                        users_inactive: $('#users_inactive').attr('checked') ? 1 : 0

                    }, function(response) {
                        $('#result_1').fadeOut();
                        setTimeout("finishAjax('result_1', '" + escape(response) + "')", 400);
                    });
                    return false;
                });
            });

            function finishAjax(id, response) {
                $('#wait_1').hide();
                $('#' + id).html(unescape(response));
                $('#' + id).fadeIn();
            }



        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#wait_1').hide();
                $('#users_active').change(function() {

                    $('#wait_1').show();
                    $('#result_1').hide();
                    $.get("func.php", {
                        func: "drop_1",
                        drop_var: $('#drop_1').val(),
                        users_active: $('#users_active').attr('checked') ? 1 : 0,
                        users_inactive: $('#users_inactive').attr('checked') ? 1 : 0

                    }, function(response) {
                        $('#result_1').fadeOut();
                        setTimeout("finishAjax('result_1', '" + escape(response) + "')", 400);
                    });
                    return false;
                });
            });

            function finishAjax(id, response) {
                $('#wait_1').hide();
                $('#' + id).html(unescape(response));
                $('#' + id).fadeIn();
            }



        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#wait_1').hide();
                $('#users_inactive').change(function() {

                    $('#wait_1').show();
                    $('#result_1').hide();
                    $.get("func.php", {
                        func: "drop_1",
                        drop_var: $('#drop_1').val(),
                        users_active: $('#users_active').attr('checked') ? 1 : 0,
                        users_inactive: $('#users_inactive').attr('checked') ? 1 : 0

                    }, function(response) {
                        $('#result_1').fadeOut();
                        setTimeout("finishAjax('result_1', '" + escape(response) + "')", 400);
                    });
                    return false;
                });
            });

            function finishAjax(id, response) {
                $('#wait_1').hide();
                $('#' + id).html(unescape(response));
                $('#' + id).fadeIn();
            }



        </script>

        <script>
            $(function() {
                $('#users_active').change(function() {
                    var showOrHide = $(this).is(':checked');// returns boolean
                    $('#result_1').toggle(showOrHide);
                });

            });
        </script>
        <script>
            $(function() {
                $('#users_inactive').change(function() {
                    var showOrHide = $(this).is(':checked');// returns boolean
                    $('#result_1').toggle(showOrHide);
                });

            });
        </script>



        <style type="text/css">
            table.imagetable {
                font-family: verdana,arial,sans-serif;
                font-size:11px;
                color:#333333;
                border-width: 1px;
                border-color: #999999;
                border-collapse: collapse;
                margin-top: 20px;
            }
            table.imagetable th {
                background:#b5cfd2 url('cell-blue.jpg');
                border-width: 1px;
                padding: 8px;
                border-style: solid;
                border-color: #999999;
            }
            table.imagetable td {
                background:#dcddc0 url('cell-grey.jpg');
                border-width: 1px;
                padding: 8px;
                border-style: solid;
                border-color: #999999;
            }

        </style>
    </head>
    <body>

        <?php
        require_once('auth.php');
        error_reporting(0);
        error_reporting(E_ALL & ~E_NOTICE | ~E_WARNING);
        include 'connection.php';
        include('func.php');
        ?> 

        <div class="navbar navbar-search navbar-fixed-top">
            <div class="navbar-inverse">
                <div class="container-fluid">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" >PMP Webtime clock</a>
                    <div class="nav-collapse collapse">

                        <ul class="nav">
                            <li class="active"><a href="http://www.thepmp.ca/pmp/">Home</a></li>
                            <li class="active"><a href="loginpage.php">Login Page</a></li>
                            <li class="active"><a href="http://www.thepmp.ca/pmp/contact.php">Contact</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="span2">
                    <div class="well sidebar-nav"> 
                        <h1><img src="img/footer.jpg" width="150" height="150" alt="Bell PMP Web Time Clock"></h1>
                        <ul class="nav nav-list">

                            <li class="nav-header">Webtime clock</li>



                            <li class ="active"><a href="#" data-section="#punctuality_rate">Highest punctuality Rate</a></li>
                            <li class ="active"><a href="loginpage.php" >Logout</a></li>


                        </ul>
                    </div><!--/.well -->
                </div><!--/span-->

                <div class="span9">


                    <h3>Webtime clock Details</h3>
                    <div class="jumbotron row-fluid"> 
                        <div class="span12">               

                            <div><section id="associate_name">Enter The Name of Associate

                                    <form class="form-search">
                                        <input type="text" class="input-medium search-query" id="txt1" onkeyup="showUser(this.value)">
                                        <input type="submit" class="btn" id="name-submit" value='grap'>
                                        <p>Suggestions: <span id="txtHint"></span></p> 
                                        <div id="name-data"></div>
                                    </form>

                                </section>

                                <section id="punctuality_rate">All Departments



                                    <form action="" method ="post" name =" form1">

                                        <input type="checkbox" name="users_active" id="users_active"  value="active"> Active users <br>
                                        <input type="checkbox" name="users_inactive" id="users_inactive" value="inactive">  Inactive users

                                        <p> 
                                            <select name="drop_1" id="drop_1" >

                                                <option value="" selected="selected" disabled="disabled">Select the departments</option>

                                                <?php getTierOne(); ?>

                                            </select> 

                                            <span id="wait_1" style="display: none;">
                                                <img alt="Please Wait" src="ajax-loader.gif"/>
                                            </span>
                                            <span id="result_1" style="display: none;"></span> 
                                        </p>



                                        <div > Select the Range of dates </div>
                                        <input name="date1" type="text" id="dp1"  value="<?php echo $_POST['date1'] ?>" >
                                        <input name="date2" type="text" id="dp2" value="<?php echo $_POST['date2'] ?>">
                                        <input name="submit" type="submit">
                                        <p>To get the updated data Please Submit first before downloading the file</p>
                                        <br>
                                        <input type="button" value="Download The Excel File" onClick= "window.location.href = 'PMP_Attendance.xlsx'">

                                    </form>                                     

                   <?php
                                    error_reporting(E_ALL & ~E_NOTICE | E_WARNING);
                                    if (isset($_POST['submit'])) {
                                        $drop = $_POST['drop_1'];
                                        $tier_two = $_POST['tier_two'];
                                        $date1 = $_POST['date1'];
                                        $date2 = $_POST['date2'];

                                        //    echo "   <div class='table-scrollable'> ";
                                        echo "<table class='imagetable'>";
                                        echo "<tr>";
                                        echo "<th>" . "Department Name" . "</th>";


                                        echo "<th>" . "Associate Name" . "</th>";
                                        echo "<th>" . "Average Late By " . "</th>";

                                        echo "<th>" . "Came before 09:00Am " . "</th>";
                                        echo "<th>" . "Came b/t 09:00Am to 09:09Am " . "</th>";
                                        echo "<th>" . "Total days Late " . "</th>";
                                        echo "<th>" . "Total Working Days " . "</th>";

                                        echo "</tr>";

//---------------------------------------- DEPARTMENT NAME & EMPLOYE NAME -----------------------------------------------------------                                                                                                    

                                        echo "<td>" . $drop . "</td>";



                                        echo "<td>" . $tier_two . "</td>";

// ---------------------------------------- CALCULATE PERCENTAGE Overall Employees --------------------------------------------------------------------                                                    


                                        if ($result_total_users1 == 0) {
                                            echo "<td>" . '0 value' . "</td>";
                                        } else {
                                            $percentageLate = ($result_A_dept / $result_total_users1) * 100;
                                            echo "<td>" . (round($percentageLate)) . "%" . "</td>";
                                        }

                                        $excel_dis_av = round($percentageLate);


//------------------------------------------ Calculate percentage before 09:00 AM  ---------------------------------------------------------------------------------------------




                                        if ($result_total_users1 == 0) {
                                            echo "<td>" . '0 value' . "</td>";
                                        } else {
                                            $perc_B_Nine = ($result_b_nine / $result_total_users1) * 100;
                                            echo "<td>" . (round($perc_B_Nine)) . "%" . "</td>";
                                        }
                                        $excel_dis_before = round($perc_B_Nine);

//------------------------------------------ Calculate percentage between 09:00 AM to 09:09 AM  ---------------------------------------------------------------------------------------------




                                        if ($result_total_users1 == 0) {
                                            echo "<td>" . '0 value' . "</td>";
                                        } else {
                                            $perc_Bt_Nine = ($result_bt_nine / $result_total_users1) * 100;
                                            echo "<td>" . (round($perc_Bt_Nine)) . "%" . "</td>";
                                            $testing1 = round($perc_Bt_Nine);
                                        }
                                        $excel_dis_bt = round($perc_Bt_Nine);



//------------------------------------------ Total Days Late  ---------------------------------------------------------------------------------------------
                                        if ($result_total_users1 == 0) {
                                            echo "<td>" . '0 value' . "</td>";
                                        } else {
                                            echo "<td>" . $result_A_dept . " " . "Days" . "</td>";
                                        }
                                        $excel_dis_t_days = $result_A_dept;

//------------------------------------------ Total working days  ---------------------------------------------------------------------------------------------                                                    

                                        if ($result_total_users1 == 0) {
                                            echo "<td>" . '0 value' . "</td>";
                                        } else {
                                            echo "<td>" . $result_total_users1 . " " . "Days" . "</td>";
                                        }


                                        echo "</table>";
                                        $excel_dis_t_users = $result_total_users1;


//------------------------------------------ Average department Attendence --------------------------------------------------------------                                                 
                                        //      echo   " <div id='dept'>";

                                        echo "<table class='imagetable'>";
                                        echo "<tr>";
                                        echo "<th>" . "Department Name" . "</th>";
                                        echo "<th>" . "Average Late By " . "</th>";
                                        echo "<th>" . "Came before 09:00Am " . "</th>";
                                        echo "<th>" . "Came b/t 09:00Am to 09:09Am " . "</th>";


                                        echo "</tr>";

//---------------------------------------- DEPARTMENT NAME & EMPLOYE NAME -----------------------------------------------------------                                                                                                    

                                        echo "<td>" . $drop . "</td>";


// ---------------------------------------- CALCULATE PERCENTAGE Overall Employees --------------------------------------------------------------------                                                    



                                        if ($result_Tusers_dept == 0) {
                                            echo "<td>" . '0 value' . "</td>";
                                        } else {
                                            $percentageLate = ($result_Avdept / $result_Tusers_dept) * 100;
                                            echo "<td>" . (round($percentageLate)) . "%" . "</td>";
                                        }
                                        $excel_dep_avg = round($percentageLate);


//------------------------------------------ Calculate percentage before 09:00 AM  ---------------------------------------------------------------------------------------------




                                        if ($result_Tusers_dept == 0) {
                                            echo "<td>" . '0 value' . "</td>";
                                        } else {
                                            $perc_Bd_Nine = ($result_bnine_dept / $result_Tusers_dept) * 100;
                                            echo "<td>" . (round($perc_Bd_Nine)) . "%" . "</td>";
                                        }
                                        $excel_dept_before = round($perc_Bd_Nine);
//------------------------------------------ Calculate percentage between 09:00 AM to 09:09 AM  ---------------------------------------------------------------------------------------------




                                        if ($result_Tusers_dept == 0) {
                                            echo "<td>" . '0 value' . "</td>";
                                        } else {
                                            $perc_BtNine_dept = ($result_btnine_dept / $result_Tusers_dept) * 100;
                                            echo "<td>" . (round($perc_BtNine_dept)) . "%" . "</td>";
                                        }
                                        $excel_dept_bt = round($perc_BtNine_dept);

//------------------------------------------ Total Days Late  ---------------------------------------------------------------------------------------------
                                        if ($result_Tusers_dept == 0) {
                                            echo "<td>" . '0 value' . "</td>";
                                        } else {
                                            //     echo "<td>" . $result_Avdept . " " . "Days" . "</td>";
                                        }

//------------------------------------------ Total working days  ---------------------------------------------------------------------------------------------                                                    

                                        if ($result_Tusers_dept == 0) {
                                            echo "<td>" . '0 value' . "</td>";
                                        } else {
                                            //   echo "<td>" . $result_Tusers_dept . " " . "Days" . "</td>";
                                        }




                                        echo "</table>";


                                        echo "<table class='imagetable'>";
                                        echo "<tr>";
                                        echo "<th>" . "Average Late Percentage of PMP including All departments" . "</th>";
                                        echo "</tr>";



                                        if ($result_Tusers_dept == 0) {
                                            //   echo 'your selected Associate is not in the database';
                                        } else {
                                            $percentageLate_All = ($total_all_avg / $total22) * 100;
                                            echo "<td>" . "Date  From  " . " " . $date1 . " " . "To" . " " . $date2 . " " . "is" . " " . (round($percentageLate_All)) . "%" . "</td>";
                                            //    echo "<td>".  . "%" . "</td>";
                                        }
                                        $excel_avDept_all = round($percentageLate_All);

//------------------------------------------Excel conversion data --------------------------------------------------------------------------------                                              
                                        require_once '/Classes/PHPExcel.php';
                                        require_once '/Classes/PHPExcel/IOFactory.php';


// Instantiate a new PHPExcel object
                                        $objPHPExcel = new PHPExcel();
// Set the active Excel worksheet to sheet 0
                                        $objPHPExcel->setActiveSheetIndex(0);





                                        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);


                                        $objRichText = new PHPExcel_RichText();






// Bold the rows and set Auto size ------------------------------------------------------------------------------------------------------------- 
                                        $rowCount = 1;
                                        $objPHPExcel->getActiveSheet()->getStyle("C3:D3")->getFont()->setBold(true);
                                        $objPHPExcel->getActiveSheet()->getStyle("B6:G6")->getFont()->setBold(true);
                                        $objPHPExcel->getActiveSheet()->getStyle("B9:G9")->getFont()->setBold(true);
                                        $objPHPExcel->getActiveSheet()->getStyle("B12")->getFont()->setBold(true);

                                        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                                        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                                        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                                        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                                        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                                        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                                        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                                        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                                        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);


// Same Dates selected from the web page for specific user -------------------------------------------------------------------------------------------------------------                                               
                                        $rowCount = 3;
                                        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, 'Start Date ');
                                        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, 'End Date');
                                        $rowCount = 4;
                                        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $_POST['date1']);
                                        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $_POST['date2']);



// Associates and employers details (Average attendendance ) ---------------------------------------------------------------------------------------------------------------------------------                                                   
                                        $rowCount = 6;
                                        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, 'Associate Name');
                                        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, 'Associate Late By');
                                        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, 'Came before 09:00Am');
                                        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, 'Came b/t 09:00Am to 09:09Am');
                                        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, 'Total days Late');
                                        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 'Total Working Days');


                                        $rowCount = 7;



                                        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $tier_two);
                                        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $excel_dis_av . '%');
                                        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $excel_dis_before . '%');
                                        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $excel_dis_bt . '%');
                                        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $excel_dis_t_days);
                                        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $excel_dis_t_users);

// Selected department details Average attendendance ---------------------------------------------------------------------------------------------------------------------------------    

                                        $rowCount = 9;
                                        //     $objPHPExcel->getActiveSheet()->getStyle("B3")->getFont()->setBold(true);
                                        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, 'Department Name');
                                        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, 'Average Department Late By');

                                        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, 'Came before 09:00Am');
                                        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, 'Came b/t 09:00Am to 09:09Am');


//    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);

                                        $rowCount = 10;
                                        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $drop);
                                        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $excel_dep_avg . '%');
                                        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $excel_dept_before . '%');
                                        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $excel_dept_bt . '%');

                                        $rowCount = 12;

                                        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, 'All PMP Departments Percentage');

                                        $rowCount = 13;
                                        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $excel_avDept_all . '%');




// Increment the Excel row counter
                                        $rowCount++;

// Instantiate a Writer to create an OfficeOpenXML Excel .xlsx file
                                        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
// Write the Excel file to filename some_excel_file.xlsx in the current directory
                                        $objWriter->save('PMP_Attendance.xlsx');

//include 'ExcelConvert.php';
                                    }
                                    ?>

                                </section>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>









        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->




        <script>
            function showUser(str)
            {
                if (str == "")
                {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                }
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "getuser.php?q=" + str, true);
                xmlhttp.send();
            }
        </script>

        <script src="js/bootstrap-list.js"></script>
        <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
        <script src="js/global.js"></script>

        <script src="js/jquery.js"></script>
        <script src="js/jquery.min.js"></script>

        <script src="js/bootstrap-dropdown.js"></script>
        <script src="js/bootstrap-scrollspy.js"></script>

        <script src="js/bootstrap-datepicker.js"></script>

    </body>
</html>