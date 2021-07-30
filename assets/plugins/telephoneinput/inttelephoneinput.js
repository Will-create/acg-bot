$(function() {

	// International Telephone Input
  var inputs = document.querySelectorAll('.phone');
  console.log(inputs);
  inputs.forEach(input => {
    window.intlTelInput(input, {
      utilsScript: "../assets/plugins/telephoneinput/utils.js",
    });
  });
  
    
});

