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
        <span class="dashboard">Home</span>
      </div>
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title">Recent History</div>
            <div class="sales-details">
                <!-- Create a table with an ID for DataTables to target -->
                <table id="recentHistoryTable" class="display">
                    <thead>
                    <tr>
                        <th>Barcode</th>
                        <th>Product Name</th>
                        <th>Unit</th>
                        <th>Qty</th>
                        <th>Date</th>
                    </tr>
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
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </section>

<script>
    $(document).ready(function () {
        $('#recentHistoryTable').DataTable( {
          responsive: true
      } );
    });
</script>

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


 </script>

</body>
</html>