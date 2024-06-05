<?php
$file = fopen("https://www.dbooks.org/d/1607826593-1717317244-b2af742bbc21cca4/read/", "r");

//Output lines until EOF is reached
while(! feof($file)) {
  $line = fgets($file);
  echo $line. "<br>";
}

fclose($file);
?>
