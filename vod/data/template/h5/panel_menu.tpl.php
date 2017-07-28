<li class="active">
    <a href="<?php echo $db_bfn;?>">首页</a>
</li><?php $cdb = pv_loop('class',"cid=0"); if(is_array($cdb)) { foreach($cdb as $c) { ?><li><a href="category.php?cid=<?php echo $c['cid'];?>" rel="submenu<?php echo $c['cid'];?>"><?php echo $c['caption'];?></a></li><?php $mainarray[]=$c['cid']; } } ?>