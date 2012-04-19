<?php $this->beginContent('//layouts/main'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui.jqgrid.css" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/grid.locale-en.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.jqGrid.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function(){
		$( "#menulist" ).accordion();
	});
</script>
<div id="main">
	<div class="shell">
		<div id="sider">
			<div id="menulist" style="width:100%;">
				<h2><a href="#">Writing Correction</a></h2>
				<div>
					<ol id="selectable">
						<li class="submenu" onclick="window.location.href=baseurl+'/essaymarked/list?type=all'">All</li>
						<li class="submenu" onclick="window.location.href=baseurl+'/essaymarked/list?type=not'">Not Rated</li>
						<li class="submenu" onclick="window.location.href=baseurl+'/essaymarked/list?type=rated'">Rated</li>
						<li class="submenu" onclick="window.location.href=baseurl+'/essaymarked/list?type=draft'">Draft</li>
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