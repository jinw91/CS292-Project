/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
    config.toolbar = 'MyToolbar';

    config.toolbar_MyToolbar =
    [
        { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','-','Undo','Redo' ] },
        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker','Scayt' ] },
        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
        '/',
        { name: 'styles', items : [ 'Styles','Format' ] },
        { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','-','RemoveFormat' ] },
        { name: 'colors', items : [ 'TextColor','BGColor' ] },
    ];
    config.removePlugins = 'elementspath';

    config.skin = 'kama';

    config.resize_dir = 'vertical';
    config.width = 455;
};
