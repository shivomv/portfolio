$(document).ready(function() {
  // MagnificPopup
  var magnifPopup = function() {
    $('.popup-image').magnificPopup({
      type: 'image',
      removalDelay: 300,
      mainClass: 'mfp-with-zoom',
      gallery: {
        enabled: true
      },
      zoom: {
        enabled: true,
        duration: 300,
        easing: 'ease-in-out',
      },
      closeBtnInside: true // Add a close button inside the popup
    });
  };
  
  // Call the functions 
  magnifPopup();
});
