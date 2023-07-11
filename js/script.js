//initiating the sidenav for mobile devices and modals
$(document).ready(function(){
  $('.sidenav').sidenav();
  $('.modal').modal();
  $('select').formSelect();
});

//making a sticky nav bar
document.addEventListener('DOMContentLoaded', function () {
  var elems = document.querySelectorAll('.pushpin');
  var instances = M.Pushpin.init(elems, options);
});


$('#navbar').pushpin({
  top: $('#wrapper').offset().top
});


