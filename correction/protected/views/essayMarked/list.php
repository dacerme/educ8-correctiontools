<script type="text/javascript">
$(function(){	
	$("#list").jqGrid({
		url:baseurl+'/essaymarked/getessay',
		datatype: "json",
		mtype:"post",
		postData:{'getdata':true,'type':'<?echo $_GET['type']?>'},
		width:720,
	   	colNames:['Ref No.','User','Category', 'Question', 'Submittime','Status','Operation'],
	   	colModel:[
	   		{name:'id',index:'id', width:40, sorttype:"int"},
	   		{name:'uid',index:'uid', width:60, sorttype:"int"},
	   		{name:'cate',index:'cateid', width:60, sorttype:"int"},
	   		{name:'question',index:'questionid', width:150},
	   		{name:'sumittime',index:'submittime', width:100, align:"right",sorttype:"date"},
	   		{name:'status',index:'status', width:40, align:"right",sorttype:"int"},
	   		{name:'operation',index:'operation',width:60,align:"center"}
	   	],
	   	rowNum:15,
	   	sortname:'submittime',
	   	caption:'Essay List',
	   	rowList:[10,20,30],
	   	pager: '#listpager',
	   	gridComplete:function(){
	   		var ids=jQuery("#list").jqGrid('getDataIDs');
	   		for(var i=0; i<ids.length; i++){ 
				var id=ids[i]; 
				check ="<a href='#' style='color:#f60' onclick='checkEssay("+ id +")'>Check</a>";
				jQuery("#list").jqGrid('setRowData', ids[i], { operation: check }); 
			}
	   	}
	});
});

function checkEssay(id){
	var rowdata = $("#list").jqGrid('getRowData', id);
	var type; 
	if(rowdata.status == 2){
		type = "edit";
	}else if(rowdata.status == 1){
		type = "new";
	}
	window.location.href=baseurl+"/essaymarked/mark?essayid="+id+"&type="+type;
}
</script>

<div id="essaylist">
    <table id="list"></table>
    <div id="listpager"></div>
</div>