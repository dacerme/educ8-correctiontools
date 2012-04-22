CKEDITOR.plugins.add( 'annotation',
{
	init: function( editor )
	{
			var iconPath = this.path + 'images/icon.png';
			var iconPath2 = this.path + 'images/icon2.png';

			editor.addCommand('annotationDialog',new CKEDITOR.dialogCommand( 'annotationDialog' ) );
			editor.addCommand('commentsDialog',new CKEDITOR.dialogCommand( 'commentsDialog' ) );
			editor.addCommand('deleteAnnotation',{
				exec:function(editor){
					var sel = editor.getSelection(),
						element = sel.getStartElement();
					if ( element )
						element = element.getAscendant( 'span', true );
					if ( element && element.getAttribute('custom') != null && element.getAttribute('custom') == "ann" && !element.isReadOnly() && !element.data( 'cke-realelement' ) )
	 				{
	 					element.setText(element.getChild(0).getText());
	 					element.remove(true);
	 				}
				}
			});
			editor.addCommand('deleteComment',{
				exec:function(editor){
					var sel = editor.getSelection(),
						element = sel.getStartElement();
					if ( element )
						element = element.getAscendant( 'span', true );
					if ( element && element.getAttribute('custom') != null && element.getAttribute('custom') == "com" && !element.isReadOnly() && !element.data( 'cke-realelement' ) )
	 				{
	 					element.setText(element.getChild(0).getText());
	 					element.remove(true);
	 				}
				}
			});
	 
			if ( editor.contextMenu )
			{
				editor.addMenuGroup( 'annotation',1 );
				editor.addMenuItem( 'addannotation',
				{
					label : 'Add Annotation',
					icon : iconPath,
					command : 'annotationDialog',
					group : 'annotation'
				});
				editor.addMenuItem( 'editannotation',
				{
					label : 'Edit Annotation',
					icon : iconPath,
					command : 'annotationDialog',
					group : 'annotation'
				});
				editor.addMenuItem( 'deleteannotation',
				{
					label : 'Delete Annotation',
					icon : iconPath,
					command : 'deleteAnnotation',
					group : 'annotation'
				});
				
				
				editor.addMenuGroup( 'comment',2 );
				editor.addMenuItem( 'addcomment',
				{
					label : 'Add Comment',
					icon : iconPath2,
					command : 'commentsDialog',
					group : 'comment'
				});
				editor.addMenuItem( 'editcomment',
				{
					label : 'Edit Comment',
					icon : iconPath2,
					command : 'commentsDialog',
					group : 'comment'
				});
				editor.addMenuItem( 'deletecomment',
				{
					label : 'Delete Comment',
					icon : iconPath2,
					command : 'deleteComment',
					group : 'comment'
				});
				
				
				editor.contextMenu.addListener( function( element )
				{
					if ( element )
						element = element.getAscendant( 'span', true );
					if ( element && element.getAttribute('custom') != null && element.getAttribute('custom') == "ann" && !element.isReadOnly() && !element.data( 'cke-realelement' ) ){
	 					//return { editannotation : CKEDITOR.TRISTATE_OFF,deleteannotation : CKEDITOR.TRISTATE_OFF};
	 					return {deleteannotation : CKEDITOR.TRISTATE_OFF};
	 				}else if ( element && element.getAttribute('custom') != null && element.getAttribute('custom') == "com" && !element.isReadOnly() && !element.data( 'cke-realelement' ) ){
	 					//return { editcomment: CKEDITOR.TRISTATE_OFF,deletecomment : CKEDITOR.TRISTATE_OFF};
	 					return { deletecomment : CKEDITOR.TRISTATE_OFF};
	 				}else{
	 					if(editor.getSelection().getSelectedText() != ""){
	 						return { addannotation : CKEDITOR.TRISTATE_OFF,addcomment:CKEDITOR.TRISTATE_OFF};
	 					}
	 				}
				});
			}
	 
			CKEDITOR.dialog.add( 'annotationDialog', function( editor )
			{
				return {
					title : 'Annotations',
					minWidth : 600,
					minHeight : 300,
					contents : [annodata],
					onShow : function()
					{
					   /* var sel = editor.getSelection(),
						element = sel.getStartElement();
						if ( element )
							element = element.getAscendant( 'span', true );
						if ( element && element.getAttribute('custom') != null && element.getAttribute('custom') == "ann" && !element.isReadOnly() && !element.data( 'cke-realelement' ) )
	 					{
							this.foreach(function(e){
								if(e.label == element.getAttribute('ann')){
									e.setValue(true);
								}
							});
							var title = element.getAttribute("title");
							var a1 = title.split(";");
							var a2 = a1[3].split(":");
							var advice = a2[1];
							this.getContentElement("annotationbuttons","advice").setValue(advice);
							this.editmode = true;
							this.element = element;
						}else{
							this.editmode = false;
						}*/
					},
					onOk : function()
					{
					 /*if(this.editmode){
					 	 this.element.innerHTML = "a";
					 }else{*/
						 this.foreach(function(e){
						 	    if(e.getValue()){
						 	    	ann = e.label;
						 	    	style = e.style;
						 	    	title = e.title;
						 	    }
						 });
					     var advice = this.getContentElement("annotationbuttons","advice").getValue();
					     var orginal = editor.getSelection().getSelectedText();
					     var inserthtml = "<span custom='ann' ann="+ann+" title='"+title+";advice:"+advice+"'><i style='"+style+"'>"+orginal+"</i><sup style='"+style+"font-size:14px;color:white;'>"+ann+"</sup></span>";
					     editor.insertHtml(inserthtml);
				     //}
					}
				};
			} );
			
			
			CKEDITOR.dialog.add( 'commentsDialog', function( editor )
			{
				return {
					title : 'Comments',
					minWidth : 400,
					minHeight : 200,
					contents :
					[
						{
							id : 'comments',
							elements :
							[
								{
									type : 'textarea',
									id : 'comment',
									label : 'Comment:',
								}
							]
						}
					],
					onShow : function()
					{
						/*var sel = editor.getSelection(),
							element = sel.getStartElement();
						if ( element )
							element = element.getAscendant( 'abbr', true );
	 
						if ( !element || element.getName() != 'abbr' || element.data( 'cke-realelement' ) )
						{
							element = editor.document.createElement( 'span' );
							this.insertMode = true;
						}
						else
							this.insertMode = false;
	 
						this.element = element;
	 
						this.setupContent( this.element );*/
					},
					onOk : function()
					{
						 var comment = this.getContentElement("comments","comment").getValue();
					     var orginal = editor.getSelection().getSelectedText();
					     var inserthtml = "<span custom='com'><i style='background-color:lightblue'>"+orginal+"</i><sup style='background-color:lightblue;font-size:14px;color:white;'>COM</sup></span>";
					     editor.insertHtml(inserthtml);
					}
				};
			} );
		//}
	}
} );