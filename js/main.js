var  loadLogoInterval;

function playLogo(_id, index, interval) {
  $('#main-content').css("display", "none");
  $('body').css('background-image','none');
  $('#demo-progress-' + index).animate({
    'opacity': '1'
  });
  var p = 0;
  $('#' + _id).loadgo('resetprogress');
  $('#demo-progress-' + index).html('0%');
  window.setTimeout(function () {
    interval = window.setInterval(function (){
      if ($('#' + _id).loadgo('getprogress') == 100) {
        window.clearInterval(interval);
        $('#main-content').css("display", "block").animate({
          'opacity': '1'
        });
        $('body').css('background-image','url("bg5.gif")').animate({
          'opacity': '1'
        });
        $('#demo-progress-' + index).animate({
          'opacity': '0'
        });
           $('#load').hide({
          'opacity': '0'
        });
      }
      else {
        var prog = p*10;
        $('#' + _id).loadgo('setprogress', prog);
        $('#demo-progress-' + index).html(prog + '%');
        p++;
      }
    }, 150);
  }, 300);
}

$(window).load(function () {


  $("#load-logo").load(function() {
    // Example #1
    $('#load-logo').loadgo();
  }).each(function() {
    if(this.complete) $(this).load();
  });

});
