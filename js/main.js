document.addEventListener("DOMContentLoaded", () => {
    // Mobile menu toggle
    const menuToggle = document.querySelector(".mobile-menu-toggle")
    const mobileMenu = document.querySelector(".mobile-menu")
    const overlay = document.querySelector(".mobile-menu-overlay")
    const closeBtn = document.querySelector(".mobile-menu-close")
  
    if (menuToggle && mobileMenu && overlay && closeBtn) {
      // Toggle mobile menu
      menuToggle.addEventListener("click", () => {
        mobileMenu.classList.add("active")
        overlay.classList.add("active")
        document.body.style.overflow = "hidden"
      })
  
      // Close mobile menu
      const closeMenu = () => {
        mobileMenu.classList.remove("active")
        overlay.classList.remove("active")
        document.body.style.overflow = ""
      }
  
      closeBtn.addEventListener("click", closeMenu)
      overlay.addEventListener("click", closeMenu)
    }
  
    // Mobile dropdown toggles
    const mobileDropdowns = document.querySelectorAll(".mobile-dropdown")
  
    mobileDropdowns.forEach((dropdown) => {
      const link = dropdown.querySelector("a")
      if (link) {
        link.addEventListener("click", (e) => {
          e.preventDefault()
          dropdown.classList.toggle("active")
  
          // Close other open dropdowns
          mobileDropdowns.forEach((otherDropdown) => {
            if (otherDropdown !== dropdown && otherDropdown.classList.contains("active")) {
              otherDropdown.classList.remove("active")
            }
          })
        })
      }
    })
  
    // Handle window resize
    window.addEventListener("resize", () => {
      if (window.innerWidth > 992 && mobileMenu && mobileMenu.classList.contains("active")) {
        const closeMenu = () => {
          mobileMenu.classList.remove("active")
          overlay.classList.remove("active")
          document.body.style.overflow = ""
        }
        closeMenu()
      }
    })
  })
  