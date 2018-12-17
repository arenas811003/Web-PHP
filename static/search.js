function Delete(id,url){

	data="FID="+id;
	
	if(confirm("確實要刪除這筆資料？")){
		$.ajax({
		type:'POST',
		url:url,
		data : data,
		dataType:'text',

			success:function(data){
				alert(data);
				location.href="search.php?F_TYPE=&F_NAME=&startRow=0&endRow=7&start=1";
				
			}
		});	
	}else{
		alert("已取消動作");
	}
	
}

function search(url){
	
	var F_Type = document.getElementById("select").value;
	var F_Name = document.getElementById("select_type").value;
	var keywords = document.getElementById("keyword").value;
	
	if(F_Type != ""){
		location.href=url+"F_TYPE="+F_Type+"&F_NAME="+F_Name+"&startRow=0&endRow=7&start=1";
	}else{

		location.href=url+"F_TYPE="+F_Type+"&F_NAME="+F_Name+"&startRow=0&endRow=7&start=1";
	}
	
	if (keywords != ""){
		location.href=url+"F_TYPE=&F_NAME="+keywords+"&startRow=0&endRow=7&start=1";
		
	}
	
}