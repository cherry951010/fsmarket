/* *
 * 修改会员信息
 */
function userEdit()
{
  var frm = document.forms['formEdit'];
  var email = frm.elements['email'].value;
  var msg = '';
  var reg = null;
  var passwd_answer = frm.elements['passwd_answer'] ? Utils.trim(frm.elements['passwd_answer'].value) : '';
  var sel_question =  frm.elements['sel_question'] ? Utils.trim(frm.elements['sel_question'].value) : '';

  if (email.length == 0)
  {
    msg += email_empty + '\n';
  }
  else
  {
    if ( ! (Utils.isEmail(email)))
    {
      msg += email_error + '\n';
    }
  }

  if (passwd_answer.length > 0 && sel_question == 0 || document.getElementById('passwd_quesetion') && passwd_answer.length == 0)
  {
    msg += no_select_question + '\n';
  }

  for (i = 7; i < frm.elements.length - 2; i++)	// 从第七项开始循环检查是否为必填项
  {
	needinput = document.getElementById(frm.elements[i].name + 'i') ? document.getElementById(frm.elements[i].name + 'i') : '';

	if (needinput != '' && frm.elements[i].value.length == 0)
	{
	  msg += '- ' + needinput.innerHTML + msg_blank + '\n';
	}
  }

  if (msg.length > 0)
  {
    alert(msg);
    return false;
  }
  else
  {
    return true;
  }
}

/* 会员修改密码 */
function editPassword()
{
  var frm              = document.forms['formPassword'];
  var old_password     = frm.elements['old_password'].value;
  var new_password     = frm.elements['new_password'].value;
  var confirm_password = frm.elements['comfirm_password'].value;

  var msg = '';
  var reg = null;

  if (old_password.length == 0)
  {
    msg += old_password_empty + '\n';
  }

  if (new_password.length == 0)
  {
    msg += new_password_empty + '\n';
  }

  if (confirm_password.length == 0)
  {
    msg += confirm_password_empty + '\n';
  }

  if (new_password.length > 0 && confirm_password.length > 0)
  {
    if (new_password != confirm_password)
    {
      msg += both_password_error + '\n';
    }
  }

  if (msg.length > 0)
  {
    alert(msg);
    return false;
  }
  else
  {
    return true;
  }
}

/* 会员绑定手机 */
function bindMobile()
{
  var frm        = document.forms['formBindmobile'];
  var mobile     = frm.elements['mobile'].value;
  var verifycode = frm.elements['verifycode'].value;

  var msg = '';
  var reg = null;

  if (mobile.length == 0)
  {
    msg += '手机号不能为空！\n';
  }

  if (mobile.length != 11)
  {
    msg += '手机号必须为11位！\n';
  }

  if (verifycode.length == 0)
  {
    msg += '验证码不能为空！\n';
  }

  if (verifycode.length != 6)
  {
    msg += '验证码必须为6位！\n';
  }

  if (msg.length > 0)
  {
    alert(msg);
    return false;
  }
  else
  {
    return true;
  }
}

/* *
 * 对会员的留言输入作处理
 */
function submitMsg()
{
  var frm         = document.forms['formMsg'];
  var msg_title   = frm.elements['msg_title'].value;
  var msg_content = frm.elements['msg_content'].value;
  var msg = '';

  if (msg_title.length == 0)
  {
    msg += msg_title_empty + '\n';
  }
  if (msg_content.length == 0)
  {
    msg += msg_content_empty + '\n'
  }

  if (msg_title.length > 200)
  {
    msg += msg_title_limit + '\n';
  }

  if (msg.length > 0)
  {
    alert(msg);
    return false;
  }
  else
  {
    return true;
  }
}

/* *
 * 会员找回密码时，对输入作处理
 */
function submitPwdInfo()
{
  var frm = document.forms['getPassword'];
  var user_name = frm.elements['user_name'].value;
  var email     = frm.elements['email'].value;

  var errorMsg = '';
  if (user_name.length == 0)
  {
    errorMsg += user_name_empty + '\n';
  }

  if (email.length == 0)
  {
    errorMsg += email_address_empty + '\n';
  }
  else
  {
    if ( ! (Utils.isEmail(email)))
    {
      errorMsg += email_address_error + '\n';
    }
  }

  if (errorMsg.length > 0)
  {
    alert(errorMsg);
    return false;
  }

  return true;
}

/* *
 * 会员找回密码时，对输入作处理
 */
