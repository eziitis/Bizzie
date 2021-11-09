<?php
  require APPROOT.'/views/includes/head.php';
?>

  <form action="/bizzie/pages/doa" method="POST">
    <div>
      <div>Product List</div>
      <a href="pages/add">ADD</a>
      <button type="submit" id="delete-product-btn">MASS DELETE</button>
    </div>
    <hr>
    <?php
      foreach($data as $d) {
    ?>
      <div class="items">  
        <input name="checkbox[]" class="delete-checkbox" type="checkbox" value="<?php echo $d['id'];?>">
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

<?php
  require APPROOT.'/views/includes/foot.php';
?>