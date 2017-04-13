$(document).ready(function() {
	

   $('.p-n2-menu .outer-div a').hover(

      function() {
         // in
         $(this).find('div.s2').stop().show('slow');

      }, function() {
         // out
         $(this).find('div.s2').stop().hide('slow');
      }
    );
    
});