<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>gsfgd's Project - Home</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="styles.css" rel="stylesheet" type="text/css" />
    
  </head>
  <body>
    <div id="main">
<div id="maintop"><link href="styles.css" rel="stylesheet" type="text/css" /></div>
<!-- header begins -->
<div id="header">
	
       <div id="logo"><link href="styles.css" rel="stylesheet" type="text/css" /></div>
       <div id="buttons">
		<a href="index.php" title="">Home </a>
		<a href="search.php" title="">Search</a>
		<a href="list.php" title="">List</a>
   		<a href="query.php" title="">Custom Query</a>
	</div>
</div>
      <!-- header ends -->
      <div id="bar"></div>
      <!-- content begins -->
      <div id="content">
        <!-- Tabella contenente le due colonne principali -->
        <table width=65% border=0px style="vertical-align:text-top"> 
          <tr> 
            <!-- BEING LEFT-->
            <td id="table-left">
              <!-- BEING "CERCA TRAMITE TAG" -->
             
             
            </td>
            <!-- END LEFT-->
            <!-- BEING RIGHT (Risultato query) -->
            <td id="table-right" align ="center">
              No operation performed.<br>Please select one or more tag and chose an operation from the available.
                  <form action="cerca.php" method="post">
                  <select name="tabs">
                        <option> drugbank </option>
                        <option> hmdd_disease </option>
                        <option> mirenviroment </option>
                        <option> omim </option>
                        <option> hgnc </option>
                </select>
                  <input type="submit" />
                  </form>
                <?php
                include "db_connect.php";
                    $linea = array();
                    $table = $_POST["tabs"];
                    $query = "SHOW COLUMNS FROM $table";
                   
                    $risultato = mysql_query($query) or die("Query fallita: " . mysql_error() );
                                        
                    echo "<form action=\"query_search.php\" method=\"post\">";
                    echo"<select  name=\"fields\">";
                    $index=count($linea)/2;
                    echo $index."<br>";
                    while($linea = mysql_fetch_assoc($risultato)){
                          echo"<option>".$linea['Field']."</option>";
                    }
                    echo"</select>";
                    echo "<input type=\"submit\" />";
                    echo"</form>";
                    setcookie("table", $table);
                     
               
                 ?>
             </td>
            <!-- END RIGHT (Risultato query) -->
                

          </tr>
        </table>
         
        <!-- Fine Tabella principale -->

      </div>

      <!-- content ends -->

    </div>
  </body>
</html>