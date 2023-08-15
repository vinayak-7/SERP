<!DOCTYPE html>
 <html>
  <head>
   <title> Search Engine Result Page </title>
   <style>
    body
     { background-color: orange; }
    #logo
     { border-radius: 50px;
       border: 15px solid blue; }
    #shortkey
     { background-color: black;
       border-radius: 50px;
       border: 10px solid yellow; }
    #shortkey img
     { margin: 40px;
       border-radius: 10px;
       border: 6px solid cyan;
       opacity: 0.6; }
    #shortkey img:hover
     { opacity: 1; }
    #surfing
     { margin: 30px;
       padding: 30px 30px 30px 30px;
       border: 10px solid red;
       font-size: 30px; }
    #surfgo
     { width: 100px;
       height: 35px;
       border-radius: 10px;
       border: 1px solid blue;
       background-color: white;
       font-size: 18px; }
    #surfgo:hover
     { width: 100px;
       height: 35px;
       color: white;
       border-radius: 10px;
       border: 1px solid blue;
       background-color:blue;
       font-size: 18px; }
    #pics
     { border-radius: 30px; 
       border: 10px solid lightgreen; }
    #result
     { border-radius:30px;
       background-color: black;
       border: 7px solid yellow; }
    #title
     { font-size: 50px; 
       color: cyan; }
   </style>
  </head>
  <body>
   <form action="" method="GET" >
    <center>
     <a href="index.php"><img id="logo" src="pic_logo.jpeg" width="50%"></a><br><br>
     <div id="shortkey">
      <a href="https://www.facebook.com/"> <img src="facebook_logo.jpg" width="70" height="70"> </a>
      <a href="https://www.gmail.com/"> <img src="gmail_logo.jpg" width="70" height="70"> </a>
      <a href="https://www.youtube.com/"> <img src="youtube_logo.jpg" width="70" height="70"> </a>
      <a href="https://maps.google.co.in"> <img src="maps_logo.jpg" width="70" height="70"> </a>
      <a href="https://www.wikipedia.org/"> <img src="wikipedia_logo.jpg" width="70" height="70"> </a>
     </div>
     <input type="text" name="search" placeholder="type to surf the web..." size="50" id="surfing"><br><br>
     <input type="submit" name="searchbtn" value="GO!" id="surfgo">
    </center>
    <table border="0" style="margin-left: 100px;">
     <tr>
      <?php
        include ("connection.php");
        if (isset($_GET['searchbtn'])) 
        {
	 $search = $_GET['search'];
         if ($search=="")
	 {
	  echo "Please Write something in search box";
	  exit();
	 }
	 $query = "select * from add_website where website_keywords like '%$search%'";
	 $data = mysqli_query($conn,$query);
	 if (mysqli_num_rows($data)<1)
	 {
	  echo "No Result Found";
	  exit();
	 }
	 echo "<h2 style='margin-left:105px'>SEARCH RESULTS</h2>";
	 while ($row = mysqli_fetch_array($data)) 
	 {
	  echo "
	  <tr>
	   <img src='$row[4]' style='margin-left:105px' width='250px' height='200px' id='pics'>
	  </tr>";
	 }            
         $query1 = "select * from add_website where website_keywords in ('$search')";
	 $data1 = mysqli_query($conn,$query1);
	 while($row1 = mysqli_fetch_array($data1))
	 {
	  echo 
	  "
	  <tr>
	   <td>
            <div id='result'>
	     <a href='$row1[1]' id='title'>$row1[0]</a><br>";
	     echo "<font size='6' color='lightgreen'>$row1[1]</font><br>";
	     echo "<font size='6' color='white'>$row1[3]</font><br><br>
            </div>
           </td>
	  </tr>";
	 }
	}
	else
	{	
	}
      ?>
     </tr>
    </table>
   </form>
  </body>
 </html>