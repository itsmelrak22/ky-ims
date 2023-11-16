<?php require_once('includes/header.php') ?>
<?php
  spl_autoload_register(function ($class) {
      include 'models/' . $class . '.php';
  });

  $instance = new Product;
  $products = $instance->allWithOutTrashDescending();
?>
<body>

  <?php require_once('includes/sidebar.php') ?>

  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Barcode</span>
      </div>
      
    </nav>
    <div class="container">
      <div class="form-container left">
          <h2>Add Product </h2>
          <form action="process_left.php" method="post">
              <label for="barcode_left">Barcode:</label>
              <input type="text" name="barcode_left" id="barcode_left" required>

              <label for="product_name_left">Product Name:</label>
              <input type="text" name="product_name_left" required>

              <label for="qty">Quantity:</label>
              <input type="text" name="price_left" required>

              <button type="submit">Add Product</button>
          </form>
      </div>

      <div class="product-container">
        <h2>Product Information</h2>
        <table>
            <thead>
                <tr>
                    <th>Barcode Number</th>
                    <th>Product Name</th>
                    <th>Unit</th>
                    <th>Stock</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                   <?php foreach ($products as $key => $product) { ?>
                      <tr>
                        <td><?= $product['barcode'] ?></td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['unit'] ?></td>
                        <td><?= $product['quantity'] ?></td>
                        <td><?= $product['created_at'] ?></td>
                      </tr>
                    <?php } ?>
                <!-- Add more rows for additional products -->
            </tbody>
        </table>
        <br>
        <div class="bar-boxes">
          <div class="recent-bar box">
              <div class="bar-details">
                <div class=></div>
                <div class="button">
                  <a href="#">Add</a>
                  <a href="#">Remove</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div> 
     
  </div>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
// barcode
function generateBarcode(barcodeId) {
            var barcodeValue = document.getElementById(barcodeId).value;
            JsBarcode("#barcodeImage_" + barcodeId, barcodeValue, {
                format: "CODE128",
                displayValue: false
            });
        }

 </script>

</body>
</html>