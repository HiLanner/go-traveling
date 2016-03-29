$(document).ready(function(){
    $(".input_name").next('input').each(function(index){
        var user_name = $(".user-table input[name='user_name']");
        var email = $(".user-table input[name='email']");
        var pwd = $(".user-table input[name='pwd']");
        var dbpwd = $(".user-table input[name='dbpwd']");
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
    });
});