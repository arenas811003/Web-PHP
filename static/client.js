function check(url){
    var select=document.getElementById('select').value;
	var add2=document.getElementById('add2').value;
	console.log(select);
	console.log(add2);
	if(select != "" && add2 != ""){	
		//data=$('#form').serialize();
		data="select="+select+"&add2="+add2;
		
		console.log(data);
		$.ajax({
			type:'POST',
			url:url,
			data : data,
			dataType:'text',

			success:function(data){
				suc(data);
			}
		});			

		
	}else{
	
		if(select=="" || add2 == ""){
			
			alert("請輸入類別與工程");
		}
	}
}
function update_check(url){
    var select=document.getElementById('select').value;
	var add2=document.getElementById('add2').value;
	var type=document.getElementById('type').value;
	var name=document.getElementById('name').value;
	console.log(select);
	console.log(add2);
	if(select != "" && add2 != ""){	
		//data=$('#form').serialize();
		data="select="+select+"&add2="+add2+"&type="+type+"&name="+name;
		//Bar(50);
		console.log(data);
		$.ajax({
			type:'POST',
			url:url,
			data : data,
			dataType:'text',

			success:function(data){
				suc(data);
			
				if(data==true){
				
					//update_post_bar();

				}else{

					alert('資料名稱已存在');
				}
			
			}
		});			

		
	}else{
	
		if(select=="" || add2 == ""){
			
			alert("請輸入類別與工程");
		}
	}
}
/*
function update_post_bar(){
var form = document.getElementById('form');
	var data = new FormData(form);
	console.log(form);
	console.log(data);
	document.getElementById("percent").innerHTML = "0%";
	bar.style.width = '0%';

	
	$.ajax({
			type:'POST',
			url:'/update',
			data : data,
			cache:false,
			contentType:false,
			processData:false,
			xhr:function(){
			var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress",function(evt){
				var file = document.getElementById("file").files.length;
						console.log(file);
				
					if(evt.lengthComputable && file != 0){
						var percent = Math.round(evt.loaded / evt.total*100);
						console.log(percent);
						Bar(50);
					}
				},false);
				return xhr;
			}

	});			
}
*/

function FtypeCheck(url){
	var add=document.getElementById('add').value;
	if(add != ""){
		data="add="+add;
		$.ajax({
				type:'GET',
				url:url,
				data : data,
				dataType:'text',

				success:function(data){
					suc(data);
				}
		});			

		
	}else{
	
		if(add == ""){
			
			alert("請輸入類別");
		}
	}

		


}
function F_NAME(){
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
			var FNAME = "";
			var text="";
			while(FNAME != "end" ){
				FNAME = str.split("-")[i];
			      	text+="<option>"+FNAME+"</option>";	
				document.getElementById("select_").innerHTML=text;
				console.log(FNAME);
				i++;
				FNAME = str.split("-")[i];
			}
		}
		
	});

}
function modify(){
	var PID = document.getElementById("pid").value;
	var name = document.getElementById("form")[0].value;
	console.log(name);
	data="name="+name+"&PID="+PID;
	$.ajax({
			type:'POST',
			url:'/name',
			data : data,
			dataType:'text',

			success:function(data){
				if(data == "true"){
				  alert("修改成功");	

				}
			}

		
		});
	



}
function piwork_page(){
	var F_TYPE = document.getElementById("select").value;
	var F_NAME = document.getElementById("select_").value;
	var PID = document.getElementById("pid").value;
	console.log(F_TYPE)
	console.log(F_NAME)
	console.log(PID)
	data="F_TYPE="+F_TYPE+"&F_NAME="+F_NAME+"&PID="+PID;
	if(F_TYPE != "" && F_NAME != ""){
		console.log("good");
	
		$.ajax({
			type:'POST',
			url:'/piwork_page',
			data : data,
			dataType:'text',
		
		
		});
	
		location.href="/piwork?";
	}
}


