<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,8}$",$mainid) && !empty($mainid))callmsg("请求错误，该群组不存在或已被锁定或已被删除1！","-1");
if ( !ereg("^[0-9]{1,8}$",$fid) || empty($fid))callmsg("请求错误，该信息不存在或已被删除！","-1");
require_once wrzc_net.'sub/conn.php';
$rt = $db->query("SELECT mainid,title,flag,bmnum FROM ".__TBL_GROUP_CLUB__." WHERE flag>0 AND id=".$fid);
if($db->num_rows($rt)){
	$row = $db->fetch_array($rt);
	$mainid = $row['mainid'];
	$title = htmlout(stripslashes($row['title']));
	$flag = $row['flag'];
	$bmnum = $row['bmnum'];
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该信息不存在或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
exit;
}
$rt = $db->query("SELECT mbkind,title FROM ".__TBL_GROUP_MAIN__." WHERE id=".$mainid." AND flag=1");
if($db->num_rows($rt)){
	$row = $db->fetch_array($rt);
	$mbkind = $row['mbkind'];
	$maintitle = stripslashes($row['title']);
} else {
	echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该群组不存在或已被锁定或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
	exit;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $title; ?> 报名人员</title>
<link href="images/<?php echo $mbkind; ?>/group.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="980" height="62" border="0" align="center" cellpadding="0" cellspacing="0" style="border-top:#cccccc 1px solid;">
<tr>
<td valign="bottom" style="padding-top:2px;color:#cccccc;" class=tdbg2><img src="images/home.gif" hspace="5" vspace="2" align="absmiddle"><a href="<?php echo $Global['www_2domain']; ?>"><b><?php echo $Global['m_sitename']; ?>首页</b></a></td>
<td align="right" valign="bottom" class=tdbg2 style="padding-top:2px;color:#cccccc;padding-right:4px;"><a href="<?php echo $Global['www_2domain']; ?>/login.php">登录</a> | <a href="<?php echo $Global['www_2domain']; ?>/reg.php">注册</a> | <a href="<?php echo $Global['www_2domain']; ?>/my" ><b>管理中心</b></a></td>
</tr>
<tr>
<td height="62" colspan="2" style="font-size:20px;color:#999999;">「<font color="#000000" face="黑体,宋体" style="letter-spacing:1px;"><?php echo $maintitle; ?></font>」<font color="#666666" style="font-size:9pt;"><a href=<?php echo $Global['group_2domain'];?>/<?php echo $mainid; ?> target=_blank class=666666><?php echo $Global['group_2domain'];?>/<?php echo $mainid; ?></a></font></td>
</tr>
</table>
<table width="980" height="38" border="0" align="center" cellpadding="0" cellspacing="0" background="images/<?php echo $mbkind; ?>/1.gif" bgcolor="#FFFFFF">
<tr>
<td valign="top"><table height="36" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="<?php echo $Global['www_2domain'];?>" class="title">交友首页</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="<?php echo $mainid; ?>" class=title>圈子首页</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="article<?php echo $mainid; ?>.html" class="title">圈内话题</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/3.gif" style="padding-top:5px;"><a href="party<?php echo $mainid; ?>.html" class="titleselected">活动聚会</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="photo<?php echo $mainid; ?>.html" class="title">圈子相册</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="user<?php echo $mainid; ?>.html" class="title">圈子成员</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="<?php echo $Global['my_2domain']."/?i_group_invite.php?mainid=".$mainid;?>" class="title">邀请他人</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="post<?php echo $mainid; ?>.html" class="title">发表新话题</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="<?php echo $Global['my_2domain']."/?i_group.php";?>" class="title">圈子管理</a></td>
</tr>
</table></td>
</tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="F9F8F9" style="border-left:#dddddd 1px solid;border-right:#dddddd 1px solid;">
<tr>
<td valign="top" style="padding-top:2px;"><table width="968" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border-left:#dddddd 1px solid;border-top:#dddddd 1px solid;border-right:#dddddd 1px solid;">
<tr>
<td height="23" background="images/<?php echo $mbkind; ?>/5.gif" style="border-left:#ffffff 2px solid;border-right:#ffffff 2px solid;"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="71%" style="padding-top:3px;"><img src="images/<?php echo $mbkind; ?>/li.gif" width="5" height="15" hspace="5" align="absmiddle"> <font color="#FFFFFF"><b><?php echo "<a href=".$Global['group_2domain']."/".$mainid." class=title>".$maintitle."</a>"; ?>
<?php
echo " >> "."<a href=party".$mainid.".html class=title>俱乐部活动</a> >> "."<a href=partyshow".$fid.".html class=title>".$title."</a> >> </b>"."报名人员";
?></font></td>
    <td width="29%" align="right" valign="bottom"></td>
  </tr>
</table></td>
</tr>
</table>
</td>
</tr></table>
<table width="980" height="8" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr><td valign="top"></td>
</tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr><td><table width="940" border="0" align="center" cellpadding="0" cellspacing="1" class=tdbg4>
<form action="partyshow.php?fid=<?php echo $fid; ?>" method=post>
<tr>
  <td width="713" height="30" background="images/<?php echo $mbkind; ?>/tdbg.gif" style="font-size:10.3pt;font-weight:bold;padding-left:5px;border-left:#ffffff 1px solid;border-top:#ffffff 1px solid;">
    <table width="99%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:10.3pt;font-weight:bold;">
<font class=tiaose >活动名称：<img src="images/party.gif" width="17" height="12" hspace="5"><?php echo $title; ?></font></td>
</tr>
    </table></td>
  <td width="224" align="center" background="images/<?php echo $mbkind; ?>/tdbg.gif"  style="font-weight:bold;padding-left:5px;border-top:#ffffff 1px solid;border-right:#ffffff 1px solid;">已报名人数：<font color="#FF0000" face="Verdana, Arial" style="font-size:9pt;"><?php echo $bmnum; ?></font> 人</td>
</tr>
<tr>
  <td colspan="2" align="center" valign="top" bgcolor="#FFFFFF"><br>
    <table width="184" border="0" cellpadding="0" cellspacing="3">
      <tr>
        <td width="15" bgcolor="#FFFF00" style="border:#ffcc00 1px solid;">&nbsp;</td>
        <td width="172" valign="bottom">　<font color="#999999">边框黄色表示未审或未缴费</font></td>
      </tr>
      <tr>
        <td width="15" bgcolor="#FFFFFF" style="border:#dddddd 1px solid;">&nbsp;</td>
        <td valign="bottom">　<font color="#999999">边框白色表示正式通过</font></td>
      </tr>
      </table>
<?php
$rttop1 = $db->query("SELECT flag,userid,nicknamesexgradephoto_s FROM ".__TBL_GROUP_CLUB_USER__." WHERE clubid=".$fid." ORDER BY id DESC");
$totaltop1 = $db->num_rows($rttop1);
if($totaltop1>0){
	require_once wrzc_net.'sub/classx.php';
	$pagesize = 56;
	if ($p<1)$p=1;
	$mypage=new uobarpage($totaltop1,$pagesize);
	$pagelist = $mypage->pagebar(1);
	$pagelistinfo = $mypage->limit2();
	mysql_data_seek($rttop1,($p-1)*$pagesize);
?>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<?php
for($j=1;$j<=$pagesize;$j++) {
	$rowstop1 = $db->fetch_array($rttop1);
	if(!$rowstop1) break;
?>
  <td align="center" valign="top" bgcolor="#FFFFFF" style="padding-top:10px;">
		<table width="69" height="84" border="0" cellpadding="2" cellspacing="0" bgcolor="dddddd" style="margin-bottom:5px">
		<tr>
		<td height="50" align="center" <?php if ($rowstop1[0] == 0){echo "bgcolor=#ffff00";}else{echo "bgcolor=#ffffff";} ?> style="border:#<?php if ($rowstop1[0] == 0){echo "ffcc00";}else{echo "dddddd";} ?> 1px solid;"><a href="<?php echo $Global['home_2domain']; ?>/<?php echo $rowstop1[1]; ?>" target=_blank>
<?php 
if (!empty($rowstop1[1])){
$tmpusr = explode("|",$rowstop1[2]);
$nicknameusr = $tmpusr[0];
$sexusr = $tmpusr[1];
$gradeusr = $tmpusr[2];
$photo_susr = $tmpusr[3];
}
if (empty($photo_susr)){
echo "<img src=".$Global['www_2domain']."/images/65x80".$sexusr.".gif border=0>";
} else {
echo "<img src=".$Global['up_2domain']."/photo/".$photo_susr." width=65 height=80 border=0>";
}?></a></td>
		</tr>
		</table>
		<a href="<?php echo $Global['home_2domain']; ?>/<?php echo $rowstop1[1];?>" target=_blank><?php echo geticon($sexusr.$gradeusr).$nicknameusr;?></a></td>
  <?php if ($j % 8 == 0) {?>
</tr>
<tr>
<?php	} ?>
<?php } ?>
</tr>
</table>
		<table width="900" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
		<td align="right" valign="bottom"><style type="text/css"> 
.page1{border:#cccccc 1px solid;width:22px;height:20px;text-align:center;cursor: pointer;padding-top:2px;background:#FBF9F9;}
.page2{border:#cccccc 1px solid;width:22px;height:20px;text-align:center;background-color:#ffffcc;color:red;padding-top:2px;}
</style><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
		</tr>
		</table>
<?php } else {?>
    <br>
    <br>
    <font color="#999999">...暂时还没有人报名...</font>
<?php }?>    <br></td>
</tr>
</form>
</table></td>
</tr>
</table>
<table width="980" height="64" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr>
<td valign="top" style="padding-top:8px;"><br></td>
  </tr>
</table>
<table width="980" height="5" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg2.gif">
<tr>
<td valign="top"></td>
</tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td><img src="images/<?php echo $mbkind; ?>/4.gif" width="980" height="4"></td></tr></table><table width="980" height="34" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td width="21">&nbsp;</td><td align="center"><font color="#999999">&copy;版权所有</font></td>
<td width="22"><a href="#top"><img src="images/bl_top.gif" alt="返回页顶" width="22" height="15" border="0"></a></td></tr></table><br><br></body></html><?php ob_end_flush();?>