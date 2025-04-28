<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/valuation.css">
    <link rel="stylesheet" href="css/sell.css">
    <link rel="stylesheet" href="css/rent.css">
    <link rel="stylesheet" href="css/footer.css">
    
    <!-- Swiper.js Styles -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    
    <script src="https://kit.fontawesome.com/5d8166a315.js" crossorigin="anonymous"></script>
</head>
<body></body>


<?php

require_once('includes/db.php');

// Get property ID from URL
$property_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// If no property ID provided, redirect to properties page
if ($property_id <= 0) {
    header('Location: for-rent.php');
    exit;
}

// Fetch property details from database
$query = "SELECT p.*, a.name as area_name, r.name as region_name 
          FROM properties p 
          JOIN areas a ON p.area_id = a.id 
          JOIN regions r ON a.region_id = r.id 
          WHERE p.id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $property_id);
$stmt->execute();
$result = $stmt->get_result();

// If property not found, redirect to properties page
if ($result->num_rows == 0) {
    header('Location: for-rent.php');
    exit;
}

// Get property data
$property = $result->fetch_assoc();

// Get property images
$imagesQuery = "SELECT * FROM property_images WHERE property_id = ? ORDER BY is_featured DESC, id ASC";
$imagesStmt = $conn->prepare($imagesQuery);
$imagesStmt->bind_param("i", $property_id);
$imagesStmt->execute();
$imagesResult = $imagesStmt->get_result();

$images = [];
while ($image = $imagesResult->fetch_assoc()) {
    $images[] = $image;
}

// If no images, use a placeholder
if (empty($images)) {
    $images[] = [
        'id' => 0,
        'property_id' => $property_id,
        'image_path' => 'img/property-placeholder.jpg',
        'is_featured' => 1
    ];
}

// Get property features
$featuresQuery = "SELECT * FROM property_features WHERE property_id = ?";
$featuresStmt = $conn->prepare($featuresQuery);
$featuresStmt->bind_param("i", $property_id);
$featuresStmt->execute();
$featuresResult = $featuresStmt->get_result();

$features = [];
while ($feature = $featuresResult->fetch_assoc()) {
    $features[] = $feature['feature_name'];
}

// Get property details
$detailsQuery = "SELECT * FROM property_details WHERE property_id = ?";
$detailsStmt = $conn->prepare($detailsQuery);
$detailsStmt->bind_param("i", $property_id);
$detailsStmt->execute();
$detailsResult = $detailsStmt->get_result();

$details = [];
if ($detailsResult->num_rows > 0) {
    $details = $detailsResult->fetch_assoc();
}

// Page specific variables
$pageTitle = $property['title'];
$additionalCss = ['rental-properties'];

// Include header
include('header.php');

// Check for success/error messages
$success = isset($_GET['success']) ? intval($_GET['success']) : 0;
$error = isset($_GET['error']) ? intval($_GET['error']) : 0;
?>

