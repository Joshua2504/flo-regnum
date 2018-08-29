<html>
<head>
	<style>
		body {
			background-color:transparent;
			font-size:x-small;
			font-family: Verdana, serif;
			font-weight:bold;
		}
		h2 {
			font-size:small;
		}
		.thork {
			color:#0080FF; /* thork */
		}
		.eve {
			color:#00FF00;  /* eve */
		}
		.rha {
			color:#ff8000; /* rha */
		}
		.past {
			color:#404040;
		}
		.today {
			color:white;
		}
		.tomorrow {
			color:#909090;
		}

		#bosse {
			text-align:center;
			vertical-align:top;

			width:560px;
			height:516px;
			position:relative;
			background-image:url(bossebg.png);
		}
		#bosse div {
			/* background-color:white; */
		}
		#bosse div p {
			padding:0;
			margin:0;
		}

		#thork {
			position:absolute;
			overflow:hidden;

			left:70px;
			top:10px;
			width:136px;
			height:100px;
		}
		#rha {
			position:absolute;
			overflow:hidden;

			left:70px;
			top:110px;
			width:136px;
			height:100px;
		}
		#eve {
			position:absolute;
			overflow:hidden;

			left:70px;
			top:210px;
			width:136px;
			height:100px;
		}
	</style>
</head>
<body>
	<div id="bosse">
		<div id="thork" class="thork">
			<h2>Thorkul</h2>
			<?php printSpawnings("thork", 5); ?>
		</div>
		<div id="eve" class="eve">
			<h2>Evendim</h2>
			<?php printSpawnings("eve", 5); ?>
		</div>
		<div id="rha" class="rha">
			<h2>Daen Rha</h2>
			<?php printSpawnings("rha", 5); ?>
		</div>
	</div>
</body>
</html>
<?php
function printSpawnings($boss, $lines) {
	$respawn=392404; // 109h + 4 sek (überschlagen). eher 3,5 sek
	//$ur_spawns["thork"]=1458378780;
	$ur_spawns["thork"]=1459163476; // 2016 04 06 15 11 24
	$ur_spawns["rha"]=1459308211; // 2016 03 30 05 23 31
		//$ur_spawns["eve"]=1458042600;
	$ur_spawns["eve"]=1458435780; // ?
	$spawn=$ur_spawns[$boss];
	$now=time();
	$now_day=date('d',time());
	while($spawn < $now)
		$spawn += $respawn;
	$spawn -= $respawn;
	if($now_day==date('d',$spawn)) {
		$times[]='<span class="today">Heute, '.date('H:i',$spawn).' Uhr</span>';
	} else {
		$times[] = '<span class="past">' . date('d.m.Y - H:i', $spawn) . ' Uhr</span>';
	}
	for($i=1; $i<$lines; $i++) {
		$spawn += $respawn;
		$spawn_day = date('d', $spawn);
		if($spawn_day==$now_day)
			$times[]='<span class="today">Heute, '.date('H:i',$spawn).' Uhr</span>';
		else if($spawn_day==$now_day+1)
			$times[]='<span class="tomorrow">Morgen, '.date('d.m. - H:i',$spawn).'</span>';
		else
			$times[]=date('d.m.Y - H:i',$spawn).' Uhr';
	}
	foreach($times as $time) {
		echo('<p>'.$time.'</p>');
	}
}
/*
rha 23
16.3. 13:18

eve
15.3.16 12:50

thork 13
thork

	<p>19.09.15 - 19:03:00&nbsp;Uhr
	<p>24.09.15 - 08:03:00&nbsp;Uhr
*/
?>