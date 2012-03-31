<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
$(function(){
	var xOffset = 10;
	var yOffset = 20;
	var w = $(window).width();
	$('#flow1').css('cursor',"pointer");
	$('#flow1')
	.mouseover(function(e){
		$("body").append("<div id='preview'><div>"+$(this).attr('custom')+"</div></div>");
		$("#preview").css({
					position:"absolute",
					padding:"4px",
					border:"1px solid #f3f3f3",
					backgroundColor:"#ffEEEE",
					top:(e.pageY - yOffset) + "px",
					zIndex:1000
				});
				$("#preview > div").css({
					padding:"5px",
					backgroundColor:"#cccccc",
					border:"1px solid #cccccc"
				});
				if(e.pageX < w/2){
					$("#preview").css({
						left: e.pageX + xOffset + "px",
						right: "auto"
					}).fadeIn("fast");
				}else{
					$("#preview").css("right",(w - e.pageX + yOffset) + "px").css("left", "auto").fadeIn("fast");	
				}
	})
	.mouseout(function(e){
		$("#preview").remove();
	})
	.mousemove(function(e){
		$("#preview").css("top",(e.pageY - xOffset) + "px")
		if(e.pageX < w/2){
			$("#preview").css("left",(e.pageX + yOffset) + "px").css("right","auto");
		}else{
			$("#preview").css("right",(w - e.pageX + yOffset) + "px").css("left","auto");
		}		
	}); 
	
	$( "#menulist" ).accordion();
});
</script>
<div id="main">
	<div class="shell">
		<textarea id="editor1" name="editor1">&lt;p&gt;Initial value.&lt;/p&gt;</textarea>
		<script type="text/javascript">
			CKEDITOR.plugins.add( 'myplugin',
			{
				init: function( editor )
				{
					editor.addCommand( 'mydialog',new CKEDITOR.dialogCommand( 'mydialog' ) );
			
					if ( editor.contextMenu )
					{
						editor.removeMenuItem('paste');
						editor.addMenuGroup( 'mygroup', 10 );
						editor.addMenuItem( 'My Dialog',
						{
							label : 'Open dialog',
							command : 'mydialog',
							group : 'mygroup'
						});
						editor.contextMenu.addListener( function( element )
						{
			 				return { 'My Dialog' : CKEDITOR.TRISTATE_OFF };
						});
					}
			
					CKEDITOR.dialog.add( 'mydialog', function( api )
					{
						// CKEDITOR.dialog.definition
						var dialogDefinition =
						{
							title : 'Sample dialog',
							minWidth : 390,
							minHeight : 130,
							contents : [
								{
									id : 'tab1',
									label : 'Label',
									title : 'Title',
									expand : true,
									padding : 0,
									elements :
									[
										{
											type : 'html',
											html : '<p>This is some sample HTML content.</p>'
										},
										{
											type : 'button',
											id : 'buttonId',
											label : 'COM',
											title : 'Add a COM',
											onClick : function() {
												// this = CKEDITOR.ui.dialog.button
												alert( 'Clicked: ' + this.id );
											}
										},
										{
											type : 'checkbox',
											id : 'agree',
											label : '<font color="red">I agree<font>',
											'default' : 'checked',
											onClick : function() {
												// this = CKEDITOR.ui.dialog.checkbox
												alert( 'Checked: ' + this.getValue() );
											}
										},
										{
											type : 'textarea',
											id : 'textareaId',
											rows : 4,
											cols : 40
										}
									]
								}
							],
							buttons : [ CKEDITOR.dialog.okButton, CKEDITOR.dialog.cancelButton ],
							onOk : function() {
								// "this" is now a CKEDITOR.dialog object.
								// Accessing dialog elements:
								var textareaObj = this.getContentElement( 'tab1', 'textareaId' );
								alert( "You have entered: " + textareaObj.getValue() );
							}
						};
			
						return dialogDefinition;
					} );
				}
			} );
			
			CKEDITOR.replace( 'editor1', { extraPlugins : 'myplugin' } );
			
			
			function insertTest(){
				var editor = CKEDITOR.instances.editor1;
				editor.insertHtml($('#test').val());
			}
		</script>

		<textarea id="test" style="width:500px;height:300px;">
			
		</textarea>
		<input type="button" onclick="insertTest()" value="Insert"/>

		<div>
			<span custom="advice:com;value:-0.1;" id="flow1">righthere<sup>COM</sup></span>
		</div>
		<div id="menulist" style="width:200px;">
			<h3><a href="#">Writing Correction</a></h3>
			<div>
				<ul>
					<li>All</li>
					<li>Not Rated</li>
					<li>Rated</li>
					<li>Draft</li>
				</ul>
			</div>
			<h3><a href="#">Oral Correction</a></h3>
			<div>
				<ul>
					<li>All</li>
					<li>Not Rated</li>
					<li>Rated</li>
					<li>Draft</li>
				</ul>
			</div>
		</div>
	</div>
</div>