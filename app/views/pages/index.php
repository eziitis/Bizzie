<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="">
    <div>
      <div>Product List</div>
      <button id="add-product-btn">ADD</button>
      <button id="delete-product-btn">MASS DELETE</button>
    </div>
    <hr>
    <?php
      foreach($data as $d) {
    ?>
      <div>  
        <input class="delete-checkbox" type="checkbox">
        <div><?php echo$d['sku']?></div>
        <div><?php echo$d['name']?></div>
        <div><?php echo$d['price']?> $</div>
        <?php
          if ($d['productType'] === 'DVD') {
        ?>
          <div>Size: <?php echo$d['size']?> MB</div>
        <?php
          } else if ($d['productType'] === 'BOOK') {
        ?>
          <div>Weight: <?php echo$d['weight']?>KG</div>
        <?php    
          } else if ($d['productType'] === 'Furniture') {
        ?>
          <div>Dimension: <?php echo$d['height']?>x<?php echo$d['width']?>x<?php echo$d['length']?></div>
        <?php    
          }
        ?>
      </div>  
    <?php    
      }
    ?>
    <hr>
    <div>Scandiweb Test assignment</div>
  </form>
</body>
</html>