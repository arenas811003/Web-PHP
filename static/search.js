function search_data(url){
	var F_Type = document.getElementById("select").value;
	var F_Name = document.getElementById("select_type").value;
	console.log("Item:"+F_Type+",Type:"+F_Name);
//	if(F_Type==""){
//		alert("請選擇類別");
//	}else{
		location.href=url+"F_TYPE="+F_Type+"&F_NAME="+F_Name+"&startRow=0&endRow=7&start=1";
//	}
	/*
		data = "F_TYPE="+F_Type+"&F_NAME="+F_Name+"&startRow=0&endRow=7&start=1";
			$.ajax({
				type:'POST',
				url:'/index',
				data:data,
				dataType:'text',
				
				success:function(data){
					console.log(data);
				}

			});
		}
	*/
}

function getType(){
	var F_TYPE = document.getElementById("select").value;
	console.log(F_TYPE);

	data = "F_TYPE="+F_TYPE;
	$.ajax({
		type:'GET',
		url:'/piwork_select',
		data : data,
		dataType:'text',
		success:function(data){
			console.log(data);
			str=data;
			
			var i =1;
			var text="<option></option>";
			var FNAME = str.split("-");
			console.log("FNAME:"+FNAME[1]);
			while(FNAME[i] != "end" ){
			      	text+= "<option>"+FNAME[i]+"</option>";	
				i++;
			}
			
			document.getElementById("select_type").innerHTML=text;
		}
		
	});

}
function keywords(url){
	var word = document.getElementById("keyword").value;
	console.log(word);
	if(word ==""){
		alert("請輸入關鍵字");
	}else{
		location.href=url+"F_TYPE=&F_NAME="+word+"&startRow=0&endRow=7&start=1";
	}


}
function Excel_path(){
			var htmltable=document.getElementById("datatable");
			var html ="<html><head><meta http-equiv='Content-Type content='text/html;charset='utf-8'></head><body>"+htmltable.outerHTML+"</body></html>"

			
			//var html =htmltable.outerHTML
			
			console.log(html);
			window.open('data:application/vnd.ms-excel,'+ encodeURIComponent(html));
			window.open('data:application/vnd.ms-excel,'+ encodeURIComponent(html));

}

function Excel(){
	var F_Type = document.getElementById("select").value;
	var F_Name = document.getElementById("select_type").value;
	data="F_TYPE="+F_Type+"&F_NAME="+F_Name;

	$.ajax({
		type:'POST',
		url:'/excel_export',
		data : data,
		dataType:'text',
		success:function(data){
			alert(data);
		}

	});

}
