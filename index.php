<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Love View Estate</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/welcome.css">
  <link rel="stylesheet" href="css/valuations.css">
  <link rel="stylesheet" href="css/services.css"><!-- Link to your CSS file -->
</head>
<body>
<?php include 'header.php'; ?>

<!-- Main Content -->
<main>
  <!-- Hero Section with Carousel -->
  <section class="hero">
    <div class="carousel-container">
      <div class="carousel">
        <div
          class="carousel-slide active"
          style="background-image: url('img/1.jpg')"
        ></div>
        <div
          class="carousel-slide"
          style="background-image: url('img/2.jpg')"
        ></div>
        <div
          class="carousel-slide"
          style="background-image: url('img/3.jpg')"
        ></div>
      </div>
      <div class="carousel-controls">
        <button class="carousel-prev" aria-label="Previous slide">
          <i class="fas fa-chevron-left"></i>
        </button>
        <button class="carousel-next" aria-label="Next slide">
          <i class="fas fa-chevron-right"></i>
        </button>
      </div>
      <div class="carousel-indicators">
        <button class="indicator active" data-slide="0" aria-label="Go to slide 1"></button>
        <button class="indicator" data-slide="1" aria-label="Go to slide 2"></button>
        <button class="indicator" data-slide="2" aria-label="Go to slide 3"></button>
      </div>
    </div>
    <div class="hero-content">
      <h1>Welcome to Love View Estate</h1>
      <p>Your premier real estate partner for exceptional properties</p>
      <div class="hero-buttons">
        <a href="for-sale-north-ayrshire.php" class="btn btn-primary">Explore Properties</a>
        <a href="contact.php" class="btn btn-secondary">Contact Us</a>
      </div>
    </div>
  </section>

  <!-- Welcome Section -->
  <section class="welcome-section">
    <div class="welcome-container">
      <h2 class="welcome-heading">
        WELCOME TO LOVE VIEW ESTATE LETTING & SALES
      </h2>
      <h3 class="welcome-subheading">
        AWARD WINNING SPECIALISTS IN BOTH ESTATE AGENCY & LETTINGS.
      </h3>
      <p class="welcome-text">
        At Love View Estate we take pride in the service that we provide to
        our clients, always working with our clients best interest & with
        integrity. Our friendly, experienced team are on hand 7 days a week
        to assist you every step of the way. With 2 Branches in strategic
        locations in North Ayrshire (Saltcoats) & East Ayrshire (Kilmarnock)
        we have Ayrshire covered.
      </p>
    </div>
  </section>

  <!-- Valuations Section -->
  <section class="valuations-section">
    <div class="valuations-container">
      <div class="valuations-image">
        <img src="img/2.jpg" alt="Interior of a modern property" />
      </div>
      <div class="valuations-content">
        <h2 class="valuations-heading">
          Valuations for Selling or Renting
        </h2>
        <p class="valuations-text">
          At Love View Estate we offer free valuations whether you are
          looking to Sell or Rent out your property. Our team are on hand to
          provide knowledgable advice on the Ayrshire property market.
        </p>
        <p class="valuations-cta">
          If you have a property in Ayrshire Contact us to arrange your free
          no obligation property valuation
        </p>
        <a href="valuation.php" class="btn btn-dark">Request Valuation</a>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="services-section">
    <div class="services-overlay"></div>
    <div class="services-container">
      <div class="services-grid">
        <a href="for-sale-north-ayrshire.php" class="service-card">
          <div
            class="service-image"
            style="
              background-image: url('img/1.jpg');
            "
          >
            <div class="service-overlay"></div>
            <h3 class="service-title">FOR SALE</h3>
            <div class="service-arrow">
              <i class="fas fa-arrow-right"></i>
            </div>
          </div>
        </a>

        <a href="for-rent.php" class="service-card">
          <div
            class="service-image"
            style="
              background-image: url('img/2.jpg');
            "
          >
            <div class="service-overlay"></div>
            <h3 class="service-title">TO LET</h3>
            <div class="service-arrow">
              <i class="fas fa-arrow-right"></i>
            </div>
          </div>
        </a>

        <a href="rental-guide.php" class="service-card">
          <div
            class="service-image"
            style="
              background-image: url('img/3.jpg');
            "
          >
            <div class="service-overlay"></div>
            <h3 class="service-title">RENTING</h3>
            <div class="service-arrow">
              <i class="fas fa-arrow-right"></i>
            </div>
          </div>
        </a>

        <a href="selling.php" class="service-card">
          <div
            class="service-image"
            style="
              background-image: url('img/4.jpg');
            "
          >
            <div class="service-overlay"></div>
            <h3 class="service-title">SELLING</h3>
            <div class="service-arrow">
              <i class="fas fa-arrow-right"></i>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>
</main>

<!-- Footer Section -->
<?php include 'footer.php'; ?>



<script src="js/main.js"></script>
<script src="js/carousel.js"></script>
</body>
</html>
