$(document).ready(function () {
  var url = location.pathname;
  
  var foundin = url.contains('people');
  alert(foundin);
  
  if (url.indexOf('people')) {
    $('#navigation ul li:nth-child(3)').attr('class','active-trail');
  }
});
