	<div class="helpers">
	<h3 class="subheader ">Summary of results for <span><?php echo $_POST["search"];?></span></h3>
	</div>
	<span class="clear"><!-- --></span>
    </div>
	<div class="search-left">
	<div class="search-header">
	<h2 class="header ">Search</h2>
	</div>
	<ul class="dynamic-menu" id="menu-search">
	<li class="">
	<a href="">
	<span class="arrow">Summary</span>
	</a>
	</li>
	<li>
	<a href="search.php"><span class="arrow">Characters<span> <?php 
	 
	echo "$num_rows \n"; ?>
	</span></span>
	</a>
	</li>
	<li>
	<a href="search_g.php">
	<span class="arrow">Guilds<span></span></span>
	</a>
	</li>
	<li class="item-active">
	<a href="search_a.php">
	<span class="arrow">Arena Teams<span></span></span>
	</a>
	</li>
	</ul>
    </div>
	<div class="view-table">
	<div class="table ">
	<table>
	<thead>
	<tr>
	<th width="15%" class=" first-child">
	<a href="" class="sort-link" >
	<span class="arrow">Name</span>
	</a>
	</th>
	<th width="6%">
	<a href="" class="sort-link" >
	<span class="arrow">Mode</span>
	</a>
	</th>
	<th width="6%">
	<a href="" class="sort-link" >
	<span class="arrow">Realm</span>
	</a>
	</th>
	<th width="6%">
	<a href="" class="sort-link" >
	<span class="arrow">Battlegroup</span>
	</a>
	</th>
	<th width="6%">
	<a href="" class="sort-link" >
	<span class="arrow">Faction</span>
	</a>
	</th>
	<th width="15%">
	<a href="" class="sort-link" >
	<span class="arrow">Rating</span>
	</a>
	</th>
	</tr>
	</thead>
	
	<?php
require ('configs.php');

function mysql_open($serveraddress, $serveruser, $serverpass){
	$conn = mysql_connect($serveraddress, $serveruser, $serverpass) or die(mysql_error());
	return $conn;
}
function mysql_end($resc){
	mysql_close($resc);
}

if (isset($_GET['arenaname'])) {
    $cont = new wowheadparser();
    $conn = mysql_open($serveraddress, $serveruser, $serverpass);
    $sql = "SELECT arenaTeamId,name,captainGuid,type,rating,rank,gender FROM `" . $server_cdb .
        "`.`arena_team` WHERE name='" . mysql_real_escape_string($_GET["arenaname"]) .
        "'";
    $result = mysql_query($sql, $conn) or die(mysql_error());
    if ($row = mysql_fetch_array($result)) {
        $items = show_items($row["arenaTeamId"]);
        $all = array_merge($items);
        $html->load('armory',$all);
    }
    mysql_end($conn);
} elseif (empty($_POST['search'])) {
    
} elseif (isset($_POST['search'])) {
    
    $term = $_POST['search'];
    $conn = mysql_open($serveraddress, $serveruser, $serverpass);
    $sql = "SELECT arenaTeamId,name,captainGuid,type,rating,rank FROM `" . $server_cdb .
        "`.`arena_team` WHERE name LIKE '%" . mysql_real_escape_string($term) . "%'";
		$result = mysql_query($sql, $conn) or die(mysql_error());
    while ($row = mysql_fetch_array($result)) {
		//Arena Type
$ttype = $row["type"];
if ($ttype == 2)
{
<<<<<<< HEAD
$type = "2vs2";
}
elseif ($ttype == 3)
{
$type = "3vs3";
}
elseif ($ttype == 5)
{
$type = "5vs5";
=======
$type = "2v2";
}
elseif ($ttype == 3)
{
$type = "3v3";
}
elseif ($ttype == 5)
{
$type = "5v5";
>>>>>>> d7ae294007c89e38278ac613a3c865a6718bf1f4
}
        //echo $row['name'];
        echo '
		<tbody>
					<tr class="row1">
	<td>
	<a href="" class="item-link color-c9">
	<span class="icon-frame frame-18">
	<img src="images/postavatar.jpg" alt="" width="18" height="18" />
	</span>
	
	<strong><a href="arena.php?name='.$row["name"].'">'.$row["name"].'</a></strong>
	</a>
	</td>
	<td class="align-center">'.$type.'</td>
	<td>'.$name_realm1['realm'].'</td>
	<td class="align-center"><span class="icon-frame " data-tooltip="">
	<img src="wow/static/images/loaders/thumbnail-loader.gif" width="15" height="15" alt="" />
	</span></td>
	<td class="align-center">'.$row2["faction"].'</td>
	<td class="align-center">'.$row["rating"].'</td>
	</tr></tbody>';
    }
    
    mysql_end($conn);
}

?>