<?php  include('action/actionsWeatherApp.php'); ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Japan Weather</title>
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
<div style="margin:10px auto 0 auto; max-width:600px;">


<form method="POST" action="/index.php">
  <div class="form-group">
    <label for="city">City :</label>
	<select name="location" class="form-control" id="citySel">
      <option value="Tokyo">Tokyo</option>
      <option value="Yokohama">Yokohama</option>
      <option value="Kyoto">Kyoto</option>
      <option value="Osaka">Osaka</option>
      <option value="Sapporo">Sapporo</option>
      <option value="Nagoya">Nagoya</option>
  </select>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>

<div style="padding-top:10px;">
<?php 
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
       
        $actions = new ActionsWeatherApp();
        $items = $actions->getWeather();
        $firstItem = true;
        echo '<div class="accordion" id="accordionExample">';
       
        foreach($items as $date => $details){
            echo "<div class='card'>
                    <div class='card-header' id='heading$date'>
                   
                    <button class='btn btn-link ". ($firstItem ? '' : 'collapsed') ."' type='button' data-toggle='collapse' data-target='#collapse$date' aria-expanded='". ($firstItem ? 'true' : 'false') ."' aria-controls='collapse$date'>
                        ". date("F j, Y, g:i a ", $date)."
                    </button>
                   
                    </div>";
                        echo "<div id='collapse$date' class='collapse ". ($firstItem ? 'show' : '')."' aria-labelledby='heading$date' data-parent='#accordionExample'><div class='card-body'>";
            foreach($details as $k => $val){
                echo "<b>".ucfirst($k)."</b>";
                if(!empty($val)){
                    foreach($val as $propKey => $property){
                        echo "<div>$propKey : $property</div>";
                    }
                }
               
            }
            echo "</div>
                </div>
             </div>";
            
            $firstItem = false;
            
        }
        echo "</div>";

    }
?>
</div>
</div>
</body>

</html>