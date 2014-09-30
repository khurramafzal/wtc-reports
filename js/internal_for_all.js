/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

        
            $(document).ready(function() {
                $('#dp1').datepicker({
                    format: 'yyyy-mm-dd'
                });
            });


       
            $(document).ready(function() {
                $('#dp2').datepicker({
                    format: 'yyyy-mm-dd'
                });
            });


      
        
        
        
       
   
   
      
            $(document).ready(function() {
                $("a").on("click", function() {
                    var id = $(this).data("section");

                    $("section:visible").fadeOut(function() {
                        $(id).fadeIn();
                    });
                });
            });
     
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



      
            $(function() {
                $('#users_active').change(function() {
                    var showOrHide = $(this).is(':checked');// returns boolean
                    $('#result_1').toggle(showOrHide);
                });

            });
     
            $(function() {
                $('#users_inactive').change(function() {
                    var showOrHide = $(this).is(':checked');// returns boolean
                    $('#result_1').toggle(showOrHide);
                });

            });
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
