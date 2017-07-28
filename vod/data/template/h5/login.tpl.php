<form role="form" action="login.php" method="post" name="login">
    <input type="hidden" value="2" name="step" />
    <div class="form-group">
        <label for="username">用户名</label><input type="text" class="form-control" id="username" name="username" />
    </div>
    <div class="form-group">
        <label for="password">密码</label><input type="password" class="form-control" id="password" name="password" />
    </div>
    <div class="checkbox">
        <label>
                                <input type="radio" name="cktime" value="31536000" checked="checked" /> 一年
                                <input type="radio" name="cktime" value="2592000" /> 一个月
                                <input type="radio" name="cktime" value="86400" /> 一天
                                <input type="radio" name="cktime" value="3600" /> 一小时
                                <input type="radio" name="cktime" value="0" /> 即时
                            </label>
    </div>
    <center><input name="submit" type="submit" value="登 录" class="btn btn-primary btn-lg btn-block" /></center>
</form>