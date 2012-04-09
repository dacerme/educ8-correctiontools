<script type="text/javascript">
$(function(){
	$("#list").jqGrid({
		url:'/essay/getessay',
		datatype: "json",
		mtype:"post",
		postData:{'getdata':true,'type':'all'},
		width:720,
	   	colNames:['Ref No.','Category', 'Question', 'Submittime','Status'],
	   	colModel:[
	   		{name:'id',index:'id', width:60, sorttype:"int"},
	   		{name:'cate',index:'invdate', width:90, sorttype:"date"},
	   		{name:'question',index:'name', width:100},
	   		{name:'sumittime',index:'amount', width:80, align:"right",sorttype:"float"},
	   		{name:'status',index:'tax', width:80, align:"right",sorttype:"float"}
	   	],
	   	rowNum:15,
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