function submitPwdMobileInfo()
{
  var frm = document.forms['getPasswordByMobile'];
  var user_name = frm.elements['user_name'].value;
  var mobile     = frm.elements['mobile'].value;

  var errorMsg = '';
  if (user_name.length == 0)
  {
    errorMsg += user_name_empty + '\n';
  }

  if (mobile.length == 0)
  {
    errorMsg += mobile_address_empty + '\n';
  }
  else
  {
    if ( ! (Utils.isMobile(mobile)))
    {
      errorMsg += mobile_address_error + '\n';
    }
  }

  if (errorMsg.length > 0)
  {
    alert(errorMsg);
    return false;
  }

  return true;
}

/* *
 * 会员找回密码时，对输入作处理
 */
function submitPwd()
{
  var frm = document.forms['getPassword2'];
  var password = frm.elements['new_password'].value;
  var confirm_password = frm.elements['confirm_password'].value;

  var errorMsg = '';
  if (password.length == 0)
  {
    errorMsg += new_password_empty + '\n';
  }

  if (confirm_password.length == 0)
  {
    errorMsg += confirm_password_empty + '\n';
  }

  if (confirm_password != password)
  {
    errorMsg += both_password_error + '\n';
  }

  if (errorMsg.length > 0)
  {
    alert(errorMsg);
    return false;
  }
  else
  {
    return true;
  }
}

/* *
 * 处理会员提交的缺货登记
 */
function addBooking()
{
  var frm  = document.forms['formBooking'];
  var goods_id = frm.elements['id'].value;
  var rec_id  = frm.elements['rec_id'].value;
  var number  = frm.elements['number'].value;
  var desc  = frm.elements['desc'].value;
  var linkman  = frm.elements['linkman'].value;
  var email  = frm.elements['email'].value;
  var tel  = frm.elements['tel'].value;
  var msg = "";

  if (number.length == 0)
  {
    msg += booking_amount_empty + '\n';
  }
  else
  {
    var reg = /^[0-9]+/;
    if ( ! reg.test(number))
    {
      msg += booking_amount_error + '\n';
    }
  }

  if (desc.length == 0)
  {
    msg += describe_empty + '\n';
  }

  if (linkman.length == 0)
  {
    msg += contact_username_empty + '\n';
  }

  if (email.length == 0)
  {
    msg += email_empty + '\n';
  }
  else
  {
    if ( ! (Utils.isEmail(email)))
    {
      msg += email_error + '\n';
    }
  }

  if (tel.length == 0)
  {
    msg += contact_phone_empty + '\n';
  }

  if (msg.length > 0)
  {
    alert(msg);
    return false;
  }

  return true;
}

/* *
 * 会员登录
 */
function userLogin()
{
  var frm      = document.forms['formLogin'];
  var username = frm.elements['username'].value;
  var password = frm.elements['password'].value;
  var msg = '';

  if (username.length == 0)
  {
    msg += username_empty + '\n';
  }

  if (password.length == 0)
  {
    msg += password_empty + '\n';
  }

  if (msg.length > 0)
  {
    alert(msg);
    return false;
  }
  else
  {
    return true;
  }
}

function check_login_username( username,id )
{
	id=  id ? id : 'username_notice';
    if ( username.length == '' )
    {
		$("#username").parent().removeClass("params_success");
		$("#username").parent().addClass("params_error");
        document.getElementById(id).innerHTML = username_empty;
   }else{
		$("#username").parent().removeClass("params_error");
		$("#username").parent().addClass("params_success");
        document.getElementById(id).innerHTML = "<em></em>";
   }
}

function check_login_password( password ,id)
{
	id=  id ? id : 'password_notice';
    if ( password.length == '' )
    {
		$("#password").parent().removeClass("params_success");
		$("#password").parent().addClass("params_error");
        document.getElementById(id).innerHTML = password_empty;
   }else{
		$("#password").parent().removeClass("params_error");
		$("#password").parent().addClass("params_success");
        document.getElementById(id).innerHTML = "<em></em>";
   }
}

function check_login_yzm( yzm ,id)
{
	id=  id ? id : 'yzm_notice';
    if ( yzm.length == '' || yzm.length !==4 )
    {
		$("#yzm").parent().removeClass("params_success");
		$("#yzm").parent().addClass("params_error");
        document.getElementById(id).innerHTML = '验证码不能为空';
   }else{
		Ajax.call( 'user.php?act=captcha_login', 'captcha=' + yzm, function (data){yzm_callback(data,id);} , 'GET', 'TEXT', true, true );
   }
}

function check_m_login_yzm( yzm )
{
    if ( yzm == '' || yzm.length !==4 )
    {
		$("#yzm_m").parent().removeClass("params_success");
		$("#yzm_m").parent().addClass("params_error");
        document.getElementById('yzm_notice_m').innerHTML = '验证码不能为空';
		return false;
   }else{
		Ajax.call( 'user.php?act=captcha_login', 'captcha=' + yzm, yzm_callback_m , 'GET', 'TEXT', true, true );
   }
}

