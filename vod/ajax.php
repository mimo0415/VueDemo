<?php
require_once 'global.php';
header("Content-type: text/html;charset=$db_charset");
header("Cache-Control: no-cache, must-revalidate"); //不缓存数据
initvar('action', 'GP', 0);

//影片评分
if($action == 'videostar')
{
	initvar(array('vid', 'starnum'), 'GP', 2);
	$cookievalue = getcookie('videostar');
	if(strpos(',' . $cookievalue . ',', ',' . $vid . ',') === false)
	{
		$info = $db->get_one("SELECT usernth,fraction,star FROM pv_video WHERE vid='$vid'");
		$info['usernth'] += 1;
		$info['fraction'] += $starnum * 2;
		$info['star'] = $info['fraction'] / $info['usernth'];
		$db->update("UPDATE pv_video SET usernth='$info[usernth]', fraction='$info[fraction]', star='$info[star]' WHERE vid='$vid'");
		$cookievalue = $cookievalue == '' ? $vid : $cookievalue . ',' . $vid;
		cookie('videostar', $cookievalue);
		exit(lang('ajax_star_success'));
	}
	else
	{
		exit(lang('ajax_star_error'));
	}
}
//检测视频标题
elseif($action == 'check_video_subject')
{
	initvar(array('param','type'), 'GP', 0);
	initvar('vid', 'GP', 2);
	$subject = $param;
	if(trim($subject) == '')
		exit('{"info":"' . lang('ajax_check_subject_empty') . '","status":"n"}');

	if($db_charset != 'utf-8')
	{
		$subject = str_convert($subject, $db_charset, 'utf-8');
	}
	$r = $db->get_one("SELECT vid FROM pv_video WHERE subject='$subject'");
	
	if(empty($r) || ($type == 'modify' && $vid == $r['vid']))
		exit('{"info":"' . lang('ajax_check_subject_yes') . '","status":"y"}');
	else 
		exit('{"info":"' . lang('ajax_check_subject_no') . '","status":"n"}');
}
//收藏视频
elseif($action == 'add_favorite')
{
	initvar('vid', 'GP', 2);
	if($groupid == 'guest') exit(lang('guest_error'));

	$r = $db->get_one("SELECT fid FROM pv_favorite WHERE uid='$uid' AND vid='$vid'");
	if(!$r)
	{
		$db->update("INSERT INTO pv_favorite(vid,uid,timestamp) VALUES('$vid','$uid','$timestamp')");
		exit(lang('ajax_favorite_success'));
	}
	else
	{
		exit(lang('ajax_favorite_exists'));
	}
}
//检测验证码
elseif($action == 'check_gdcode')
{
	initvar('param','GP',0);
	$gdcode = $param;
	if(!gdconfirm($gdcode))
		exit('{"info":"' . lang('ajax_check_gdcode_0') . '","status":"n"}');
	else 
		exit('{"info":"' . lang('ajax_check_gdcode_1') . '","status":"y"}');
}
//检测用户名
elseif($action == 'check_username')
{
	initvar('param', 'GP', 0);
	$username = $param;
	if($db_charset != 'utf-8')
	{
		$username = str_convert($username, $db_charset, 'utf-8');
	}

	/* phpvod */
	$t = checkname($username);
	if($t != 1)
		exit('{"info":"' . lang('ajax_check_username_' . $t) . '","status":"n"}');


	exit('{"info":"' . lang('ajax_check_username_success') . '","status":"y"}');
}
//检测Email
elseif($action == 'check_email')
{
	initvar('param', 'GP', 0);
	$email = $param;
	/* phpvod */
	if(checkemail($email) == 0)
		exit('{"info":"' . lang('ajax_check_email_0') . '","status":"n"}');

	$t = $db->get_one("SELECT uid FROM pv_members WHERE email='$email'");
	if(!empty($t))
		exit('{"info":"' . lang('ajax_check_email_1') . '","status":"n"}');
	exit('{"info":"' . lang('ajax_check_email_success') . '","status":"y"}');

}
//重发验证邮件
elseif($action == 'resend_email')
{
	initvar('yzuid', 'P', 2);
	$yzuid != $uid && exit(lang('ajax_resend_email_-1'));
	$u = $db->get_one("SELECT * FROM pv_members WHERE uid='$yzuid'");
	!$u && exit(lang('ajax_resend_email_-3'));
	$u['groupid'] != '4' && exit(lang('ajax_resend_email_-2'));
	!checkemail($u['email']) && exit(lang('ajax_check_email_0'));
	if(($timestamp-$u['yz']) < 86400) exit(lang('ajax_resend_email_0')); //24小时内只允许发送一次邮件
	
	$subject = lang('email_check_subject',array($db_wwwname));
	$message = lang('email_check_content',array($u['username'],$db_wwwname,$db_wwwurl,$u['uid'],$timestamp,'******'));
	if(sendemail(array($u['email']), $subject, $message))
	{
		$db->update("UPDATE pv_members SET yz='$timestamp' WHERE uid='$yzuid'");
		exit(lang('ajax_resend_email_1'));
	}
	else
	{
		exit(lang('ajax_resend_email_2'));
	}
}
//搜索自动完成
elseif($action == 'search_auto_complete')
{
	initvar('keyword', 'GP', 0);
	$r = '';
	if(!empty($keyword))
	{
		$result = $db->query("SELECT vid,subject FROM pv_video WHERE subject LIKE '%$keyword%' ORDER BY postdate DESC LIMIT 10");
		while ($row = $db->fetch_array($result))
		{
			$j = '"value":"'.$row['subject'] . '"';
			$j = '{' . $j . '}';
			$r .= empty($r) ? $j : ',' . $j;
		}
	}
	else
	{
		if(!empty($db_hotsearch))
		{
			$hot_search_array = explode(',', $db_hotsearch);
			foreach ($hot_search_array as $value)
			{
				if(empty($value)) continue;
				$j = '"value":"' . $value . '"';
				$j = '{' . $j . '}';					
				$r .= empty($r) ? $j : ',' . $j;
			}
		}
	}
	!empty($r) && $r = '[' . $r . ']';
	exit($r);
}

/**
 * 格式化字符串
 * @param array $arr
 */
function strfmt($arr)
{
	global $imgpath, $stylepath;
	$str = '';
	if(isset($arr['pic'])) $str .= '<img src="' . $imgpath . '/' . $stylepath . '/' . $arr['pic'] . '" /> ';
	if(isset($arr['str']))
	{
		if(isset($arr['color']))
			$str .= '<span style="color: ' . $arr['color'] . '">' . $arr['str'] . '</span>';
		else
			$str .= $arr['str'];
	}
	echo $str;
}

?>