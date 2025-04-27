document.addEventListener("DOMContentLoaded", () => {
    // Hero Carousel
    const slides = document.querySelectorAll(".carousel-slide")
    const indicators = document.querySelectorAll(".indicator")
    const prevBtn = document.querySelector(".carousel-prev")
    const nextBtn = document.querySelector(".carousel-next")
    let currentSlide = 0
    let slideInterval
  
    // Function to show a specific slide
    function showSlide(index) {
      // Remove active class from all slides and indicators
      slides.forEach((slide) => slide.classList.remove("active"))
      indicators.forEach((indicator) => indicator.classList.remove("active"))
  
      // Add active class to current slide and indicator
      slides[index].classList.add("active")
      indicators[index].classList.add("active")
  
      // Update current slide index
      currentSlide = index
    }
  
    // Function to show next slide
    function nextSlide() {
      let next = currentSlide + 1
      if (next >= slides.length) next = 0
      showSlide(next)
    }
  
    // Function to show previous slide
    function prevSlide() {
      let prev = currentSlide - 1
      if (prev < 0) prev = slides.length - 1
      showSlide(prev)
    }
  
    // Set up event listeners for controls
    prevBtn.addEventListener("click", () => {
      prevSlide()
      resetInterval()
    })
  
    nextBtn.addEventListener("click", () => {
      nextSlide()
      resetInterval()
    })
  
    // Set up event listeners for indicators
    indicators.forEach((indicator, index) => {
      indicator.addEventListener("click", () => {
        showSlide(index)
        resetInterval()
      })
    })
  
    // Function to reset the interval
    function resetInterval() {
      clearInterval(slideInterval)
      startInterval()
    }
  
    // Function to start the interval
    function startInterval() {
      slideInterval = setInterval(nextSlide, 5000)
    }
  
    // Start the carousel
    startInterval()
  })
  