function selected(){//only for index.html?
	var F_TYPE = document.getElementById("form")[1].value;
	var F_NAME = document.getElementById("form")[2].value;
	var select = document.getElementById("select").value;
	if(F_TYPE == "" && F_NAME == ""){
		F_TYPE = select.split("-")[0];
		F_NAME = select.split("-")[1];
		
		if(F_TYPE == "所有"){
			change_page('/index');
		}else{
			
			location.href="/search?F_TYPE="+F_TYPE+"&F_NAME="+F_NAME;

		}	
		console.log(F_TYPE);
		console.log(F_NAME);

	}else{
		console.log(F_TYPE);
		console.log(F_NAME);
		location.href="/search?F_TYPE="+F_TYPE+"&F_NAME="+F_NAME;
		//抓輸入值

	}

}
function text(){
	
	if(document.getElementById("radio1").checked){

	 	document.getElementById("1").style.display= "none";
	 	document.getElementById("2").style.display = "inline-block";

	}else if(document.getElementById("radio2").checked){
	 	document.getElementById("2").style.display= "none";
	 	document.getElementById("1").style.display = "inline-block";
	}



}
function Excel_ajax(url,id){
	var form = document.getElementById(id);
	var data = new FormData(form);
	console.log(form);
	console.log(data);
	
	$.ajax({
			type:'POST',
			url:url,
			data : data,
			cache:false,
			contentType:false,
			processData:false,
			xhr:function(){
			var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress",function(evt){
				var file = document.getElementById("excel").files.length;
						console.log(file);
				
					if(evt.lengthComputable && file != 0){
						var percent = evt.loaded / evt.total * 100;
						Math.round(percent);
						console.log(percent);
						Bar(percent)
					}
				},false);
				return xhr;
			},
	
			success:function(data){
				console.log(data);
				if(data == "請選擇檔案"){
					alert(data);
				}else{

				var bar = document.getElementById("bar");
				document.getElementById("percent").innerHTML = "100%";
				bar.style.width = '100%';
				setTimeout("alert('Excel新增完畢');",2)
				}
			},
			error:function(data){
				if(data != "請選擇檔案"){
					data="檔案格式錯誤"
				}
					alert(data);
	 		//document.getElementById("ajax").innerHTML = data;
			}
	
	
	});

}
function PDF_ajax(url,id){
	var form = document.getElementById(id);
	var data = new FormData(form);
	console.log(form);
	console.log(data);
	document.getElementById("percent").innerHTML = "0%";
	bar.style.width = '0%';

	
	$.ajax({
			type:'POST',
			url:url,
			data : data,
			cache:false,
			contentType:false,
			processData:false,
			xhr:function(){
			var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress",function(evt){
				var file = document.getElementById("file").files.length;
						console.log(file);
				
					if(evt.lengthComputable && file != 0){
						var percent = Math.round(evt.loaded / evt.total*100);
						console.log(percent);
						Bar(50);
					}
				},false);
				return xhr;
			},
	
			success:function(data){
					//alert(data);
				if(data!="請選擇檔案"){
					Bar(100);
					var message=data;
					var str="";
					var i = 1;
					message = message.split("+");
					var htmltext='';
					while(message[i]!= "end" && message[i]!=null){
						htmltext+='<td>'+message[i]+'</td><br>';
						//document.getElementById("message").innerHTML= text;
						i++;	
						console.log(htmltext);
					}
						console.log(htmltext);
					if(htmltext != ''&& htmltext!=null){
						document.getElementById("message").innerHTML="下列圖檔新增失敗，請檢查Excel資料是否與PDF檔名相符。";
				//		console.log(htmltext);
						document.getElementById("htmltext").innerHTML= htmltext;
						alert("新增完畢");

							
					}else{
						document.getElementById("message").innerHTML="";
				//		console.log(htmltext);

						document.getElementById("htmltext").innerHTML= "";
						alert("新增完畢");

					}
				}else{
					alert(data);

				}			
				
			},
			error:function(data){
				if(data != "請選擇檔案"){
					data="檔案格式錯誤"
				}
					alert(data);
	 		//document.getElementById("ajax").innerHTML = data;
			}
	
	
	});

}

function Bar(percent){
	var bar = document.getElementById("bar");
	var width = percent;
	console.log(width);
	

	//var id = setInterval(frame,10);
	//function frame(){
	//	if (width>99){
	//		clearInterval(id);
		//	document.getElementById("percent").innerHTML =  "0%";
		//	elem.style.width = '0%';
	//	}else{
			//width++;
	 		document.getElementById("percent").innerHTML = width + "%";
			bar.style.width = width + '%';
	//	}
	//}
	

}


function update(id,Type){
	F_TYPE=Type;	
	str= id;
	FID = str.split("-")[1];
	console.log(FID);
	location.href="/update_page?FID="+FID+"&F_TYPE="+F_TYPE;		
	
}
function Del_but(id, url){
	console.log(url);
	str = id;
	FID = str.split("-")[1];
	if(confirm("確實要刪除這筆資料？")){
		location.href=url+FID
	}else{
		alert("已取消動作");
	}
}
function Del_Type(url){
    var select=document.getElementById('select2').value;
	console.log(select);
	data="select="+select;
	if(select != ""){
		if(confirm("確實要刪除這筆資料？")){
			$.ajax({
			type:'POST',
			url:url,
			data : data,
			dataType:'text',

				success:function(data){
					suc(data);
				}
			});	
		}else{
			alert("已取消動作");
		}
	}else{
			alert("請選擇類別名稱");
	
	}
}

function piwork(id){
	console.log(id);
	str= id;
	PID = str.split("-")[1];
	location.href="/piwork_page?PID="+PID
	/*FID = document.getElementById("select").value;
	//alert(FID);
	//data = "PID="+PID+"&FID="+FID;
	
	$.ajax({
		type:'GET',
		url:'/piassign',
		data : data,
		dataType:'text',
		/*
		success:function(data){
			console.log(data);
			if(data == "true"){
				document.getElementById('form').submit();
				alert("新增成功");
			}else{
				alert("資料重複");
			}	
		}
		
		success:function(data){
		//	suc(data);
		}
	});
	*/
}


