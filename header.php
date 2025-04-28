<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Love View Estate</title>
   
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="https://kit.fontawesome.com/5d8166a315.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js" defer></script>

</head>

<body>
    <!-- Header Section -->
    <header class="header">
      <div class="header-container">
        <div class="logo-container">
          <a href="index.php">
            <img
              src="img/logo.png"
              alt="Love View Estate"
              class="logo"
            />
          </a>
        </div>

        <div class="nav-container">
          <nav class="main-nav top-nav">
            <ul class="nav-list">
              <li class="nav-item dropdown">
                <a href="#" class="nav-link"
                  >ABOUT <i class="fas fa-chevron-down"></i
                ></a>
                <div class="dropdown-content">
                  <a href="/our-story.php">Our Story</a>
                  <a href="/team.php">Team</a>
                  <a href="/testimonials.php">Testimonials</a>
                </div>
              </li>
              <li class="nav-item"><a href="selling.php" class="nav-link">SELLING</a></li>
              <li class="nav-item">
                <a href="for-sale-north-ayrshire.php" class="nav-link">FOR SALE NORTH AYRSHIRE</a>
              </li>
              <li class="nav-item">
                <a href="for-sale-east-ayrshire.php" class="nav-link">FOR SALE EAST AYRSHIRE</a>
              </li>
              <li class="nav-item">
                <a href="valuation.php" class="nav-link highlight-button"
                  >INSTANT VALUATION</a
                >
              </li>
            </ul>
          </nav>
          <nav class="main-nav bottom-nav">
            <ul class="nav-list">
              <li class="nav-item">
                <a href="/financial-services.php" class="nav-link">FINANCIAL SERVICES</a>
              </li>
              <li class="nav-item">
                <a href="/landlords.php" class="nav-link">LANDLORDS</a>
              </li>
              <li class="nav-item dropdown">
                <a href="for-rent.php" class="nav-link <?php echo (strpos($_SERVER['PHP_SELF'], 'for-rent') !== false || strpos($_SERVER['PHP_SELF'], 'to-rent') !== false || strpos($_SERVER['PHP_SELF'], 'available-properties') !== false) ? 'active' : ''; ?>"
                  >FOR RENT <i class="fas fa-chevron-down"></i
                ></a>
                <div class="dropdown-content">
                  <a href="available-properties.php">Available Properties</a>
                  <a href="to-rent-north-ayrshire.php">North Ayrshire</a>
                  <a href="to-rent-east-ayrshire.php">East Ayrshire</a>
                  <a href="rental-guide.php">Rental Guide</a>
                </div>
              </li>
            </ul>
          </nav>
        </div>

        <div class="social-container">
          <a href="#" class="social-link" aria-label="Facebook"
            ><i class="fab fa-facebook-f"></i
          ></a>
          <a href="#" class="social-link" aria-label="Twitter"
            ><i class="fab fa-x-twitter"></i
          ></a>
          <a href="#" class="social-link" aria-label="Instagram"
            ><i class="fab fa-instagram"></i
          ></a>
          <a href="#" class="social-link" aria-label="Email"
            ><i class="fas fa-envelope"></i
          ></a>
        </div>

        <button class="mobile-menu-toggle" aria-label="Toggle menu">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </header>

    <!-- Mobile Menu -->
    <div class="mobile-menu">
      <button class="mobile-menu-close" aria-label="Close menu">
        <i class="fas fa-times"></i>
      </button>
      <nav>
        <ul>
          <li class="mobile-dropdown">
            <a href="#">ABOUT <i class="fas fa-chevron-down"></i></a>
            <ul class="mobile-dropdown-content">
              <li><a href="/our-story.php">Our Story</a></li>
              <li><a href="/team.php">Team</a></li>
              <li><a href="/testimonials.php">Testimonials</a></li>
            </ul>
          </li>
          <li><a href="selling.php">SELLING</a></li>
          <li><a href="for-sale-north-ayrshire.php">FOR SALE NORTH AYRSHIRE</a></li>
          <li><a href="for-sale-east-ayrshire.php">FOR SALE EAST AYRSHIRE</a></li>
          <li><a href="financial-services.php">FINANCIAL SERVICES</a></li>
          <li><a href="landlords.php">LANDLORDS</a></li>
          <li class="mobile-dropdown">
            <a href="for-rent.php">FOR RENT <i class="fas fa-chevron-down"></i></a>
            <ul class="mobile-dropdown-content">
              <li><a href="available-properties.php">Available Properties</a></li>
              <li><a href="to-rent-north-ayrshire.php">North Ayrshire</a></li>
              <li><a href="to-rent-east-ayrshire.php">East Ayrshire</a></li>
              <li><a href="rental-guide.php">Rental Guide</a></li>
              <li><a href="apply-now.php">Apply Now</a></li>
            </ul>
          </li>
          <li><a href="valuation.php" class="mobile-highlight">INSTANT VALUATION</a></li>
        </ul>
      </nav>
      <div class="mobile-social">
        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" aria-label="Email"><i class="fas fa-envelope"></i></a>
      </div>
    </div>

    <!-- Overlay for closing mobile menu when clicking outside -->
    <div class="mobile-menu-overlay"></div>

    <!-- Main Content -->
    <main>
