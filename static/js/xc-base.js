$(function () {
  
  fnBackTop();

/**
返回顶部
*/
function fnBackTop() {
    var _div = '<div id="xc-backtop" class="xc-backtop-box">'
                +'<span class="glyphicon glyphicon-chevron-up"></span>'
                +'</div>';
    $('body').append(_div);
    $backtop = $('#xc-backtop');
    $(window).scroll(function () {
      if ($(this).scrollTop() > 250) {
        $backtop.addClass('xc-backtop-open');
      }else{
        $backtop.removeClass('xc-backtop-open');
      }
    });
    
    $backtop.on('click', function () { console.log($(window).scrollTop());
      $('html,body').animate({scrollTop:0+'px'}, 'slow');
    });

  }

})