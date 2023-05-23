jQuery(document).ready(function(){
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 6,
    spaceBetween: 60,
    loop: true,
    speed: 5000,
    autoplay: {
      delay: 0,
      disableOnInteraction: false,
      reverseDirection: true,
    },
    
  });
})
jQuery(document).ready(function(){
  // Initialize Swiper slider for desktop
  var swiperDesktop = new Swiper(".mySwiper", {
    slidesPerView: 6,
    spaceBetween: 60,
    loop: true,
    speed: 5000,
    autoplay: {
      delay: 0,
      disableOnInteraction: false,
      reverseDirection: true,
    }
  });

  // Initialize Swiper slider for mobile
  var swiperMobile = new Swiper(".mySwiper", {
    slidesPerView: 2,
    spaceBetween: 20,
    loop: true,
    speed: 5000,
    autoplay: {
      delay: 0,
      disableOnInteraction: false,
      reverseDirection: true,
    }
  });

  // Toggle between desktop and mobile sliders based on window width
  function toggleSwiper() {
    if (window.innerWidth <= 767) {
      swiperDesktop.destroy(); // Disable desktop slider
      swiperMobile.init(); // Enable mobile slider
    } else {
      swiperMobile.destroy(); // Disable mobile slider
      swiperDesktop.init(); // Enable desktop slider
    }
  }

  // Initial toggle on page load
  toggleSwiper();

  // Re-toggle whenever the window is resized
  window.addEventListener('resize', toggleSwiper);
});
