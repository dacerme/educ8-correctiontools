CKEDITOR.plugins.add( 'annotation',
{
	init: function( editor )
	{
		var iconPath = this.path + 'images/icon.png';
		var iconPath2 = this.path + 'images/icon2.png';
	    //var annodata;
	    
	    /*$.ajax({
	    	url:baseurl+'/essaymarked/getannotations',
	    	dataType:'json',
	    	success:function(data){
	    		annodata = data;
	    		init2();
	    	}
	    });
		
		function init2(){*/
			editor.addCommand('annotationDialog',new CKEDITOR.dialogCommand( 'annotationDialog' ) );
			editor.addCommand('commentsDialog',new CKEDITOR.dialogCommand( 'commentsDialog' ) );
			editor.addCommand('deleteAnnotation',{
				exec:function(editor){
					alert("1");
				}
			});
			editor.addCommand('deleteComment',{
				exec:function(editor){
					alert("2");
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
	 					return { editannotation : CKEDITOR.TRISTATE_OFF,deleteannotation : CKEDITOR.TRISTATE_OFF};
	 				}else if ( element && element.getAttribute('custom') != null && element.getAttribute('custom') == "com" && !element.isReadOnly() && !element.data( 'cke-realelement' ) ){
	 					return { editcomment: CKEDITOR.TRISTATE_OFF,deletecomment : CKEDITOR.TRISTATE_OFF};
	 				}else{
	 					return { addannotation : CKEDITOR.TRISTATE_OFF,addcomment:CKEDITOR.TRISTATE_OFF};
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
					},
					onOk : function()
					{
					  var data = new Object;
					  this.commitContent(data);
					  alert(this.getContentElement('annotaionbuttons', 'advice').getValue());
					}
				};
			} );
			
			
			CKEDITOR.dialog.add( 'commentsDialog', function( editor )
			{
				return {
					title : 'Annotations',
					minWidth : 400,
					minHeight : 200,
					contents :
					[
						{
							id : 'tab1',
							label : 'Basic Settings',
							elements :
							[
								{
									type : 'text',
									id : 'span',
									label : 'Abbreviation',
									validate : CKEDITOR.dialog.validate.notEmpty( "Abbreviation field cannot be empty" ),
									setup : function( element )
									{
										this.setValue( element.getText() );
									},
									commit : function( element )
									{
										element.setText( this.getValue() );
									}
								},
								{
									type : 'text',
									id : 'title',
									label : 'Explanation',
									validate : CKEDITOR.dialog.validate.notEmpty( "Explanation field cannot be empty" ),
									setup : function( element )
									{
										this.setValue( element.getAttribute( "title" ) );
									},
									commit : function( element )
									{
										element.setAttribute( "title", this.getValue() );
									}
								}	 
							]
						},
						{
							id : 'tab2',
							label : 'Advanced Settings',
							elements :
							[
								{
									type : 'text',
									id : 'id',
									label : 'Id',
									setup : function( element )
									{
										this.setValue( element.getAttribute( "id" ) );
									},
									commit : function ( element )
									{
										var id = this.getValue();
										if ( id )
											element.setAttribute( 'id', id );
										else if ( !this.insertMode )
											element.removeAttribute( 'id' );
									}
								}
							]
						}
					],
					onShow : function()
					{
						var sel = editor.getSelection(),
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
	 
						this.setupContent( this.element );
					},
					onOk : function()
					{
						var dialog = this,
							span = this.element;
	 
						if ( this.insertMode )
							editor.insertElement( span );
						this.commitContent( span );
					}
				};
			} );
		//}
	}
} );