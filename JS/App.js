var vm = new Vue({
    el: '#app',
    data: {
        message: 'test',
        errContent: '',
        errShow: false,
        uname: '',
        uemail: '',
        upwd: '',
        upwd2: '',
        LoginRequest: {
            'UserName': '',
            'Password': ''
        },
        LoginResponse: {
            'Code': '',
            'Msg': '',
            'Users': []
        }
    },
    methods: {
        login: function() {
            if (this.uname == '' && this.upwd == '') {
                this.errContent = "请输入用户名和密码。";
                this.errShow = true;
                return;
            } else if (this.uname == '') {
                this.errContent = "请输入用户名。";
                this.errShow = true;
                return;
            } else if (this.upwd == '') {
                this.errContent = "请输入密码。";
                this.errShow = true;
                return;
            }
            this.LoginRequest.UserName = this.uname;
            this.LoginRequest.Password = this.upwd;
            reqwest({
                url: 'http://localhost:8080/api/userApi.php?action=login',
                method: 'POST',
                type: 'json',
                crossOrigin: true,
                data: this.LoginRequest,
                success: function(resp) {
                    this.LoginResponse = resp;
                }
                alert(this.LoginResponse.Code);
            });
        },
        gotoReg: function() {
            window.location.href = 'register.html';
        },
        register: function() {
            alert('注册成功');
        },
        regCancel: function() {
            if (confirm('确定要取消注册吗？')) {
                window.location.href = 'login.html';
            }
        }
    }
});