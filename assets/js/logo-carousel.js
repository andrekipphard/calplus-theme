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