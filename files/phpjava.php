<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    $ata = 5;
    $demir = 10;
    $enlem = $ata+$demir;    

 
  $name = "John";
  echo "<script>var name = '$name';
  alert(name);
  </script>";


?>



    
</body>

<script type="text/javascript">
    var enlem = '<?php echo $enlem; ?>';
    alert(enlem);
</script>

</html>