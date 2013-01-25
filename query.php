<!DOCTYPE HTML>
<html>
<head>
  <title>CS143 Project 1B</title>
  <style type="text/css">
  html {
    text-align: center;
  }
  p {
    text-align: center;
  }
  table {
    border-width: 1px;
    border-style: solid;
    border-color: black;
    text-align: center; 
    margin: 0px auto;
  }
  td {
    border-width: 1px;
    border-style: solid;
    border-color: black;
    padding: 2px 5px;
  }
  </style>
</head>
<body>
  <h1> MySQL Web Query Interface </h1>
  <p>
    <form method="GET">
      <textarea action="." name="query" cols="60" rows="8">
<?php
echo $_GET["query"];
?>
</textarea>
      <br />
      <input type="submit" value="Submit" />
    </form>
  </p>
    <?php

      function error($msg) {
        print "<b>" . $msg . "</b>\n";
        exit();
      }

      // Check for input
      $input_query = $_GET["query"]; 
      if (strlen($input_query) < 1)
       exit(); 

      // Connect to MySQL Database
      $db_connection = mysql_connect("localhost", "cs143", ""); 
      if (!$db_connection) {
        error("ERROR Could not make a connection to host");
      }

      $select = mysql_select_db('CS143', $db_connection);
      if (!$select) {
        error("ERROR Could not connect to database");
      }

      // Get Query
      $input_query = mysql_real_escape_string( $input_query );
      if (!$input_query) {
        error("ERROR: Could not sanitize input");
      }
      $result_query = mysql_query($input_query, $db_connection);
      if (!$result_query) {
        error("ERROR: Could not understand query");
      }

      print "<h2>Results</h2>\n";
      print "<p>\n";

      $num_fields = mysql_num_fields($result_query);
      $num_rows = mysql_num_rows($result_query);

      print "<table>\n";
      // Print fields
      print "<tr>";
      for($i = 0; $i < $num_fields; $i++) {
        print "<td><b>" . mysql_field_name($result_query, $i) . "</b></td>";
      }
      print "</tr>\n";
      // Print table contents 
      for($i = 0; $i < $num_rows; $i++) {
        $row = mysql_fetch_row($result_query);
        print "<tr>";
        for($j = 0; $j < $num_fields; $j++) {
          print "<td>" .$row[$j]. "</td>";
        }
        print "</tr>\n";
      }
      print "</table>\n";

      $closed = mysql_close($db_connection);
      if (!$closed) {
        error("ERROR: Couldd not close connection to host");
      }
      print "\n</p>\n";
    ?>
</body>
</html>
