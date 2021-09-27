<?php
 echo "Welcome to EasyPay!\n"."<br>";
 $dbhost = 'mysql-0.mysql:3306'; # db service name
 $dbhost_read = 'mysql-read:3306'; # db service name
 $dbuser = 'root';
 $dbpass = '';
 $dbname = 'wallet_db';
 $conn = new mysqli("$dbhost",$dbuser,$dbpass,$dbname);
 if ($conn->connect_error)
   { die('Could not connect to wallet_db: ' . $conn->connect_error);}

 $conn_read = new mysqli("$dbhost_read",$dbuser,$dbpass,$dbname);
 if ($conn_read->connect_error)
   { die('Could not connect to wallet_db: ' . $conn_read->connect_error);}

 $sql = "update wallet set dollar_amount = dollar_amount + 100";
 $retval = mysqli_query($conn,$sql);

 if (! $retval){ die('Could not add money to wallet: ' . mysqli_error($conn));}

 $sql = "select * from wallet";
 $retval1 = mysqli_query($conn_read,$sql);
 if (! $retval1){ die('Could not select money from wallet: ' . mysqli_error($conn_read));}

 $row = mysqli_fetch_row($retval1);
 echo "\n$100 will be added to your wallet with every page refresh!\n"."<br>";

# while ($row = mysqli_fetch_row($retval1))
 echo "\nTotal money in the wallet: ".$row[0]."<br>";

 $conn->close();
 $conn_read->close();

 #Generate some load
 $x = 0.0001;
 for ($i = 0; $i <= 100000000; $i++) {
   $x += sqrt($x);
 }
 echo "Resource intensive computation done."."<br><br>";
?>