<?php if($groupid=='guest') { ?>
<ul class="dropdown-menu">
    <li>
        <a href="register.php">注册</a>
    </li>
    <li>
        <a href="login.php">登录</a>
    </li>
</ul>
<?php } else { ?>
<ul class="dropdown-menu">
    <li>
        <a href="#">您好，<?php echo $username;?>！</a>
    </li>
    <li class="divider">
    </li>
    <?php if($gp_allowpost=='1') { ?>
    <li>
        <a href="post.php">发布视频</a>
    </li>
    <?php } ?>
    <?php if(is_array($hackdb['1'])) { foreach($hackdb['1'] as $h) { ?>    <li>
        <a href="hack.php?hackname=<?php echo $h['directory'];?>"><?php echo $h['name'];?></a>
    </li>
    <?php } } ?>    <?php if($SYSTEM['allowadmincp']=='1') { ?>
    <li>
        <a href="admin.php" target="_blank">后台管理</a>
    </li>
    <?php } ?>
    <li>
        <a href="search.php">搜索</a>
    </li>
    <li>
        <a href="login.php?action=quit">[退出]</a>
    </li>

</ul>
<?php } ?>