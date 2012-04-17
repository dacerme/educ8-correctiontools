<script type="text/javascript">
$(function(){
	$("#list").jqGrid({
		url:baseurl+'/essaymarked/getessay',
		datatype: "json",
		mtype:"post",
		postData:{'getdata':true,'type':'all'},
		width:720,
	   	colNames:['Ref No.','User','Category', 'Question', 'Submittime','Status'],
	   	colModel:[
	   		{name:'id',index:'id', width:60, sorttype:"int"},
	   		{name:'uid',index:'uid', width:60, sorttype:"int"},
	   		{name:'cate',index:'cateid', width:90, sorttype:"date"},
	   		{name:'question',index:'questionid', width:100},
	   		{name:'sumittime',index:'submittime', width:80, align:"right",sorttype:"float"},
	   		{name:'status',index:'status', width:80, align:"right",sorttype:"float"}
	   	],
	   	rowNum:15,
	   	sortname:'submittime',
	   	caption:'Essay List',
	   	rowList:[10,20,30],
	   	pager: '#listpager'
	});
});
</script>

<div id="essaylist">
    <table id="list"></table>
    <div id="listpager"></div>
</div>