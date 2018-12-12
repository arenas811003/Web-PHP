function getType(){
	var F_TYPE = document.getElementById("select").value;
    
    data = "F_TYPE="+F_TYPE;
	$.ajax({
		type:'GET',
		url:'excel_export2.php',
		data : data,
		dataType:'text',
		success:function(data){
			//console.log(data);
			var str=data;
			
			var i = 1;
			var text="<option></option>";
            var FNAME = str.split("-");
            
            while(FNAME[i] != "end" && FNAME[i] != undefined ){    
                i++;               
            }	
            for(k=1;k<i-1;k++){
                text+= "<option>"+FNAME[k]+"</option>";
            }
			document.getElementById("select_type").innerHTML= text;
		}	
	});
}

function search_data(url){
	var F_Type = document.getElementById("select").value;
	var F_Name = document.getElementById("select_type").value;
	location.href=url+"F_TYPE="+F_Type+"&F_NAME="+F_Name;

}


function Excel_path(){
	var htmltable=document.getElementById("datatable");
	var html ="<html><head><meta http-equiv='Content-Type content='text/html;charset='utf-8'></head><body>"+htmltable.outerHTML+"</body></html>"

	
	//var html =htmltable.outerHTML
	
	console.log(html);
	//window.open('data:application/vnd.ms-excel,'+ encodeURIComponent(html));
	window.open('data:application/vnd.ms-excel,'+ encodeURIComponent(html));

}