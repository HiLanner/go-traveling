
function checkRegister(){
    $(".reg_name").next('input').each(function(index){
        var user_name = $(".reg_table input[name='user_name']");
        var email = $(".reg_table input[name='email']");
        var pwd = $(".reg_table input[name='pwd']");
        var dbpwd = $(".reg_table input[name='dbpwd']");
        var true_email = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        var true_phoneNum = /^(13[0-9]|15[0|3|6|7|8|9]|18[8|9])\d{8}$/;
        $(this).focus(function(){
            $(this).next('span').css("display","inline-block");
        });
        $(this).blur(function(){
                if($(this).val().length==0){
                     $(this).next('span').removeClass("tips_error");
                     $(this).next('span').addClass("tips_error");
                     $(this).next('span').text("不能为空");
                }else{
                    switch(index){
                        case 0:
                        if(user_name.val().length<6||user_name.val().length>20){
                           $(this).next('span').removeClass("tips");
                           $(this).next('span').addClass("tips_error");
                           $(this).next('span').text("请输入正确长度的字符");}
                           else{
                            $(this).next('span').removeClass("tips_error");
                            $(this).next('span').addClass("tips");
                            $(this).next('span').text("格式正确");
                           }
                           break;
                        case 1:
                        if(!(true_phoneNum.test(email.val())||true_email.test(email.val()))){
                           $(this).next('span').removeClass("tips");
                           $(this).next('span').addClass("tips_error");
                           $(this).next('span').text("格式有误");
                        }else{
                            $(this).next('span').removeClass("tips_error");
                            $(this).next('span').addClass("tips");
                            $(this).next('span').text("格式正确");
                           }
                        break; 
                        case 2:
                        if(pwd.val().length<6||pwd.val().length>16){
                           $(this).next('span').removeClass("tips");
                           $(this).next('span').addClass("tips_error");
                           $(this).next('span').text("请输入正确长度的字符");}
                           else{
                            $(this).next('span').removeClass("tips_error");
                            $(this).next('span').addClass("tips");
                            $(this).next('span').text("格式正确");
                           }
                           break;
                        case 3:
                        if(dbpwd.val()!=pwd.val()){
                           $(this).next('span').removeClass("tips");
                           $(this).next('span').addClass("tips_error");
                           $(this).next('span').text("两次密码不一致");}
                           else{
                            $(this).next('span').removeClass("tips_error");
                            $(this).next('span').addClass("tips");
                            $(this).next('span').text("格式正确");
                           }
                           break;
                    }
                
             }
        });
        $(this).focus(function(){                
                    switch(index){
                        case 0:                        
                           $(this).next('span').text("6-20位由汉字,字母,下划线组成");
                           break;
                        case 1:                        
                           $(this).next('span').text("输入有效的手机号或电子邮件");
                        break; 
                        case 2:
                           $(this).next('span').text("密码由6-16位有效的数字,字母标点符号下划线组成")
                           break;
                        case 3:                        
                           $(this).next('span').text("请再次输入密码");                           
                           break;
                    }
        });
    });
}
function checkLogin(){
  $(".login_name").next('input').each(function(index){
        var email = $(".login-table input[name='email']");
        var pwd = $(".login-table input[name='pwd']");
        var true_email = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        var true_phoneNum = /^(13[0-9]|15[0|3|6|7|8|9]|18[8|9])\d{8}$/;
        $(this).focus(function(){
            $(this).next('span').css("display","inline-block");
        });
        $(this).blur(function(){
                if($(this).val().length==0){
                     $(this).next('span').removeClass("tips_error");
                     $(this).next('span').addClass("tips_error");
                     $(this).next('span').text("不能为空");
                }else{
                    switch(index){
                        case 0:
                        if(!(true_phoneNum.test(email.val())||true_email.test(email.val()))){
                           $(this).next('span').removeClass("tips");
                           $(this).next('span').addClass("tips_error");
                           $(this).next('span').text("格式有误");
                        }else{
                            $(this).next('span').removeClass("tips_error");
                            $(this).next('span').addClass("tips");
                            $(this).next('span').text("格式正确");
                           }
                        break; 
                        case 1:
                        if(pwd.val().length<6||pwd.val().length>16){
                           $(this).next('span').removeClass("tips");
                           $(this).next('span').addClass("tips_error");
                           $(this).next('span').text("请输入正确长度的字符");}
                           else{
                            $(this).next('span').removeClass("tips_error");
                            $(this).next('span').addClass("tips");
                            $(this).next('span').text("格式正确");
                           }
                           break;
                      
                    }
                
             }
        });
        $(this).focus(function(){                
                    switch(index){
                        case 0:                        
                           $(this).next('span').text("输入有效的手机号或电子邮件");
                        break; 
                        case 1:
                           $(this).next('span').text("密码由6-16位有效的数字,字母标点符号下划线组成")
                           break;
                    }
        });
    });
}
function checkPost(){
  var spanText = $(".input_name").next('input').next('span');
  var i=0;
  var tureTxt = "格式正确";
  $(spanText).each(function(index){
    var indexSpan = $(this).text();
          if (tureTxt != indexSpan) {
            i++;
          };
  });
  if (i>0) {
    return false;
  };
}
function changePosition(){
  var newNode = document.getElementById("error");
  var oldNode = document.getElementsByClassName("user-table")[0];
  var oldTag = oldNode.getElementsByTagName("form")[0];
  oldNode.insertBefore(newNode,oldTag);
}
function changeInformation(){
  var true_email = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
  var true_phoneNum = /^(13[0-9]|15[0|3|6|7|8|9]|18[8|9])\d{8}$/;
  var _email = $('.text-name').eq(0);
  var _pwd = $('.text-name').eq(1);
  $(".text-name").each(function(index){
     $(this).focus(function(){
            $(this).next('span').css("display","inline");
        });
     $(this).blur(function(){
                if($(this).val().length==0){
                     $(this).next('span').removeClass("tips_error");
                     $(this).next('span').addClass("tips_error");
                     $(this).next('span').text("不能为空");
                }else{
                    switch(index){
                        case 0:
                        if(!(true_phoneNum.test(email.val())||true_email.test(email.val()))){
                           $(this).next('span').removeClass("tips");
                           $(this).next('span').addClass("tips_error");
                           $(this).next('span').text("格式有误");
                        }else{
                            $(this).next('span').removeClass("tips_error");
                            $(this).next('span').addClass("tips");
                            $(this).next('span').text("格式正确");
                           }
                        break; 
                        case 1:
                        if(pwd.val().length<6||pwd.val().length>16){
                           $(this).next('span').removeClass("tips");
                           $(this).next('span').addClass("tips_error");
                           $(this).next('span').text("请输入正确长度的字符");}
                           else{
                            $(this).next('span').removeClass("tips_error");
                            $(this).next('span').addClass("tips");
                            $(this).next('span').text("格式正确");
                           }
                           break;
                      
                    }
                
             }
      $(this).focus(function(){                
                    switch(index){
                        case 0:                        
                           $(this).next('span').text("输入有效的手机号或电子邮件");
                        break; 
                        case 1:
                           $(this).next('span').text("密码由6-16位有效的数字,字母标点符号下划线组成")
                           break;
                    }
        });
        });
  })
  $(".txt-title").focus(function(){
    $(this).next("span").css("display","inline-block");
  })
  $(".txt-title").blur(function(){
    if($(this).text().length<5)
    $(this).next("span").text("标题字数不得少五个字符");
  })
}
$(document).ready(changeInformation(),checkRegister(),checkLogin(),changePosition());