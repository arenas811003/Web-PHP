function gopage(url,start){ 
	
	var startRow =(start-1)* 7;

	location.href=url+"startRow="+startRow+"&endRow=7"+"&start="+start;

}

function previous(url){
	
	var urlParams = new URLSearchParams(window.location.search);
	var startRow = urlParams.get('startRow');		
	var start = urlParams.get('start');		
	if(startRow!=0){
		startRow=startRow-7;
        start-=1;	
	}
	
	location.href=url+"startRow="+startRow+"&endRow=7"+"&start="+start;

}		
function next(results_len,url){

	console.log("re="+results_len);
	var urlParams = new URLSearchParams(window.location.search);
	var startRow = urlParams.get('startRow');		
	var start = urlParams.get('start');		
	console.log(startRow);
	console.log(start);
	var itable=document.getElementById("datatable");
	var num = itable.rows.length;
	console.log(num);
	startRow=parseInt(startRow);	
	if(startRow+7 < results_len ){
		startRow=parseInt(startRow)+7;
		start=parseInt(start)+1;
		console.log(startRow);
		console.log(start);
	}
	location.href=url+"startRow="+startRow+"&endRow=7"+"&start="+start;


}	
