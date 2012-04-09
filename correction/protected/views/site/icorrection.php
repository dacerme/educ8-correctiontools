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
					<ol id="selectable">
						<li class="submenu" onclick="window.location.href='/essay/create'">Create New</li>
						<li class="submenu" onclick="window.location.href='/essay/create'">All</li>
						<li class="submenu" onclick="window.location.href='/essay/create'">Not Rated</li>
						<li class="submenu" onclick="window.location.href='/essay/create'">Rated</li>
						<li class="submenu" onclick="window.location.href='/essay/create'">Draft</li>
					</ol>
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