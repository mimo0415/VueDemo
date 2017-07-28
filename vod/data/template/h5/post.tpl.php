<script type="text/javascript" src="js/validform/validform_min.js"></script>
<script type="text/javascript" src="<?php echo $imgpath;?>/<?php echo $stylepath;?>/post.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#postform").Validform({
            showAllError: true,
            tiptype: 3
        });

    });

    function playgroup_add() {
        var caption = '每行输入一个视频地址<br>格式：<span style="color: green">视频地址</span>,<span style="color: red">标题</span><br>说明：视频地址与标题之间用","分开，标题部分为可选项，可省略。';
        var html = '<select class="form-control" name="video[pid][]"><?php echo $video['player']['0'];?></select><br /><textarea class="form-control" name="video[urls][]" cols="80" rows="8" style="margin: 5px 0px;" wrap="off" datatype="*" nullmsg="视频地址不能为空！"><?php echo $value;?></textarea><input type="button" class="btn btn-default" onclick="playgroup_del(this);" value="删除" /><span class="Validform_checktip"></span>';
        $("#post_url").append('<div class="form-group"><label>' + caption + '</label><br>' + html + '</div>');
    }

    function playgroup_del(obj) {
        $(obj).parent().remove();
    }
</script>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php if($action=='new') { ?>发布视频
            <?php } else { ?>编辑视频
            <?php } ?>
        </h3>
    </div>
    <div class="panel-body">
        <form role="form" method="post" name="from" id="postform" action="post.php" enctype="multipart/form-data">
            <input type="hidden" name="action" value="<?php echo $action;?>" />
            <input type="hidden" value="2" name="step" />
            <?php if($action=='modify') { ?>
            <input type="hidden" value="<?php echo $video['vid'];?>" name="video[vid]" />
            <?php } ?>
            <div class="form-group">
                <label>所属类别</label>
                <select class="form-control" name="video[cid]">
            <?php echo $_class_opt;?>
        </select>
            </div>
            <div class="form-group">
                <label>国家/地区</label>
                <select class="form-control" name="video[nid]">
                        <?php echo $_nation_opt;?>
                </select>
            </div>
            <div class="form-group">
                <label>标题</label>
                <input class="form-control" type="text" name="video[subject]" id="subject" size="30" value="<?php echo $video['subject'];?>" datatype="*" ajaxurl="ajax.php?action=check_video_subject&type=<?php echo $action;?>&vid=<?php echo $video['vid'];?>" nullmsg="视频标题不能为空！" />
            </div>
            <div class="form-group">
                <label>标签[<a href="#" onclick="this.blur();alert('其他用户可以通过标签方便的找到这个节目');return false;">说明</a>]</label>
                <input class="form-control" type="text" name="video[tag]" value="<?php echo $video['tag'];?>" /> (多个标签、演员或导演请用空格或","隔开)
            </div>
            <div class="form-group">
                <label>领衔主演</label>
                <input class="form-control" type="text" name="video[playactor]" value="<?php echo $video['playactor'];?>" />
            </div>
            <div class="form-group">
                <label>导演</label>
                <input class="form-control" type="text" name="video[director]" value="<?php echo $video['director'];?>" />
            </div>
            <?php if($db_yearstart!='' && $db_yearend!='') { ?>
            <div class="form-group">
                <label>发行年份</label>
                <select class="form-control" name="video[year]">
                    <option value="">未知</option>
                    <?php for($i=$db_yearstart;$i<=$db_yearend;$i++) { ?>                        <option value="<?php echo $i;?>"<?php echo $year[$i];?>><?php echo $i;?></option>
                    <?php } ?>                </select>
            </div>
            <?php } ?>
            <div class="form-group">
                <label>影片状态</label>
                <select class="form-control" name="video[serialise]">
                    <option value="0"<?php echo $serialise_0;?>>完结</option>
                    <option value="1"<?php echo $serialise_1;?>>连载</option>
                </select>
            </div>
            <div class="form-group">
                <label>备注</label>
                <input class="form-control" type="text" name="video[memo]" value="<?php echo $video['memo'];?>" />
            </div>
            <div class="form-group">
                <label>内容简介</label>
                <?php echo create_kindeditor('synopsis','video[synopsis]',300,200, $video['synopsis']); ?>            </div>
            <div class="form-group">
                <label>海报 <br />允许上传格式: <?php echo $db_picfiletype;?> <br />允许上传大小: <?php echo ceil($db_picmaxsize / 1024); ?>KB</label>
                <?php if($action=='modify') { ?>
                <div class="f-mb5"><img src="<?php echo $img;?>" style="width: 95px; height: 127px;" /></div>
                <?php } ?>
                <?php if($db_uploadvodpic) { ?>
                <div style="margin-bottom: 3px;">图片上传 <input name="video[image]" type="file" size="30" class="form-control" onchange="image_change(this)" /></div>
                <?php } ?>
                <div>图片地址 <input name="video[imgurl]" type="text" size="30" class="form-control" />
                    <input name="video[downimg]" type="checkbox" value="1" />下载图片 [地址必须是以 http://开头的路径]</div>
            </div>
            <div id="post_url">
                <div class="form-group">
                    <label>播放组控制: <input type="button" class="btn btn-info" onclick="playgroup_add();return false;" value="添加播放组" /></label>
                </div>

                <?php if(is_array($video['urls'])) { foreach($video['urls'] as $key => $value) { ?>                <div class="form-group">
                    <label>每行输入一个视频地址<br>格式：<span style="color: green">视频地址</span>,<span style="color: red">标题</span><br>说明：视频地址与标题之间用","分开，标题部分为可选项，可省略。</label><br>
                    <select class="form-control" name="video[pid][]"><?php echo $video['player'][$key];?></select><br />
                    <textarea class="form-control" name="video[urls][]" cols="80" rows="8" style="margin: 5px 0px;" wrap="off" datatype="*" nullmsg="视频地址不能为空！"><?php echo $value;?></textarea>
                    <input type="button" class="btn btn-default" onclick="playgroup_del(this);" value="删除" />
                    <span class="Validform_checktip"></span>
                </div>
                <?php } } ?>            </div>
            <button type="submit" id="submit_button" class="btn btn-primary btn-lg btn-block">提 交</button>
        </form>
    </div>
    <div class="panel-footer">
    </div>
</div>
<script>
    $('.kindeditor').children().children().width = 350;
</script>