function yzm_callback_m(result)
{
  if ( result == "true" )
  {
		$("#yzm_m").parent().removeClass("params_error");
		$("#yzm_m").parent().addClass("params_success");
        document.getElementById('yzm_notice_m').innerHTML = "<em></em>"; //zhouhuan
		document.forms['formUsermobile'].elements['Submit'].disabled = '';
  }
  else
  {
		$("#yzm_m").parent().removeClass("params_success");
		$("#yzm_m").parent().addClass("params_error");
        document.getElementById('yzm_notice_m').innerHTML = '验证码错误';
		document.forms['formUsermobile'].elements['Submit'].disabled = 'disabled';
		return false;
  }
}

function chkstr(str)
{
  for (var i = 0; i < str.length; i++)
  {
    if (str.charCodeAt(i) < 127 && !str.substr(i,1).match(/^\w+$/ig))
    {
      return false;
    }
  }
  return true;
}

function check_password( password )
{
    if ( password.length < 6 )
    {
		$("#password1").parent().removeClass("params_success");
		$("#password1").parent().addClass("params_error");
		
        document.getElementById('password_notice').innerHTML = password_shorter;
        document.forms['formUser'].elements['Submit'].disabled = 'disabled';
   }
    else
    {
		$("#password1").parent().removeClass("params_error");
		$("#password1").parent().addClass("params_success");
        document.getElementById('password_notice').innerHTML = "<em></em>"; //zhouhuan
        document.forms['formUser'].elements['Submit'].disabled = '';
    }
}

function check_conform_password( conform_password )
{
    password = document.getElementById('password1').value;
    
    if ( conform_password.length < 6 )
    {
		$("#conform_password").parent().removeClass("params_success");
		$("#conform_password").parent().addClass("params_error");
		
        document.getElementById('conform_password_notice').innerHTML = password_shorter;
        document.forms['formUser'].elements['Submit'].disabled = 'disabled';
        return false;
    }
    if ( conform_password != password )
    {
		$("#conform_password").parent().removeClass("params_success");
		$("#conform_password").parent().addClass("params_error");
        document.getElementById('conform_password_notice').innerHTML = confirm_password_invalid;
        document.forms['formUser'].elements['Submit'].disabled = 'disabled';
   }
    else
    {
		$("#conform_password").parent().removeClass("params_error");
		$("#conform_password").parent().addClass("params_success");
        document.getElementById('conform_password_notice').innerHTML = "<em></em>"; //zhouhuan
        document.forms['formUser'].elements['Submit'].disabled = '';
    }
}

function is_registered( username )
{
    var submit_disabled = false;
	var unlen = username.replace(/[^\x00-\xff]/g, "**").length;

    if ( username == '' )
    {
		$("#username").parent().removeClass("params_success");
		$("#username").parent().addClass("params_error");
        document.getElementById('username_notice').innerHTML = msg_un_blank;
        var submit_disabled = true;
    }

    if ( !chkstr( username ) )
    {
		$("#username").parent().removeClass("params_success");
		$("#username").parent().addClass("params_error");
        document.getElementById('username_notice').innerHTML = msg_un_format;
        var submit_disabled = true;
    }
    if ( unlen < 3 )
    { 
		$("#username").parent().removeClass("params_success");
		$("#username").parent().addClass("params_error");
        document.getElementById('username_notice').innerHTML = username_shorter;
        var submit_disabled = true;
    }
    if ( unlen > 14 )
    {
		$("#username").parent().removeClass("params_success");
		$("#username").parent().addClass("params_error");
        document.getElementById('username_notice').innerHTML = msg_un_length;
        var submit_disabled = true;
    }
    if ( submit_disabled )
    {
        document.forms['formUser'].elements['Submit'].disabled = 'disabled';
        return false;
    }
    Ajax.call( 'user.php?act=is_registered', 'username=' + username, registed_callback , 'GET', 'TEXT', true, true );
}

function getverifycode_login(mobile,captcha) {
	if(mobile_is_registered(mobile)==false) {
		$("#mobile").parent().removeClass("params_success");
		$("#mobile").parent().addClass("params_error");
		document.getElementById('mobile_notice').innerHTML = '手机号错误';
        return false;
	}
    if ( captcha == '' || captcha.length !==4 )
    {
		$("#yzm_m").parent().removeClass("params_success");
		$("#yzm_m").parent().addClass("params_error");
        document.getElementById('yzm_notice_m').innerHTML = '验证码不能为空';
		return false;
   }else{
		Ajax.call( 'user.php?act=captcha_login', 'captcha=' + captcha, getverifycode_captcha , 'GET', 'TEXT', true, true );
   }
}

