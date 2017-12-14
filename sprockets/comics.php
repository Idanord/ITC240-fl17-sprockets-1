<?php include 'includes/config.php'?>
<?php include 'includes/Pager.php'?>
<?php get_header()?>
<h3><?=$config->pageID?></h3>
<?php
    
$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));

$sql = "select * from Comics";      //important to remember
$myPager = new Pager (10, '',$prev,$next,'');
$sql = $myPager->loadSQL($sql,$iConn); #load SQL, pass in existin connections, add offset

$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
if (mysqli_num_rows($result) > 0)//at least one record!
{//show results
    $i = 0;
	while ($row = mysqli_fetch_assoc($result))     //important to remember the while loop
    {
        if ($i % 2 === 0){
	   echo "<p>";
	   echo 'Title: <b><a href="comics_view.php?id=' . $row['ComicID'] . '">' . $row['Title'] . '</a></b>';
       echo '<br>';
	   echo "Publisher: <b>" . $row['Publisher'] . "</b><br />";
	   echo "Issue: <b>" . $row['Issue'] . "</b><br />";
	   /*echo "Discription: <b>" . $row['Discription'] . "</b><br />";*/
	   echo "</p>";
        };
          
    }
     echo $myPager->showNAV();
}else{//no records
	echo '<div align="center">What! No comics?  There must be a mistake!!</div>';
}

//START CODE SNIPPET #2 (goes into list page) -------------- 

echo '<img src="' . $config->virtual_path . '/uploads/customer' . dbOut($row['CustomerID']) . '_thumb.jpg" />';

//END CODE SNIPPET #2 (goes into list page) --------------
        

@mysqli_free_result($result); #releases web server memory
@mysqli_close($iConn); #close connection to database
  
?>
<?php get_footer()?>