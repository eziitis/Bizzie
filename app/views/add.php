<?php
  require APPROOT.'/views/includes/head.php';
?>

<form id="product_form" action="/bizzie/pages/addItems" method="POST">
    <div class="header">   
      <div>Product Add</div>
      <button name="save" id="save-product-btn">Save</button>
      <button name="cancel" id="add-product-btn">Cancel</button>
    </div>
    <hr>
    <div>Form #<?php echo ($data['lastID']['id'])+1; ?></div>
    <label for="sku">SKU</label>
    <input id="sku" name="sku" type="text">
    <div class="invalidFeedback">
      <?php echo $data['skuError']; ?>
    </div>

    <label for="name">Name</label>
    <input id="name" name="name" type="text">
    <div class="invalidFeedback">
      <?php echo $data['nameError']; ?>
    </div>

    <label for="price">Price</label>
    <input id="price" name="price" type="text">
    <div class="invalidFeedback">
      <?php echo $data['priceError']; ?>
    </div>

    <label for="productType">Type Switcher</label>
    <select id="productType" name="productType" onchange="showDiv(this)">
      <option value="DVD">DVD</option>
      <option value="BOOK" onClick"showhidden2()">BOOK</option>
      <option value="Furniture">Furniture</option>
	  </select>

    <div id="hidden1">
      <label for="size">Size (MB)</label>
      <input type="text" id="size" name="size">
      <div class="invalidFeedback">
        <?php echo $data['sizeError']; ?>
      </div>
      <div>Please enter DVD's size in MB.</div>
      <div>As a whole number(without comma).</div>
    </div>
    <div id="hidden2">
      <label for="weight">Weight (KG)</label>
      <input type="text" id="weight" name="weight">
      <div class="invalidFeedback">
        <?php echo $data['weightError']; ?>
      </div>
      <div>Please enter book's weight in kg.</div>
      <div>As a whole number(without comma).</div>
    </div>
    <div id="hidden3">
      <label for="height">Height (CM)</label>
      <input type="text" id="height" name="height">
      <div class="invalidFeedback">
        <?php echo $data['heightError']; ?>
      </div>
      <label for="width">Width (CM)</label>
      <input type="text" id="width" name="width">
      <div class="invalidFeedback">
        <?php echo $data['widthError']; ?>
      </div>
      <label for="length">Length (CM)</label>
      <input type="text" id="length" name="length">
      <div class="invalidFeedback">
        <?php echo $data['lengthError']; ?>
      </div>
      <div>Please enter furniture's dimensions in cm.</div>
      <div>As a whole numbers(without commas).</div>
    </div>

    

  </form>

<?php
  require APPROOT.'/views/includes/foot.php';
?>