function getverifycode_captcha(result)
{
  if ( result == "true" )
  {
		$("#yzm_m").parent().removeClass("params_error");
		$("#yzm_m").parent().addClass("params_success");
        document.getElementById('yzm_notice_m').innerHTML = "<em></em>"; //zhouhuan
		document.forms['formUsermobile'].elements['Submit'].disabled = '';
		var mobile = trim(document.getElementById("mobile").value);
		Ajax.call('sms.php?step=getverifycode_login&r=' + Math.random(), 'mobile=' + mobile, getverifycode1Response, 'POST', 'JSON');
  }
  else if ( result == "false" )
  {
		$("#yzm_m").parent().removeClass("params_success");
		$("#yzm_m").parent().addClass("params_error");
        document.getElementById('yzm_notice_m').innerHTML = '验证码错误';
		document.forms['formUsermobile'].elements['Submit'].disabled = 'disabled';
		return false;
  }
}

function check_dxyzm_m( dxyzm )
{
	var mobile = $('#mobile').val();
    if ( dxyzm.length == '' || dxyzm.length !==6 )
    {
		$("#dxyzm_m").parent().removeClass("params_success");
		$("#dxyzm_m").parent().addClass("params_error");
        document.getElementById('dxyzm_notice_m').innerHTML = '请填写短信验证码';
		document.forms['formUsermobile'].elements['Submit'].disabled = 'disabled';
   }else{
		Ajax.call( 'user.php?act=dxyzmuser', 'mobile=' + mobile + '&dxyzm=' + dxyzm, dxyzm_callback_m , 'POST', 'TEXT', true, true );
   }
}

function dxyzm_callback_m(result)
{
  if ( result == "true" )
  {
		$("#dxyzm_m").parent().removeClass("params_error");
		$("#dxyzm_m").parent().addClass("params_success");
        document.getElementById('dxyzm_notice_m').innerHTML = "<em></em>"; //zhouhuan
		document.forms['formUsermobile'].elements['Submit'].disabled = '';
  }
  else
  {
		$("#dxyzm_m").parent().removeClass("params_success");
		$("#dxyzm_m").parent().addClass("params_error");
        document.getElementById('dxyzm_notice_m').innerHTML = '短信验证码错误';
		document.forms['formUsermobile'].elements['Submit'].disabled = 'disabled';
  }
}

function check_dxyzm( dxyzm )
{
	var mobile = $('#extend_field5').val();
    if ( dxyzm.length == '' || dxyzm.length !==6 )
    {
		$("#dxyzm").parent().removeClass("params_success");
		$("#dxyzm").parent().addClass("params_error");
        document.getElementById('dxyzm_notice').innerHTML = '请填写短信验证码';
		document.forms['formUser'].elements['Submit'].disabled = 'disabled';
   }else{
		Ajax.call( 'user.php?act=dxyzmuser', 'mobile=' + mobile + '&dxyzm=' + dxyzm, dxyzm_callback , 'POST', 'TEXT', true, true );
   }
}

function dxyzm_callback(result)
{
  if ( result == "true" )
  {
		$("#dxyzm").parent().removeClass("params_error");
		$("#dxyzm").parent().addClass("params_success");
        document.getElementById('dxyzm_notice').innerHTML = "<em></em>"; //zhouhuan
		document.forms['formUser'].elements['Submit'].disabled = '';
  }
  else
  {
		$("#dxyzm").parent().removeClass("params_success");
		$("#dxyzm").parent().addClass("params_error");
        document.getElementById('dxyzm_notice').innerHTML = '短信验证码错误';
		document.forms['formUser'].elements['Submit'].disabled = 'disabled';
  }
}

function check_yzm( yzm )
{
    if ( yzm.length == '' || yzm.length !==4 )
    {
		$("#yzm").parent().removeClass("params_success");
		$("#yzm").parent().addClass("params_error");
        document.getElementById('yzm_notice').innerHTML = '请填写验证码';
		if ( document.forms['formUser'].elements['Submit'] )
		{
			document.forms['formUser'].elements['Submit'].disabled = 'disabled';
		}
   }else{
		Ajax.call( 'user.php?act=captchauser', 'captcha=' + yzm, yzm_callback , 'POST', 'TEXT', true, true );
   }
}

function yzm_callback(result,id)
{
	id =(id && id!='false' && id!='true') ? id : 'yzm_notice';
	if ( result == "true" )
  {
		$("#yzm").parent().removeClass("params_error");
		$("#yzm").parent().addClass("params_success");
        document.getElementById(id).innerHTML = "<em></em>"; //zhouhuan
		if ( document.forms['formUser'].elements['Submit'] )
		{
			document.forms['formUser'].elements['Submit'].disabled = '';
		}
  }
  else
  {
		$("#yzm").parent().removeClass("params_success");
		$("#yzm").parent().addClass("params_error");
        document.getElementById(id).innerHTML = '验证码错误';
		if ( document.forms['formUser'].elements['Submit'] )
		{
			document.forms['formUser'].elements['Submit'].disabled = 'disabled';
		}
  }
}