<!-- Property Details Section -->
<section class="property-detail-section">
  <div class="property-detail-container">
    <?php if ($success == 1): ?>
      <div class="alert alert-success">
        Your viewing request has been submitted successfully. We will contact you shortly.
      </div>
    <?php endif; ?>
    
    <?php if ($error > 0): ?>
      <div class="alert alert-danger">
        <?php if ($error == 1): ?>
          Please fill in all required fields.
        <?php else: ?>
          An error occurred while submitting your request. Please try again later.
        <?php endif; ?>
      </div>
    <?php endif; ?>
    
    <!-- Property Gallery -->
    <div class="property-gallery">
      <img src="<?php echo $images[0]['image_path']; ?>" alt="<?php echo $property['title']; ?>" class="main-image" id="mainImage">
      
      <?php if(count($images) > 1): ?>
        <div class="thumbnail-grid">
          <?php foreach($images as $index => $image): ?>
            <img src="<?php echo $image['image_path']; ?>" alt="<?php echo $property['title']; ?>" class="thumbnail <?php echo $index === 0 ? 'active' : ''; ?>" onclick="changeMainImage('<?php echo $image['image_path']; ?>', <?php echo $index; ?>)">
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
    
    <!-- Property Content -->
    <div class="property-detail-content">
      <!-- Left Column - Description and Features -->
      <div class="property-description-section">
        <h1><?php echo $property['title']; ?></h1>
        <p class="property-location"><?php echo $property['location']; ?> (<?php echo $property['region_name']; ?>)</p>
        
        <?php if($property['status']): ?>
          <div class="property-status-badge"><?php echo $property['status']; ?></div>
        <?php endif; ?>
        
        <h2>Property Description</h2>
        <p><?php echo nl2br($property['description']); ?></p>
        
        <div class="property-features-section">
          <h3>Key Features</h3>
          <div class="features-list">
            <?php if(count($features) > 0): ?>
              <?php foreach($features as $feature): ?>
                <div class="feature-item">
                  <i class="fas fa-check"></i> <?php echo $feature; ?>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <div class="feature-item">
                <i class="fas fa-info-circle"></i> Contact us for more details about this property
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      
      <!-- Right Column - Sidebar with Price and Details -->
      <div class="property-sidebar">
        <div class="property-sidebar-price">
          £<?php echo number_format($property['price'], 0); ?> 
          <?php if($property['property_category'] == 'rent'): ?>
            <span class="pcm">PCM</span>
          <?php endif; ?>
        </div>
        
        <div class="property-sidebar-details">
          <div class="sidebar-detail">
            <span class="sidebar-detail-label">Bedrooms</span>
            <span class="sidebar-detail-value"><?php echo $property['bedrooms']; ?></span>
          </div>
          <div class="sidebar-detail">
            <span class="sidebar-detail-label">Bathrooms</span>
            <span class="sidebar-detail-value"><?php echo $property['bathrooms']; ?></span>
          </div>
          <div class="sidebar-detail">
            <span class="sidebar-detail-label">Property Type</span>
            <span class="sidebar-detail-value"><?php echo $property['property_type']; ?></span>
          </div>
          <div class="sidebar-detail">
            <span class="sidebar-detail-label">Postcode</span>
            <span class="sidebar-detail-value"><?php echo $property['postcode']; ?></span>
          </div>
          <?php if(!empty($property['available_date'])): ?>
          <div class="sidebar-detail">
            <span class="sidebar-detail-label">Available From</span>
            <span class="sidebar-detail-value"><?php echo date('d-m-Y', strtotime($property['available_date'])); ?></span>
          </div>
          <?php endif; ?>
          
          <?php if (!empty($details)): ?>
              <?php if (!empty($details['furnished_status'])): ?>
              <div class="sidebar-detail">
                <span class="sidebar-detail-label">Furnished</span>
                <span class="sidebar-detail-value"><?php echo $details['furnished_status']; ?></span>
              </div>
              <?php endif; ?>
              
              <?php if (!empty($details['epc_rating'])): ?>
              <div class="sidebar-detail">
                <span class="sidebar-detail-label">EPC Rating</span>
                <span class="sidebar-detail-value"><?php echo $details['epc_rating']; ?></span>
              </div>
              <?php endif; ?>
              
              <?php if (!empty($details['council_tax_band'])): ?>
              <div class="sidebar-detail">
                <span class="sidebar-detail-label">Council Tax Band</span>
                <span class="sidebar-detail-value"><?php echo $details['council_tax_band']; ?></span>
              </div>
              <?php endif; ?>
              
              <?php if (!empty($details['deposit_amount'])): ?>
              <div class="sidebar-detail">
                <span class="sidebar-detail-label">Deposit</span>
                <span class="sidebar-detail-value">£<?php echo number_format($details['deposit_amount'], 0); ?></span>
              </div>
              <?php endif; ?>
              
              <?php if (!empty($details['pets_policy'])): ?>
              <div class="sidebar-detail">
                <span class="sidebar-detail-label">Pets</span>
                <span class="sidebar-detail-value"><?php echo $details['pets_policy']; ?></span>
              </div>
              <?php endif; ?>
              
              <?php if (!empty($details['smoking_policy'])): ?>
              <div class="sidebar-detail">
                <span class="sidebar-detail-label">Smokers</span>
                <span class="sidebar-detail-value"><?php echo $details['smoking_policy']; ?></span>
              </div>
              <?php endif; ?>
          <?php endif; ?>
        </div>
        
        <div class="contact-agent-section">
          <h3>Arrange a Viewing</h3>
          <form class="contact-form" action="submit-viewing.php" method="post">
            <input type="hidden" name="property_id" value="<?php echo $property['id']; ?>">
            <input type="hidden" name="property_title" value="<?php echo $property['title']; ?>">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="tel" name="phone" placeholder="Your Phone Number" required>
            <input type="date" name="preferred_date" placeholder="Preferred Date (Optional)">
            <textarea name="message" placeholder="Message (Optional)"></textarea>
            <button type="submit">Request Viewing</button>
          </form>
        </div>
      </div>
    </div>
    
    <!-- Back to Listings Button -->
    <div class="back-to-listings">
      <a href="javascript:history.back()" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to Listings
      </a>
    </div>
  </div>
</section>

<script>
function changeMainImage(src, index) {
  document.getElementById('mainImage').src = src;
  
  // Add active class to selected thumbnail
  const thumbnails = document.querySelectorAll('.thumbnail');
  thumbnails.forEach((thumb, i) => {
    if (i === index) {
      thumb.classList.add('active');
    } else {
      thumb.classList.remove('active');
    }
  });
}
</script>



<?php
// Include footer
include('footer.php');
?>