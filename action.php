<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RESULTS</title>
    <link rel="stylesheet" href="action.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="head">
        <h1>RESULTS</h1>
      </div>

<h1>
    <?php
   $server= "localhost";
   $user="id10190582_job";
   $pass="admin";
   $db="id10190582_job.Jobs";

   $s1=isset($_GET["s1"]) ? $_POST["s1"] : "";
   $s2=isset($_POST["s2"]) ? $_POST["s2"] : "";
   $s3=isset($_POST["s3"]) ? $_POST["s3"] : "";
   $s4=isset($_POST["s4"]) ? $_POST["s4"] : "";
   $experience=isset($_POST["experience"]) ? $_POST["experience"] : "";
   $pl=isset($_POST["pl"]) ? $_POST["pl"] : "";
   $p10=isset($_POST["p10"]) ? $_POST["p10"] : "";
   $p12=isset($_POST["p12"]) ? $_POST["p12"] : "";
   $tier=isset($_POST["tier"]) ? $_POST["tier"] : "";

   $connect=new mysqli($server,$user,$pass);

   if(!$connect)
    {
      die("Connection to Database Failed");
    }
    else
    {

  $sql="SELECT Company,skills,preferred,url FROM id10190582_job.Jobs WHERE (skills='$s1' OR skills='$s2' OR skills='$s3' OR skills='$s4') AND experience<=$experience  AND p10<=$p10 AND p12<=$p12 AND tier>=$tier";
  $result=$connect->query($sql);
  if (!$result) {
    trigger_error('Invalid query: ' . $connect->error);
  }
  if($result->num_rows >0)
{
 while($row=$result->fetch_assoc())
     {
      // echo "Company: ". $row["Company"]."<br/>";
      // echo "Skills: ".$row["skills"]."<br/>";
      // echo "Location: ".$row["preferred"]."<br/>";
      // echo "============================================";
      echo '<div class="card" style="width: 18rem;">
      <div class="card-body">
      <h5 class="card-title">' $row["Company"] '</h5>
      <h6 class="card-subtitle mb-2 text-muted">Skills Required : '.$row["skills"].'</h6>
      <p class="card-text">Location:'.$row["preferred"].'</p>
      <a href="'.$row["url"].'" class="card-link">Learn More</a>
      </div>
      </div>';
}
 else
 echo "0 Results :(";
    }
     ?>
  </h1>
   </body>
 </html>
