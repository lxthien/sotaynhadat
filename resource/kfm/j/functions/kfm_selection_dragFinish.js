window.kfm_selection_dragFinish=function(e){
	clearTimeout(window.dragSelectionTrigger);
	if(!window.drag_wrapper)return;
	var right_column=document.getElementById('documents_body'),p1={x:e.pageX,y:e.pageY},p2=window.drag_wrapper.orig,offset=right_column.scrollTop;
	var x1=p1.x>p2.x?p2.x:p1.x, x2=p2.x>p1.x?p2.x:p1.x, y1=p1.y>p2.y?p2.y:p1.y, y2=p2.y>p1.y?p2.y:p1.y;
	setTimeout('window.dragType=0;',1); // pause needed for IE
	$j(window.drag_wrapper).remove();
	window.drag_wrapper=null;
	$j.event.remove(document,'mousemove',kfm_selection_drag);
	$j.event.remove(document,'mouseup',kfm_selection_dragFinish);
	var fileids=right_column.fileids;
	kfm_selectNone();
	for(var i=0;i<fileids.length;++i){
		var curIcon=document.getElementById('kfm_file_icon_'+fileids[i]);
		var curTop=getOffset(curIcon,'Top');
		var curLeft=getOffset(curIcon,'Left');
		if((curLeft+curIcon.offsetWidth)>x1&&curLeft<x2&&(curTop+curIcon.offsetHeight)>y1&&curTop<y2)kfm_addToSelection(fileids[i]);
	}
	kfm_selectionCheck();
}