function registed_callback(result)
{
  if ( result == "true" )
  {

	$("#username").parent().removeClass("params_error");
	$("#username").parent().addClass("params_success");

    document.getElementById('username_notice').innerHTML = "<em></em>"; //zhouhuan
    document.forms['formUser'].elements['Submit'].disabled = '';
  }
  else
  {

	$("#username").parent().removeClass("params_success");
	$("#username").parent().addClass("params_error");
    document.getElementById('username_notice').innerHTML = msg_un_registered;
    document.forms['formUser'].elements['Submit'].disabled = 'disabled';
  }
}

function checkEmail(email)
{
  var submit_disabled = false;
  
  if (email == '')
  {
	$("#email").parent().removeClass("params_success");
	$("#email").parent().addClass("params_error");
    document.getElementById('email_notice').innerHTML = msg_email_blank;
    submit_disabled = true;
  }
  else if (!Utils.isEmail(email))
  {
	$("#email").parent().removeClass("params_success");
	$("#email").parent().addClass("params_error");
    document.getElementById('email_notice').innerHTML = msg_email_format;
    submit_disabled = true;
  }
 
  if( submit_disabled )
  {
    document.forms['formUser'].elements['Submit'].disabled = 'disabled';
    return false;
  }
  Ajax.call( 'user.php?act=check_email', 'email=' + email, check_email_callback , 'GET', 'TEXT', true, true );
}

function check_email_callback(result)
{
  if ( result == 'ok' )
  {
	$("#email").parent().removeClass("params_error");
	$("#email").parent().addClass("params_success");
	
    document.getElementById('email_notice').innerHTML = "<em></em>"; //zhouhuan
    document.forms['formUser'].elements['Submit'].disabled = '';
  }
  else
  {

	$("#email").parent().removeClass("params_success");
	$("#email").parent().addClass("params_error");

    document.getElementById('email_notice').innerHTML = msg_email_registered;
    document.forms['formUser'].elements['Submit'].disabled = 'disabled';
  }
}

function mobile_is_registered(mobile)
{  
  if (mobile == '')
  {
	$("#mobile").parent().removeClass("params_success");
	$("#mobile").parent().addClass("params_error");
    document.getElementById('mobile_notice').innerHTML = mobile_empty;
    document.forms['formUsermobile'].elements['Submit'].disabled = 'disabled';
    return false;
  }
  else if (!Utils.isMobile(mobile))
  {
	$("#mobile").parent().removeClass("params_success");
	$("#mobile").parent().addClass("params_error");
    document.getElementById('mobile_notice').innerHTML = mobile_invalid;
    document.forms['formUsermobile'].elements['Submit'].disabled = 'disabled';
    return false;
  }
  else
  {
	$("#mobile").parent().removeClass("params_error");
	$("#mobile").parent().addClass("params_success");
    document.getElementById('mobile_notice').innerHTML = "<em></em>"; //zhouhuan
    document.forms['formUsermobile'].elements['Submit'].disabled = '';
 }
  Ajax.call( 'user.php?act=mobile_is_registered', 'mobile=' + mobile, mobile_is_registered_callback , 'GET', 'TEXT', true, true );
}

function mobile_is_registered_callback(result)
{
  if ( result == "true" )
  {
	$("#mobile").parent().removeClass("params_error");
	$("#mobile").parent().addClass("params_success");

    document.getElementById('mobile_notice').innerHTML = "<em></em>"; //zhouhuan
    document.forms['formUsermobile'].elements['Submit'].disabled = '';
  }
  else
  {
	$("#mobile").parent().removeClass("params_success");
	$("#mobile").parent().addClass("params_error");
    document.getElementById('mobile_notice').innerHTML = '手机号还未注册过，请先注册';
    document.forms['formUsermobile'].elements['Submit'].disabled = 'disabled';
	return false;
  }
}

function is_mobile(mobile)
{
  var submit_disabled = false;
  
  if (mobile == '')
  {
	$("#extend_field5").parent().removeClass("params_success");
	$("#extend_field5").parent().addClass("params_error");
    document.getElementById('mobile_notice').innerHTML = mobile_empty;
    submit_disabled = true;
  }
  else if (!Utils.isMobile(mobile))
  {
	$("#extend_field5").parent().removeClass("params_success");
	$("#extend_field5").parent().addClass("params_error");
    document.getElementById('mobile_notice').innerHTML = mobile_invalid;
    submit_disabled = true;
  }
  else
  {
	$("#extend_field5").parent().removeClass("params_error");
	$("#extend_field5").parent().addClass("params_success");
    document.getElementById('mobile_notice').innerHTML = "<em></em>"; //zhouhuan
    document.forms['formUser'].elements['Submit'].disabled = '';
 }
 
  if( submit_disabled )
  {
    document.forms['formUser'].elements['Submit'].disabled = 'disabled';
    return false;
  }
    Ajax.call( 'user.php?act=is_registered', 'username=' + mobile, registed_mobile_callback , 'GET', 'TEXT', true, true );
}

