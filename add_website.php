<!DOCTYPE html>
 <html>
  <head>
   <title> Website Adding Portal </title>
   <style>
    body 
     { background-image: url('web_bg.jfif');
       background-repeat: no-repeat;
       background-attachment: fixed;
       background-size: 100% 100%; }
    input 
     { width: 400px;
       height: 35px;
       border: 1px solid blue;
       border-radius: 5px;
       background-color: white;
       color: blue; }
    #addbtn 
     { width: 100px;
       height: 35px;
       border: 1px solid blue;
       border-radius: 5px;
       background-color: white;
       color: skyblue;
       font-size: 20px; }
    #cancelbtn 
     { width: 100px;
       height: 35px;
       border: 1px solid blue;
       border-radius: 5px;
       background-color: white;
       color: blue;
       font-size: 20px; }
     #addbtn:hover 
      { background-color: skyblue;
        color: white; }
     #cancelbtn:hover
      { background-color: blue;
        color: white; } 
     #desc 
      { width: 500px;
        height: 100px; }
    </style>
   </head>
   <body>
    <font size="7"><b><p align="center">ADD A WEBSITE</p></b></font>
    <form action="" method="POST" enctype="multipart/form-data">
        <table border="0" width="60%" align="center" cellspacing="10">
            <tr>
                <td>Website Title</td>
                <td><input type="text" name="websitetitle"></td>
            </tr>
            <tr>
                <td>Website Link</td>
                <td><input type="text" name="websitelink"></td>
            </tr>
            <tr>
                <td>Website Keywords</td>
                <td><input type="text" name="websitekeywords"></td>
            </tr>
            <tr>
                <td>Website Description</td>
                <td><textarea name="websitedescription" id="desc"></textarea>
                </td>
            </tr>
            <tr>
                <td>Website Images</td>
                <td><input type="file" name="uploadfile"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="addwebsite" id="addbtn"> &nbsp;
                    <input type="reset" name="addwebsite" id="cancelbtn">
                </td>
            </tr>
        </table>
    </form>
   </body>
  </html>

<?php
include("connection.php");
if ($_POST['addwebsite']) 
{
    $website_title = $_POST['websitetitle'];
    $website_link = $_POST['websitelink'];
    $website_keywords = $_POST['websitekeywords'];
    $website_description = $_POST['websitedescription'];
    $filename=$_FILES["uploadfile"]["name"];
    $tempname=$_FILES["uploadfile"]["tmp_name"];
    $folder="website_images/".$filename;
    move_uploaded_file($tempname,$folder);

    if ($website_title!="" && $website_link!="" && $website_keywords!="" && $website_description!="" && $filename!="" ) 
    { 
        $query = "INSERT INTO add_website values ('$website_title','$website_link','$website_keywords','$website_description','$folder')";
        $data = mysqli_query($conn,$query);

        if ($data) 
        {
            echo "<script>alert('Website Inserted')</script>";
        }
    }
    else{
            echo "<script>alert('Failed')</script>";
        }
}
?>