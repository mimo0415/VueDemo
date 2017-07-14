$(function(){
    GetCookie();
    $('#btnSignUp').click(function(){
        window.location.href="../../signup.php";
    });
    // $('#btnSignIn').click(function(){
    //     var UserName=$('#inputUserName').val();
    //     var Password=$('#inputPassword').val();
    //     if(UserName==''){
    //         $('#errmsg').html("<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>警告！</strong>请输入用户名。</div>");
    //         return;
    //     }
    //     if(Password==''){
    //         $('#errmsg').html("<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>警告！</strong>请输入密码。</div>");
    //         return;
    //     }
    //     SetCookie();
    //     $.ajax({
    //         type:"post",
    //         url:"Account/SignIn",
    //         data:{"UserName":UserName,"Password":Password},
    //         success:function(res){
    //             if(res.Status=="F"){
    //                 $('#errmsg').html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>登录失败！</strong>用户名或密码错误。</div>");
    //             }else{
    //                 window.location.href="/Main/Index";
    //             }
    //         },
    //         error:function(res){
    //         }
    //     });
    //
    // });
});

function SetCookie(){
    var UserName=$('#inputUserName').val();
    if($('#ckbRm')[0].checked){
        $.cookie('username',UserName,{expires:7});
    }else{
        $.cookie('username',null);
    }
}

function GetCookie(){
    var UserName=$.cookie('username');
    if(UserName!=null&&UserName!=''){
        $('#inputUserName').val(UserName);
        $('#ckbRm')[0].checked=true;
    }
}
