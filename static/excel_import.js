function Excel_ajax(id){
	var form = document.getElementById(id);
	var data = new FormData(form);
	console.log(form);
	console.log(data);
	
	$.ajax({
			type:'POST',
			url:'excel_import2.php',
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
				if(data == true){
					var bar = document.getElementById("bar");
					document.getElementById("percent").innerHTML = "100%";
					bar.style.width = '100%';
					setTimeout("alert('Excel新增完畢');",2);
				}else{
					alert("未選取檔案/檔案格式為.xls");
				}
			},
			// error:function(data){
				
			// 		alert(data);
	 		// //document.getElementById("ajax").innerHTML = data;
			// }
	
	
	});

}
function PDF_ajax(id){
	var form = document.getElementById(id);
	var data = new FormData(form);
	document.getElementById("percent").innerHTML = "0%";
	bar.style.width = '0%';
	$.ajax({
			type:'POST',
			url:'pdf_import.php',
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
						Bar(70);
					}
				},false);
				return xhr;
			},
	
			success:function(data){
				console.log(data);
					//alert(data);
				if(data!= false){
					Bar(100);
					var message=data;
					var str="";
					var i = 1;
					message = message.split("+");
					var htmltext='';
					while( message[i]!= "end" && message[i]!=null){
						htmltext+='<td>'+message[i]+'</td><br>';
						//document.getElementById("message").innerHTML= text;
						i++;	
						console.log(htmltext);
					}
						
					if(htmltext != '' && htmltext!=null){
						document.getElementById("message").innerHTML="下列圖檔新增失敗，請檢查Excel資料是否與圖片檔名相符。";
						document.getElementById("htmltext").innerHTML= htmltext;
						
						alert("新增完畢");
						

							
					}else{
						//document.getElementById("message").innerHTML="";
						//document.getElementById("htmltext").innerHTML= "";
						
						alert("新增完畢");
						
					}


				}else{

					alert("未選取檔案/檔案格式為.jpg");
					

				}			
				
			},
	
	});

}

function Bar(percent){
	var bar = document.getElementById("bar");
	var width = percent;
	console.log(width);
	document.getElementById("percent").innerHTML = width + "%";
	bar.style.width = width + '%';
	
}
