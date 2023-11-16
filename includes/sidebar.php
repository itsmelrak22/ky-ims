<div class="sidebar">
    <div class="details">
    </div>
      <ul class="nav-links">
        <li>
          <a href="home.php" class="active">
            <i class='bx bx-home-alt' ></i>
            <span class="links_name">Home</span>
          </a>
        </li>
        <li>
          <a href="products.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Product</span>
          </a>
        </li>
        <li>
          <a href="barcode.php">
            <i class='bx bx-barcode-reader' ></i>
            <span class="links_name">Barcode</span>
          </a>
        </li>
        <li>
          <a href="report.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Report</span>
          </a>
        </li>
        <li>
          <a href="setting.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="username">
          <a href="#">
            <i class='bx bx-user'></i>
            <span class="links_name"> <?= $_SESSION['user']['name'] ?> </span>
          </a>
        </li>
        <li class="log_out">
          <a href="index.html">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>