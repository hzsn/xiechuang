$(function () {
  
  fnBackTop();
  judge();

  // document.cookie='LOADED';



/**
返回顶部
*/
function fnBackTop() {
    var _div = '<div id="xc-backtop" class="xc-backtop-box">'
                +'<span class="glyphicon glyphicon-chevron-up"></span>'
                +'</div>';
    $('footer').after(_div);
    $backtop = $('#xc-backtop');
    $(window).scroll(function () {
      if ($(this).scrollTop() > 250) {
        $backtop.addClass('xc-backtop-open');
      }else{
        $backtop.removeClass('xc-backtop-open');
      }
    });
    
    $backtop.on('click', function () {
      $('html,body').animate({
        'scrollTop':0,
      }, 'slow');
    });

  }

function is_load() {
  // debugger;
  var bool = false;
  var cookies = document.cookie.split(';');
  for(var i = 0; i < cookies.length; i++){
      var c = cookies[i].split('=');
      if(c[0] === 'LOADED'){
        //LOADED已经存在，说明不是第一次访问
        bool = true;
        break;    
      }
  }
  //bool=false，说明是第一次访问，此时设置cookie
  if (!bool) {
    document.cookie = 'LOADED';
  }
  return bool;
}

function judge(){
  if (is_load()) {return;}
  if (!!window.ActiveXObject || "ActiveXObject" in window){
      var r = /MSIE \d+/.exec(navigator.userAgent);

      if (r && r[0] != 'MSIE 10') {
        alert('浏览器版本太低,请升级您的浏览器获取更好的体验' + '\n' + '若您使用的是360浏览器，请更换为极速模式');
      }
        
    }
}
})