<?php
   include('session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<html>
   <head>
       <link rel="stylesheet" href="style.css" type="text/css">
       <link href="https://cdn.muicss.com/mui-0.9.0/css/mui.min.css" rel="stylesheet" type="text/css" />
       <script src="https://cdn.muicss.com/mui-0.9.0/js/mui.min.js"></script>
       <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300' rel='stylesheet' type='text/css'>
       <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1xdGrUiz-ipMCmyFBOhe0Ulbq-wSrd34" type="text/javascript"></script>
       <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
       <script type="text/javascript" src="whatever.js"></script>
       <title>Welcome</title>
   </head>
   
   <body onload="load()" style="background-color:#2a518e">
      <div class="container">
         <div class="header">
            <h1>Welcome <?php echo $login_session; ?></h1>
            <a class="logout" href="logout.php">Sign Out</a>
            <div style="clear: both"></div>
         </div>
         
         <div class="content">
            <form action="createmarker.php" method="post">
                  <div class="left">
                     <table>
                     <tr><td><label for="name">Name:</label></td><td><input type="text" id="name" name="name"></td></tr>
                     <tr><td><label for="address">Address:</label></td><td><input type="text" id="address" name="address"></td></tr>
                     <tr><td><label for="type">Type:</label></td><td>
                     
                     <select name="type">
                        <option value="null">
                           Velg Type:
                        </option>
                        
                        <option value="culture">
                           Culture
                        </option>
                        
                        <option value="buisness">
                           Buisness
                        </option>
                     </select>
                     
                     <tr><td><label for="type">Latitude:</label></td><td><input id="lat" name="lat"></td></tr>
                     <tr><td><label for="type">Longitude:</label></td><td><input id="lng" name="lng"></td></tr>
                     <tr><td><button type="submit" class="mui-btn mui-btn--primary">Post Info</button></td></tr>
                     
                     <input type="hidden" id="id" name="id">
                  </table>   
                  </div>
                  <div class="right">
                     <table>
                     <tr><td><label for="info">Info:</label></td><td>
                     <textarea id="info" name="info"></textarea></td></tr>
                     </table>
                  </div>
            </form>
         </div>     
      </div>
      
      <div id="map"></div>
      
   </body>
</html>
