<ul class="breadcrumb">
    <li>
        <a href="#">当前位置: <?php echo $navpath;?></a>
    </li>
</ul>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            视频详细信息
        </h3>
    </div>
    <div class="panel-body">
        <div><?php echo $player;?></div>
    </div>
    <div class="panel-footer">
        <?php if(is_array($urldb)) { foreach($urldb as $pg => $msg) { ?>        <div class="caption">
            <h4><?php echo $msg['player'];?> 播放组<?php echo $msg['playgroup'];?></h4>
            <div class="content">
                <?php if(is_array($msg['urls'])) { foreach($msg['urls'] as $key => $v) { ?>                <a class="btn btn-primary" href="play.php?vid=<?php echo $video['vid'];?>&playgroup=<?php echo $msg['playgroup'];?>&index=<?php echo $key;?>" title="<?php echo $v['caption'];?>"><?php echo $v['caption'];?></a>
                <?php } } ?>                <div class="f-cb"></div>
            </div>
        </div>
        <?php } } ?>    </div>
</div>