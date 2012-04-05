<?php $this->beginContent('//layouts/main'); ?>
<script type="text/javascript">
	$(function(){
		$( "#menulist" ).accordion();
		$( "#selectable" ).selectable({
			stop: function() {
				$('.submenu',this).each(function() {
					var index = $( "#selectable li" ).index(this);
					switch(index){
						case 1:window.location.href = "/essay/create";break;
					}
				});
			}
		});
	});
</script>
<div id="main">
	<div class="shell">
		<div id="sider">
			<div id="menulist" style="width:100%;">
				<h2><a href="#">Writing Correction</a></h2>
				<div>
					<ol id="selectable">
						<li class="submenu">Create New</li>
						<li class="submenu">All</li>
						<li class="submenu">Not Rated</li>
						<li class="submenu">Rated</li>
						<li class="submenu">Draft</li>
					</ol>
				</div>
			</div>
			
		</div>
		<div id="base">
			<?php echo $content; ?>
		</div>
		<div style="clear:both;"></div>
	</div>
</div>
<?php $this->endContent(); ?>