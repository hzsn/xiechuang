<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>杭州协创实业有限公司后台登录</title>
        <link rel="shortcut icon" href="<?php echo base_url('/favicon.ico'); ?>" type="image/x-icon" />
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
        <link rel="stylesheet" type="text/css" href="/static/admin/css/xc.css">

        <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript">
        	//公共函数
        	function getRandNum(mod, flag){
    						if (isNaN(mod) || isNaN(flag)) return;
							var randNum = (Math.floor(Math.random()*mod+flag));
							return randNum;
						}

				var xc = xc || {};
				/****************设置背景图片****************/
				xc.BackGround = function (){
					var index = getRandNum(3000, 1);
					$('.xc-bgimg').css({'background-image': 'url(http://img.infinitynewtab.com/wallpaper/'+index+'.jpg)'});
				}
				/****************设置验证码****************/
				xc.initCaptcha = function (indexNum){
					var tmpIndex = 0;
					while((tmpIndex = getRandNum(captcha.length, 0)) == indexNum){continue;}
					var randNum = tmpIndex;
					$('#question').html(captcha[randNum].question).attr('title',captcha[randNum].question).attr('data-indexNum', randNum);
					$('#answer').html(captcha[randNum].answer);	
				}

        </script>
        <script type="text/javascript">
       
        function checkAutoLogin(){
        	return $('#auto-login').data('check');
        }

        function clearInputValue(){
        	
        	$('.login-input').on('input propertychange',function(){
	        	$(this).val() ? $(this).siblings('.login-input-clear').fadeIn():$(this).siblings('.login-input-clear').fadeOut();
        	});
        	$('.login-input-clear').on('click', function(){
        		$(this).fadeOut(300).siblings('.login-input').val(null);
        	});
        }

        function checkForm() {
        	var r_email = /^[0-9A-Za-z_]+@[0-9A-z].+[A-Za-z]$/,
        		useremail = $('#useremail').val().trim(),
        		password = $('#password').val().trim();
        	$('#error-msg').text('');
        	if (!r_email.test(useremail)) {
        		$('#useremail').focus();
        		$('#useremail-err-msg').removeClass('err-msg-hidden').text('请正确输入账号');
        		return false;
        	}else{$('#useremail-err-msg').addClass('err-msg-hidden').text('');}

        	if (!password || password.length < 6) {
        		$('#password').focus();
        		$('#password-err-msg').removeClass('err-msg-hidden').text('请正确输入密码');
        		return false;
        	}else{$('#password-err-msg').addClass('err-msg-hidden').text();}
        	if (!$('#captchaValue').val() ||$('#captchaValue').val().length != 4) {
        		$('#captchaValue').focus();
        		$('#captchaValue-err-msg').removeClass('err-msg-hidden').text('请正确输入验证码');
        		return false;
        	}else{$('#captchaValue-err-msg').addClass('err-msg-hidden').text();}
        	return true;
        }
        function inputFoucs(){
        		function focus(){
		    		$(this).siblings('.line').css({
		    			'opacity': '1',
		    			'box-shadow':'0,0,4px #199ae0',
							'transform':'scale(1,1)',
		    		});
		    	}
		    	function blur(){
		    		$(this).siblings('.line').css({
		    			'opacity': '0',
		    			'box-shadow':'0,0,0px #199ae0',
							'transform':'scale(0,0)',
		    		});
		    	}
        		$('.login-input').focus(focus).blur(blur);
        	}
        

		    $(document).ready(function(){

		    	/***********静态文本******************************/
    				
						//背景图片
				xc.BackGround();
				//输入框边框变换
				inputFoucs();
				//清除输入框内的内容
				clearInputValue();
		    	/***********静态文本 end******************************/
		    });
		</script>
	<style>
		html, body{margin: 0px; padding: 0; position: relative; background: #f5f5f5;overflow-x: hidden;height: 100%;}
	    /********背景图片*********/
	    .xc-bgimg{width:100%;height: 100%;position: relative;overflow: hidden; background: url('https://images.mafengwo.net/images/signup/wallpaper/25.jpg') center center transparent; background-size: cover;}

	   .clear{clear: both;}
	 

	    footer {   position: fixed;bottom: 0;width: 100%;text-align: center;color: #fff}
	    footer * {color: #fff; text-decoration: none;}
	</style>

  </head>
  <body>
  <div class="xc-bgimg"></div>
   	<div id="xc-login-box">
   		<div class="login-box">
		   	<form action="<?php echo site_url('/admin/user/login') ;?>" method="post">
			   	<div class="login-wapper">
			   		<div id="error-msg" class="err-msg"></div>
			   		<div class="feild feildtext">
			   			<div class="login-input-box xc-scale-border">
			   				<input id="useremail" type="text" class='login-input' name="useremail" autofocus ='autofocus' placeholder='您的邮箱' value="wwtx@sn.xc" />
			   				<div class="xc-close-box login-input-clear"><span class='xc-close-btn'></span></div>
			   				<span class='line left-line'></span>
				            <span class='line right-line'></span>
				            <span class='line top-line'></span>
				            <span class='line bottom-line'></span>
			   			</div>
			   			<div id="useremail-err-msg" class="err-msg"></div>
			   			
			   		</div>
			   		<div class="feild feildtext">
			   			<div class="login-input-box xc-scale-border">
			   				<input id="password" type="password" class='login-input' name="password" placeholder='您的密码' value="000000"/>
			   				<div class="xc-close-box login-input-clear"><span class='xc-close-btn'></span></div>
			   				<span class='line left-line'></span>
				            <span class='line right-line'></span>
				            <span class='line top-line'></span>
				            <span class='line bottom-line'></span>
			   			</div>
			   			<div id="password-err-msg" class="err-msg"></div>
			   		</div>
			   		<div class="feild feildtext">
				   		<div class="login-input-box xc-scale-border">
				   				<input type="text" class='login-input' id="captchaValue" name="captchaValue" placeholder='左击更新验证码'/>
				   				<div class="xc-close-box login-input-clear"><span class='xc-close-btn'></span></div>
				   				<span class='line left-line'></span>
					            <span class='line right-line'></span>
					            <span class='line top-line'></span>
					            <span class='line bottom-line'></span>
					            <div class="captcha-box"><img id="captchaImg" onclick="this.src='get_code?time='+new Date()" src="get_code"></div>
				   		</div>
			   			<div id = 'captchaValue-err-msg' class="err-msg"></div>
			   		</div>
			   		<div class="feild">
			   			<div class="login-float-left font-small">
			   				<label class='auto-check'><i id='auto-login' data-check='0'></i>下次自动登录</label>
			   			</div>
			   			<div class="login-float-left text-link font-small">
			   				<a href="javascript:void(0);">忘记密码</a>
			   			</div>
			   			<div class="clear"></div>
			   		</div>
			   		<div class="feild xc-ylButton">
			   			<input type="button" class='login-btn' value="登录" id="submit" />
			   			<span class='line left-line'></span>
			            <span class='line right-line'></span>
			            <span class='line top-line'></span>
			            <span class='line bottom-line'></span>
			   		</div>		
			   	</div>
		   	</form>
   		</div>
   	</div>
   	<footer>
   		<p>&copy;2017 杭州协创实业有限公司 <a href="<?php echo base_url('/')?>">官网首页</a></p>
   	</footer>
  </body>
    <script type="text/javascript">
	    $(function(){
	    	/***********动态按钮******************************/
    		//下次自动登录	
    		$('.auto-check').on('click', function(){
	    		//如果#auto-login的data值为true，改变值为false,移除class 'check'
	    		//否则改变值为true,添加class 'check'
	    		($('#auto-login').data('check') && $('#auto-login').removeClass('check').data('check', 0)) || $('#auto-login').addClass('check').data('check', 1)
    		});	    	
		    	
			//按下enter键登录
	    	$("body").keydown(function(event) {
			    //keycaptcha=13是回车键
			    (event.keyCode == "13")&&login();
			});
			
			function login(){
				checkForm() &&  ajaxToServer();
			}
			function ajaxToServer(){
				$.ajax({
					url:'<?php echo site_url("/admin/user/do_login")?>',
					type:"POST",
					data:{
						'useremail':$('#useremail').val(),
						'password':$('#password').val(),
						'captchaValue':$('#captchaValue').val()
					},
					success:function(rep,status,xhr){
						try{
							var jobj =JSON.parse(rep);
							if (!jobj) {
								$('#error-msg').text('服务器异常，请重新登录');
								$('#captchaImg').attr('src', 'get_code?time='+new Date());
								return;
							}
							if(jobj.code != '0'){
								for(var k in jobj['error']){
									$('#'+k+'-err-msg').text(jobj['error'][k]).removeClass('err-msg-hidden');
								}
								$('#captchaImg').attr('src', 'get_code?time='+new Date());
								$('#error-msg').text(jobj['msg']);
							}else{
								window.location.href=jobj['url'];
							}console.log(jobj);
						}catch(e){
							console.log('JSON字符串解析错误');
							$('#captchaImg').attr('src', 'get_code?time='+new Date());
							$('#error-msg').text('服务器异常，请重新登录');
						}
					},
					timeout:3000,
					error:function(xhr,status,error){
						console.log(xhr,status,error);
						$('#error-msg').text('服务器异常，请重新登录');
					},
				});
			}
			
			$('#submit').on('click', function(){
				login();
			})
			/***********动态按钮 end******************************/	
	    })
	    </script>
	   
</html>
