<?php $this->beginContent('//layouts/main'); ?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/basic.js" type="text/javascript"></script>
<div id="content">
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>