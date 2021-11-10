<?php
  require APPROOT.'/views/includes/head.php';
?>

<form id="product_form" action="/bizzie/pages/addItems" method="POST">
    <div class="header">   
      <div>Product Add</div>
      <button>Save</button>
      <a href="../index">Cancel</a>
    </div>
    <hr>
    <label for="sku">SKU</label>
    <input id="sku" name="sku" type="text">

    <label for="name">Name</label>
    <input id="name" name="name" type="text">

    <label for="price">Price</label>
    <input id="price" name="price" type="text">

    <label for="productType">Type Switcher</label>
    <select id="productType" name="productType" onchange="showDiv(this)">
      <option value="DVD">DVD</option>
      <option value="BOOK" onClick"showhidden2()">BOOK</option>
      <option value="Furniture">Furniture</option>
	  </select>

    <div id="hidden1">
      <label for="size">Size (MB)</label>
      <input type="text" id="size" name="size">
    </div>
    <div id="hidden2">
      <label for="weight">Weight (KG)</label>
      <input type="text" id="weight" name="weight">
    </div>
    <div id="hidden3">
      <label for="height">Height (CM)</label>
      <input type="text" id="height" name="height">
      <label for="width">Width (CM)</label>
      <input type="text" id="width" name="width">
      <label for="length">Length (CM)</label>
      <input type="text" id="length" name="length">
    </div>

    <script>
      function showDiv(element) {
        document.getElementById('hidden1').style.display = element.value == 'DVD' ? 'block' : 'none';
        document.getElementById('hidden2').style.display = element.value == 'BOOK' ? 'block' : 'none';
        document.getElementById('hidden3').style.display = element.value == 'Furniture' ? 'block' : 'none';
      }  
    </script>

  </form>

<?php
  require APPROOT.'/views/includes/foot.php';
?>