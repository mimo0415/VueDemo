<script type="text/javascript" src="js/score/score.js"></script>
<script type="text/javascript">
    $('#score_show').ready(function() {
        score_show(<?php echo $video['vid'];?>, <?php echo $video['star'];?>);
    });
</script>
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
        <img alt="<?php echo $video['picurl'];?>" src="<?php echo $video['picurl'];?>" />
        <div class="caption">
            <h3>
                <?php echo $video['subject'];?>
            </h3>
            <p class="line"><?php echo $video['class_name'];?> <span class="f-gray">(栏目)</span> &nbsp; <?php echo $video['nation_name'];?> <span class="f-gray">(地区)</span> &nbsp;
                <?php echo $video['serialise']>0 ? '连载至第'.$video['serialise'].'集' : '完结'; ?><span class="f-gray">(状态)</span> &nbsp; <?php echo $video['author'];?> <span class="f-gray">(会员)</span></p>
            <p>演员: <?php echo $video['playactor_link'];?></p>
            <p>导演: <?php echo $video['director_link'];?></p>
            <p>标签: <?php echo $video['tag_link'];?></p>
            <p>年代: <?php echo $video['year'];?></p>
            <p>评分:
                <span id="score_show"></span><?php echo $video['star'];?> (<?php echo $video['usernth'];?>人参与评分)</p>

            <p>人气: <?php echo $video['hits'];?></p>
            <p>发布时间:
                <?php echo get_date($video['postdate'], 'Y-m-d H:i'); ?>&nbsp; 更新时间:
                <?php echo get_date($video['lastdate'], 'Y-m-d H:i'); ?>            </p>
            <p>备注: <?php echo $video['memo'];?></p>
        </div>
        <div class="caption">
            <h4>视频简介</h4>
            <div class="content"><?php echo $video['synopsis'];?></div>
        </div>
        <?php if(is_array($urldb)) { foreach($urldb as $playgroup => $msg) { ?>        <div class="caption">
            <h4><?php echo $msg['player'];?> 播放组<?php echo $msg['playgroup'];?></h4>
            <div class="content">
                <?php if(is_array($msg['urls'])) { foreach($msg['urls'] as $key => $v) { ?>                <a class="btn btn-primary" href="play.php?vid=<?php echo $video['vid'];?>&playgroup=<?php echo $msg['playgroup'];?>&index=<?php echo $key;?>" title="<?php echo $v['caption'];?>"><?php echo $v['caption'];?></a>
                <?php } } ?>                <div class="f-cb"></div>
            </div>
        </div>
        <?php } } ?>        <?php if($db_reply=='1') { ?>
        <?php include gettpl('panel_reply'); ?>        <?php } ?>
    </div>
    <div class="panel-footer">
    </div>
</div>