<div class="panel-group" id="panel-647792">
    <div class="panel panel-default">
        <div class="panel-heading">
            <a class="panel-title" data-toggle="collapse" data-parent="#panel-647792" href="#panel-element-907130">最近更新</a>
        </div>
        <div id="panel-element-907130" class="panel-collapse collapse in">
            <div class="panel-body">
                <div class="row">
                    <?php $i=1; ?>                    <?php $videodb = pv_loop('video',"cid=-1|limit=10|order=lastdate DESC,postdate DESC,v.vid DESC"); if(is_array($videodb)) { foreach($videodb as $video) { ?>                    <?php if($i==1) { ?>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="read.php?vid=<?php echo $video['vid'];?>">
                                <img alt="<?php echo $video['picurl'];?>" src="<?php echo $video['picurl'];?>" />
                                <div class="caption">
                                    <h4>
                                        <?php echo $video['subject'];?>
                                    </h4>
                                    <p>类别: <?php echo $video['class_name'];?></p>
                                    <p>地区: <?php echo $video['nation_name'];?></p>
                                    <p>热度: <?php echo $video['hits'];?></p>
                                    <p>更新日期:
                                        <?php echo get_date($video['lastdate'], 'Y-m-d'); ?>                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="read.php?vid=<?php echo $video['vid'];?>">
                                <img alt="<?php echo $video['picurl'];?>" src="<?php echo $video['picurl'];?>" />
                                <div class="caption">
                                    <h4>
                                        <?php echo $video['subject'];?>
                                    </h4>
                                    <p>类别: <?php echo $video['class_name'];?></p>
                                    <p>地区: <?php echo $video['nation_name'];?></p>
                                    <p>热度: <?php echo $video['hits'];?></p>
                                    <p>更新日期:
                                        <?php echo get_date($video['lastdate'], 'Y-m-d'); ?>                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php $i++; ?>                    <?php } } ?>                </div>
            </div>
        </div>
    </div>
</div>