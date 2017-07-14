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
            var _self = this;
            if (_self.uname == '' && _self.upwd == '') {
                _self.errContent = "请输入用户名和密码。";
                _self.errShow = true;
                return;
            } else if (_self.uname == '') {
                _self.errContent = "请输入用户名。";
                _self.errShow = true;
                return;
            } else if (_self.upwd == '') {
                _self.errContent = "请输入密码。";
                _self.errShow = true;
                return;
            }
            _self.LoginRequest.UserName = _self.uname;
            _self.LoginRequest.Password = _self.upwd;
            reqwest({
                url: 'http://192.168.203.103:8080/api/userApi.php?action=login',
                method: 'POST',
                type: 'json',
                crossOrigin: true,
                data: _self.LoginRequest,
                success: function(resp) {
                    _self.LoginResponse = resp;
                    if (_self.LoginResponse.Code == 0) {
                        alert('登录成功');
                    } else {
                        _self.errContent = _self.LoginResponse.Msg;
                        _self.errShow = true;
                    }
                }
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