<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2009 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 *
 *
 * $Source: /cvs_backup/e107_0.8/e107_plugins/poll/oldpolls.php,v $
 * $Revision$
 * $Date$
 * $Author$
 */

require_once("../../class2.php");
if (!e107::isInstalled('poll'))
{
	e107::redirect();
	exit;
}
require_once(HEADERF);
require_once(e_HANDLER."comment_class.php");
$cobj = new comment;

if(!defined("USER_WIDTH") && !deftrue('BOOTSTRAP'))
{
	define("USER_WIDTH","width:95%");
}

include_lan(e_PLUGIN."poll/languages/".e_LANGUAGE.".php");

if(e_QUERY)
{

	require_once('poll_class.php');

	$query = "SELECT p.*, u.user_id, u.user_name FROM #polls AS p
	LEFT JOIN #user AS u ON p.poll_admin_id = u.user_id
	WHERE p.poll_type=1 AND p.poll_id=".intval(e_QUERY);

	if($sql->gen($query))
	{
		$pl = new poll;
		$row = $sql ->fetch();

		$start_datestamp    = $tp->toDate($row['poll_datestamp'], "long");
		$end_datestamp      = $tp->toDate($row['poll_end_datestamp'], "long");
		$uparams            = array('id' => $row['user_id'], 'name' => $row['user_name']);
		$link               = e107::getUrl()->create('user/profile/view', $uparams);
		$userlink           = "<a href='".$link."'>".$row['user_name']."</a>";


		$text = $pl->render_poll($row, 'forum', 'oldpolls',true);


		$text .= "
		<div class='smalltext text-right'>
		<small>".POLLAN_35." ".$userlink."<br /> ".POLLAN_37." ".$start_datestamp." ".POLLAN_38." ".$end_datestamp."</small></div>
		";



	/*	$count = 0;

		$barl = (file_exists(THEME."images/barl.png") ? THEME."images/barl.png" : e_PLUGIN."poll/images/barl.png");
		$barr = (file_exists(THEME."images/barr.png") ? THEME."images/barr.png" : e_PLUGIN."poll/images/barr.png");
		$bar = (file_exists(THEME."images/bar.png") ? THEME."images/bar.png" : e_PLUGIN."poll/images/bar.png");

		foreach($optionArray as $option)
		{
			$text .= "
			<tr>
			<td style='width:40%; text-align: right' class='mediumtext'><b>".$tp -> toHTML($option, TRUE, 'TITLE')."</b>&nbsp;&nbsp;</td>
			<td class='smalltext'>
			<div style='background-image: url($barl); width: 5px; height: 14px; float: left;'>
			</div>
			<div style='background-image: url($bar); width: ".(floor($percentage[$count]) != 100 ? floor($percentage[$count]) : 95)."%; height: 14px; float: left;'>
			</div>
			<div style='background-image: url($barr); width: 5px; height: 14px; float: left;'>
			</div>
			".$percentage[$count]."% [".POLLAN_31.": ".$voteArray[$count]."]
			</td>
			</tr>\n";
			$count++;

		}
*/
		$query = "SELECT c.*, u.* FROM #comments AS c
		LEFT JOIN #user AS u ON c.comment_author_id = u.user_id
		WHERE comment_item_id=".intval($row['poll_id'])." AND comment_type='4' ORDER BY comment_datestamp";

		if ($comment_total = $sql->gen($query))
		{
			$text .= "<hr /><div>";

			while ($row2 = $sql->fetch())
			{
				$text .= e107::getComment()->render_comment($row2, 'poll', 'comment');
			}
			$text .= "</div>";
		}


	//	$text .= "</table>";
		$ns->tablerender(LAN_PLUGIN_POLL_NAME." #".$row['poll_id'], $text);
		echo "<hr />";
	}
}


	// Render List of Polls.


	$query = "SELECT p.*, u.user_name FROM #polls AS p
	LEFT JOIN #user AS u ON p.poll_admin_id = u.user_id
	WHERE p.poll_type=1
	ORDER BY p.poll_datestamp DESC";

	if(!$array = $sql->retrieve($query,true))
	{
		$ns->tablerender(POLLAN_28, "<div style='text-align:center'>".POLLAN_33."</div>");
		require_once(FOOTERF);
		exit;
	}

	$array = array_slice($array, 1);

	if(empty($array))
	{
		$ns->tablerender(POLLAN_28, "<div style='text-align:center'>".POLLAN_33."</div>");
		require_once(FOOTERF);
		exit;
	}

	$text = "<table class='table fborder' style='".USER_WIDTH."'>
	<colgroup>
		<col style='width: 55%;' />
		<col style='width: 15%;' />
		<col style='width: 30%;' />
	<thead>
	<tr>
	<th class='fcaption'>".LAN_TITLE."</th>
	<th class='fcaption'>".POLLAN_35."</th>
	<th class='fcaption'>".POLLAN_36."</th>
	</tr></thead><tbody>\n";


	foreach($array as $row)
	{

		$from = $tp->toDate($row['poll_datestamp'], "short");
		$to = $tp->toDate($row['poll_end_datestamp'], "short");

		$poll_title = $tp->toHtml($row['poll_title'], true, 'TITLE');

		$uparams = array('id' => $row['poll_admin_id'], 'name' => $row['user_name']);

		$link = e107::getUrl()->create('user/profile/view', $uparams);


		$userlink = "<a href='".$link."'>".$row['user_name']."</a>";
		$text .= "<tr>
		<td class='forumheader3' style='width: 55%;'><a href='".e_SELF."?".$row['poll_id']."'>{$poll_title}</a></td>
		<td class='forumheader3' style='width: 15%;'>".$userlink."</td>
		<td class='forumheader3' style='width: 30%;'>".$from." ".POLLAN_38." ".$to."</td>
		</tr>\n";
	}

	$text .= "</tbody></table>";
	e107::getRender()->tablerender(POLLAN_28, $text);
	require_once(FOOTERF);

?>