function registed_mobile_callback(result)
{
  if ( result == "true" )
  {

	$("#extend_field5").parent().removeClass("params_error");
	$("#extend_field5").parent().addClass("params_success");

    document.getElementById('mobile_notice').innerHTML = "<em></em>"; //zhouhuan
    document.forms['formUser'].elements['Submit'].disabled = '';
  }
  else
  {

	$("#extend_field5").parent().removeClass("params_success");
	$("#extend_field5").parent().addClass("params_error");
    document.getElementById('mobile_notice').innerHTML = msg_un_registered;
    document.forms['formUser'].elements['Submit'].disabled = 'disabled';
  }
}

/* *
 * 处理注册用户
 */
function register()
{
  var frm  = document.forms['formUser'];
  var username  = Utils.trim(frm.elements['username'].value);
  var email  = frm.elements['email'].value;
  var password  = Utils.trim(frm.elements['password'].value);
  var confirm_password = Utils.trim(frm.elements['confirm_password'].value);
  var checked_agreement = frm.elements['agreement'].checked;
  var msn = frm.elements['extend_field1'] ? Utils.trim(frm.elements['extend_field1'].value) : '';
  var qq = frm.elements['extend_field2'] ? Utils.trim(frm.elements['extend_field2'].value) : '';
  var home_phone = frm.elements['extend_field4'] ? Utils.trim(frm.elements['extend_field4'].value) : '';
  var office_phone = frm.elements['extend_field3'] ? Utils.trim(frm.elements['extend_field3'].value) : '';
  var mobile_phone = frm.elements['extend_field5'] ? Utils.trim(frm.elements['extend_field5'].value) : '';
  var passwd_answer = frm.elements['passwd_answer'] ? Utils.trim(frm.elements['passwd_answer'].value) : '';
  var sel_question =  frm.elements['sel_question'] ? Utils.trim(frm.elements['sel_question'].value) : '';


  var msg = "";
  // 检查输入
  var msg = '';
  if (username.length == 0)
  {
    msg += username_empty + '\n';
  }
  else if (username.match(/^\s*$|^c:\\con\\con$|[%,\'\*\"\s\t\<\>\&\\]/))
  {
    msg += username_invalid + '\n';
  }
  else if (username.length < 3)
  {
    //msg += username_shorter + '\n';
  }

  if (email.length == 0)
  {
    msg += email_empty + '\n';
  }
  else
  {
    if ( ! (Utils.isEmail(email)))
    {
      msg += email_invalid + '\n';
    }
  }
  if (password.length == 0)
  {
    msg += password_empty + '\n';
  }
  else if (password.length < 6)
  {
    msg += password_shorter + '\n';
  }
  if (/ /.test(password) == true)
  {
	msg += passwd_balnk + '\n';
  }
  if (confirm_password != password )
  {
    msg += confirm_password_invalid + '\n';
  }
  if(checked_agreement != true)
  {
    msg += agreement + '\n';
  }

  if (msn.length > 0 && (!Utils.isEmail(msn)))
  {
    msg += msn_invalid + '\n';
  }

  if (qq.length > 0 && (!Utils.isNumber(qq)))
  {
    msg += qq_invalid + '\n';
  }

  if (office_phone.length>0)
  {
    var reg = /^[\d|\-|\s]+$/;
    if (!reg.test(office_phone))
    {
      msg += office_phone_invalid + '\n';
    }
  }
  if (home_phone.length>0)
  {
    var reg = /^[\d|\-|\s]+$/;

    if (!reg.test(home_phone))
    {
      msg += home_phone_invalid + '\n';
    }
  }
  if (mobile_phone.length>0)
  {
    var reg = /^[\d|\-|\s]+$/;
    if (!reg.test(mobile_phone))
    {
      msg += mobile_phone_invalid + '\n';
    }
  }
  if (passwd_answer.length > 0 && sel_question == 0 || document.getElementById('passwd_quesetion') && passwd_answer.length == 0)
  {
    msg += no_select_question + '\n';
  }

  for (i = 4; i < frm.elements.length - 4; i++)	// 从第五项开始循环检查是否为必填项
  {
	needinput = document.getElementById(frm.elements[i].name + 'i') ? document.getElementById(frm.elements[i].name + 'i') : '';

	if (needinput != '' && frm.elements[i].value.length == 0)
	{
	  msg += '- ' + needinput.innerHTML + msg_blank + '\n';
	}
  }

  if (msg.length > 0)
  {
    alert(msg);
    return false;
  }
  else
  {
    return true;
  }
}

/* *
 * 处理注册用户
 */
function register_mobile()
{
  var frm  = document.forms['formUser'];
  var password  = Utils.trim(frm.elements['password'].value);
  var confirm_password = Utils.trim(frm.elements['confirm_password'].value);
  var checked_agreement = frm.elements['agreement'].checked;
  var mobile_phone = frm.elements['extend_field5'] ? Utils.trim(frm.elements['extend_field5'].value) : '';
  var dxyzm = frm.elements['dxyzm'] ? Utils.trim(frm.elements['dxyzm'].value) : '';
  var username  = Utils.trim(frm.elements['username'].value);


  var msg = "";
  // 检查输入
  var msg = '';

  if (username.length == 0)
  {
    msg += username_empty + '\n';
  }
  else if (username.match(/^\s*$|^c:\\con\\con$|[%,\'\*\"\s\t\<\>\&\\]/))
  {
    msg += username_invalid + '\n';
  }
  if (mobile_phone == '')
  {
      msg += mobile_empty + '\n';
  }
  else if (!Utils.isMobile(mobile_phone))
  {
      msg += mobile_invalid + '\n';
  }

  if (dxyzm.length == 0)
  {
    msg += '请填写短信验证码\n';
  }
  else if (dxyzm.length < 6)
  {
    msg += '短信验证码为6位\n';
  }

  if (password.length == 0)
  {
    msg += password_empty + '\n';
  }
  else if (password.length < 6)
  {
    msg += password_shorter + '\n';
  }
  if (/ /.test(password) == true)
  {
	msg += passwd_balnk + '\n';
  }
  if (confirm_password != password )
  {
    msg += confirm_password_invalid + '\n';
  }
  if(checked_agreement != true)
  {
    msg += agreement + '\n';
  }

  if (msg.length > 0)
  {
    alert(msg);
    return false;
  }
  else
  {
    return true;
  }
}

/* *
 * 用户中心订单保存地址信息
 */
function saveOrderAddress(id)
{
  var frm           = document.forms['formAddress'];
  var consignee     = frm.elements['consignee'].value;
  var email         = frm.elements['email'].value;
  var address       = frm.elements['address'].value;
  var zipcode       = frm.elements['zipcode'].value;
  var tel           = frm.elements['tel'].value;
  var mobile        = frm.elements['mobile'].value;
  var sign_building = frm.elements['sign_building'].value;
  var best_time     = frm.elements['best_time'].value;

  if (id == 0)
  {
    alert(current_ss_not_unshipped);
    return false;
  }
  var msg = '';
  if (address.length == 0)
  {
    msg += address_name_not_null + "\n";
  }
  if (consignee.length == 0)
  {
    msg += consignee_not_null + "\n";
  }

  if (msg.length > 0)
  {
    alert(msg);
    return false;
  }
  else
  {
    return true;
  }
}

/* *
 * 会员余额申请
 */
function submitSurplus()
{
  var frm            = document.forms['formSurplus'];
  var surplus_type   = frm.elements['surplus_type'].value;
  var surplus_amount = frm.elements['amount'].value;
  var process_notic  = frm.elements['user_note'].value;
  var payment_id     = 0;
  var msg = '';

  if (surplus_amount.length == 0 )
  {
    msg += surplus_amount_empty + "\n";
  }
  else
  {
    var reg = /^[\.0-9]+/;
    if ( ! reg.test(surplus_amount))
    {
      msg += surplus_amount_error + '\n';
    }
  }

  if (process_notic.length == 0)
  {
    msg += process_desc + "\n";
  }

  if (msg.length > 0)
  {
    alert(msg);
    return false;
  }

  if (surplus_type == 0)
  {
    for (i = 0; i < frm.elements.length ; i ++)
    {
      if (frm.elements[i].name=="payment_id" && frm.elements[i].checked)
      {
        payment_id = frm.elements[i].value;
        break;
      }
    }

    if (payment_id == 0)
    {
      alert(payment_empty);
      return false;
    }
  }

  return true;
}

/* *
 *  处理用户添加一个红包
 */
function addBonus()
{
  var frm      = document.forms['addBouns'];
  var bonus_sn = frm.elements['bonus_sn'].value;

  if (bonus_sn.length == 0)
  {
    alert(bonus_sn_empty);
    return false;
  }
  else
  {
    var reg = /^[0-9]{10}$/;
    if ( ! reg.test(bonus_sn))
    {
      alert(bonus_sn_error);
      return false;
    }
  }

  return true;
}

/* *
 *  合并订单检查
 */
function mergeOrder()
{
  if (!confirm(confirm_merge))
  {
    return false;
  }

  var frm        = document.forms['formOrder'];
  var from_order = frm.elements['from_order'].value;
  var to_order   = frm.elements['to_order'].value;
  var msg = '';

  if (from_order == 0)
  {
    msg += from_order_empty + '\n';
  }
  if (to_order == 0)
  {
    msg += to_order_empty + '\n';
  }
  else if (to_order == from_order)
  {
    msg += order_same + '\n';
  }
  if (msg.length > 0)
  {
    alert(msg);
    return false;
  }
  else
  {
    return true;
  }
}

/* *
 * 订单中的商品返回购物车
 * @param       int     orderId     订单号
 */
function returnToCart(orderId)
{
  Ajax.call('user.php?act=return_to_cart', 'order_id=' + orderId, returnToCartResponse, 'POST', 'JSON');
}

function returnToCartResponse(result)
{
  alert(result.message);
}

/* *
 * 检测密码强度
 * @param       string     pwd     密码
 */
function checkIntensity(pwd)
{
  var Mcolor = "#FFF",Lcolor = "#FFF",Hcolor = "#FFF";
  var m=0;

  var Modes = 0;
  for (i=0; i<pwd.length; i++)
  {
    var charType = 0;
    var t = pwd.charCodeAt(i);
    if (t>=48 && t <=57)
    {
      charType = 1;
    }
    else if (t>=65 && t <=90)
    {
      charType = 2;
    }
    else if (t>=97 && t <=122)
      charType = 4;
    else
      charType = 4;
    Modes |= charType;
  }

  for (i=0;i<4;i++)
  {
    if (Modes & 1) m++;
      Modes>>>=1;
  }

  if (pwd.length<=4)
  {
    m = 1;
  }

  switch(m)
  {
    case 1 :
      Lcolor = "2px solid red";
      Mcolor = Hcolor = "2px solid #DADADA";
    break;
    case 2 :
      Mcolor = "2px solid #f90";
      Lcolor = Hcolor = "2px solid #DADADA";
    break;
    case 3 :
      Hcolor = "2px solid #3c0";
      Lcolor = Mcolor = "2px solid #DADADA";
    break;
    case 4 :
      Hcolor = "2px solid #3c0";
      Lcolor = Mcolor = "2px solid #DADADA";
    break;
    default :
      Hcolor = Mcolor = Lcolor = "";
    break;
  }
  if (document.getElementById("pwd_lower"))
  {
    document.getElementById("pwd_lower").style.borderBottom  = Lcolor;
    document.getElementById("pwd_middle").style.borderBottom = Mcolor;
    document.getElementById("pwd_high").style.borderBottom   = Hcolor;
  }


}

function changeType(obj)
{
  if (obj.getAttribute("min") && document.getElementById("ECS_AMOUNT"))
  {
    document.getElementById("ECS_AMOUNT").disabled = false;
    document.getElementById("ECS_AMOUNT").value = obj.getAttribute("min");
    if (document.getElementById("ECS_NOTICE") && obj.getAttribute("to") && obj.getAttribute('fee'))
    {
      var fee = parseInt(obj.getAttribute("fee"));
      var to = parseInt(obj.getAttribute("to"));
      if (fee < 0)
      {
        to = to + fee * 2;
      }
      document.getElementById("ECS_NOTICE").innerHTML = notice_result + to;
    }
  }
}

function calResult()
{
  var amount = document.getElementById("ECS_AMOUNT").value;
  var notice = document.getElementById("ECS_NOTICE");

  reg = /^\d+$/;
  if (!reg.test(amount))
  {
    notice.innerHTML = notice_not_int;
    return;
  }
  amount = parseInt(amount);
  var frm = document.forms['transform'];
  for(i=0; i < frm.elements['type'].length; i++)
  {
    if (frm.elements['type'][i].checked)
    {
      var min = parseInt(frm.elements['type'][i].getAttribute("min"));
      var to = parseInt(frm.elements['type'][i].getAttribute("to"));
      var fee = parseInt(frm.elements['type'][i].getAttribute("fee"));
      var result = 0;
      if (amount < min)
      {
        notice.innerHTML = notice_overflow + min;
        return;
      }

      if (fee > 0)
      {
        result = (amount - fee) * to / (min -fee);
      }
      else
      {
        //result = (amount + fee* min /(to+fee)) * (to + fee) / min ;
        result = amount * (to + fee) / min + fee;
      }

      notice.innerHTML = notice_result + parseInt(result + 0.5);
    }
  }
}
