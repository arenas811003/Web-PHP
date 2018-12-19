function Delete(id,url){

	data="ID="+id;
	console.log(data);
	if(confirm("確實要刪除這筆資料？")){
		$.ajax({
		type:'POST',
		url:url,
		data : data,
		dataType:'text',

			success:function(data){
				alert(data);
				location.href="/piwork.php";				
			}
		});	
	}else{
		alert("已取消動作");
	}
	
}

function modify(url){
	var PID = document.getElementById("pid").value;
	var name = document.getElementById("form")[0].value;
	console.log(name);
	data="name="+name+"&PID="+PID;
	$.ajax({
			type:'POST',
			url:url,
			data : data,
			dataType:'text',
			success:function(data){
				if(data == true){
				  alert("修改成功");	

				}
			}
		
	});	
}

function F_NAME(){
	var F_TYPE = document.getElementById("select").value;
	console.log(F_TYPE);

	data = "F_TYPE="+F_TYPE;
	$.ajax({
		type:'GET',
		url:'/piwork2.php',
		data : data,
		dataType:'text',
		success:function(data){
			console.log(data);
			str=data;
			
			var i =1;
            var text="<option></option>";
            var FNAME = str.split("-");
            
            while(FNAME[i] != "end" && FNAME[i] != undefined ){    
                i++;               
            }	
            for(k=1;k<i;k++){
                text+= "<option>"+FNAME[k]+"</option>";
            }
			document.getElementById("select_").innerHTML= text;
		}
		
	});

}



function piwork_page(url){
	var F_TYPE = document.getElementById("select").value;
	var F_NAME = document.getElementById("select_").value;
	var PID = document.getElementById("pid").value;
	console.log(F_TYPE)
	console.log(F_NAME)
	console.log(PID)
	data="F_TYPE="+F_TYPE+"&F_NAME="+F_NAME+"&PID="+PID;
	if(F_TYPE != "" && F_NAME != ""){
		// console.log("good");
		$.ajax({
			type:'POST',
			url:url,
			data : data,  
            dataType:'text',
            success:function(data){
                if(data == true){

                    location.href="/piwork.php?";
                }
            }
		});
        
		
	}
}