﻿/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	config.language = 'en';
	// config.uiColor = '#AADC6E';
	config.toolbar = "Basic";
	config.toolbar_Basic = [
		['Bold','Italic','Underline','Strike','-','Link','Unlink','-','Font','FontSize','SpellChecker', 'Scayt']
	];
	config.resize_enabled = false;
};
