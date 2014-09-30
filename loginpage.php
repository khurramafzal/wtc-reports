<!DOCTYPE html>
<html lang="en">
    <head>
        
      <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
      
  
        <link href="css/bootstap.min.css" rel="stylesheet">
        <link href="css/docs.css" rel="stylesheet">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
        
    </head>

<body>

    <?php
    error_reporting(0);
    
  include 'connection.php';


//Start session
	session_start();	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
    
      <div class="container">
     <div class="jumbotron row-fluid">
           
                <div class="span12">
                    <div class="well sidebar-nav"> 
                        <h1><img src="img/footer.jpg" align="center" width="150" height="150" alt="Bell PMP Web Time Clock"></h1>
                        <ul class="nav nav-list">

                            <li class="nav-header">Admin Login</li>

                          
                         
                          



                        </ul>
                 
    
    <form class="form-horizontal" name="loginform" action="login_exec.php" method="post">
        
        <div class="control-group">
<table width="309" border="0" align="center" cellpadding="2" cellspacing="5">
  <tr>
    <td colspan="2">
		<!--the code bellow is used to display the message of the input validation-->
		 <?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
			echo '<ul class="err">';
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<li>',$msg,'</li>'; 
				}
			echo '</ul>';
			unset($_SESSION['ERRMSG_ARR']);
			}
		?>
	</td>
  </tr>
  <tr>
    <td width="116"><div align="right">Username</div></td>
    <td width="177"><input  name="username" type="text" /></td>
  </tr>
  <tr>
    <td><div align="right">Password</div></td>
    <td><input name="password" type="password" /></td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    <td><input name="" type="submit" value="login" /></td>
  </tr>
</table>
</form>
       </div><!--/.well -->
                </div><!--/span-->

    </div>
      </div>   
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
