<script type="text/javascript">
	$(function(){
		$( "#menulist" ).accordion();
		//$( "#selectable" ).selectable();
	});
</script>
<div id="main">
	<div class="shell">
		<div id="sider">
			<div id="menulist" style="width:100%;">
				<h2><a href="#">Writing Correction</a></h2>
				<div>
					<?php if($userinfo['group'] != 3){?>
					<ol id="selectable">
						<li class="submenu" onclick="window.location.href=baseurl+'/essay/create'">Create New</li>
						<li class="submenu" onclick="window.location.href=baseurl+'/essay/list?type=all'">All</li>
						<li class="submenu" onclick="window.location.href=baseurl+'/essay/list?type=not'">Not Rated</li>
						<li class="submenu" onclick="window.location.href=baseurl+'/essay/list?type=rated'">Rated</li>
						<li class="submenu" onclick="window.location.href=baseurl+'/essay/list?type=draft'">Draft</li>
					</ol>
					<?}else{?>
					<ol id="selectable">
						<li class="submenu" onclick="window.location.href=baseurl+'/essaymarked/list?type=all'">All</li>
						<li class="submenu" onclick="window.location.href=baseurl+'/essaymarked/list?type=not'">Not Rated</li>
						<li class="submenu" onclick="window.location.href=baseurl+'/essaymarked/list?type=rated'">Rated</li>
						<li class="submenu" onclick="window.location.href=baseurl+'/essaymarked/list?type=draft'">Draft</li>
					</ol>	
					<?}?>
				</div>
			</div>
			
		</div>
		<div id="base">
			<table>
				<tr>
					<td>Total Essays:</td><td>0</td>
				</tr>
			</table>
		</div>
		<div style="clear:both;"></div>
	</div>
</div>