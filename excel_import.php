<html>
	<head>
        <meta charset="utf-8">
        
		<link rel="stylesheet" type="text/css" href="bootstrap-4.1.3/site/docs/4.1/examples/dashboard/dashboard.css">
		<link rel="stylesheet" type="text/css" href="bootstrap-4.1.3/dist/css/bootstrap.min.css">
		<script type="text/javascript"src="dist/js/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap-4.1.3/dist/js/bootstrap.min.js"></script>
   		
	</head>
	<body>
			
   		    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-1 shadow">
				
			
      		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/model.php";>&nbsp;&emsp;PHP-SERVER</a>
			
			
			<ul class="navbar-nav px-3">
		         <li class="nav-item text-nowrap">
			  
			  <button class="btn btn-outline-success"onclick="window.location.replace('/logout')">登出</button>
		         </li>
      			</ul>
    		    </nav>

			 	<div class="container-fluid">
     			  <div class="row">
        		   <nav class="col-md-2 d-none d-md-block bg-light sidebar">
			    	<div class="sidebar-sticky">
			     	<ul class="nav flex-column">
			     
			
     			<li class="nav-item">
                		<a class="nav-link" href="#">
                  			<span data-feather="shopping-cart"></span>
							<button class="btn btn-outline-dark btn-block" onclick="location.href='/user'">使用者管理</button>
                		</a>
             	</li>
				
		        <li class="nav-item">
			     		 <a class="nav-link active" href="#">
			        		<span data-feather="home"></span>
				 			 <button class="btn btn-outline-dark btn-block"onclick="location.href='/piwork'">指派工作項目</button>
                 			<span class="sr-only">(current)</span>
                		</a>
              		      </li>
			    <li class="nav-item">
                	<a class="nav-link" href="#">
						<span data-feather="file"></span>
						  
						<button class="btn btn-outline-dark btn-block"onclick="location.href='/search.php?F_TYPE=&F_NAME=&startRow=0&endRow=7&start=1'">搜尋/修改工作</button>
                		</a>
             		     </li>
              		     <li class="nav-item">
                		<a class="nav-link" href="#">
                  		<span data-feather="shopping-cart"></span>
						<button class="btn btn-outline-dark btn-block"onclick="location.href='/add.php'">新增工作項目</button>
                		</a>
              		     </li>
			     <li class="nav-item">
                		<a class="nav-link" href="#">
                  		<span data-feather="shopping-cart"></span>
							<button class="btn btn-outline-dark btn-block"onclick="location.href='/excel_import.php'">JPEG/Excel新增</button>
                		</a>
             	 </li>
				
				 <li class="nav-item">
                		<a class="nav-link" href="#">
                  		<span data-feather="shopping-cart"></span>
							<button class="btn btn-outline-dark btn-block"onclick="location.href='/excel_export.php?F_TYPE=&F_NAME='">Excel匯出資料</button>
                		</a>
             	 </li>
				


			    </div>
			   </nav> 
        		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-3">
				<canvas class="my-3 w-100" id="myChart" width="800" height="0"></canvas>
				<div id="footer"> 
				<html>
					<head>
							<script type="text/javascript"src="static\excel_import.js"></script>
					</head>
					<h1>Excel/圖片新增工作</h1>
                        <form method="POST" id="form" name="form" action='excel_import2.php'enctype="muktipart/form-data" >
                            
							<th>Excel檔案:<th><input id="excel"name = "file" type = "file" accept = "application/vnd.ms-excel">	
							<input type = "button" onclick="Excel_ajax('form')" value="新增" ><br><br>
						</form>

						<form method="POST" id="PDF" name="PDF" action="pdf_import.php" enctype="multipart/form-data">
							<th>JPEG圖片檔:<th><input id="file"name = "file[]" type = "file"multiple='multiple' accept = "application/image/gif,image/jpeg,image/png">	
							<input type = "button" onclick="PDF_ajax('PDF')" value="新增" ><br><br>
							<!--input type = "submit"  value="新增" -->
						</form>
						<tr>
						<span id="ajax"></span><br>
						
						<div class="progress">
							<div id="bar"class="progress-bar progress-bar-striped"role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><span id="percent"></span></div>
						</div>

						<span id="message"></span><br>
						<span id="htmltext"></span><br>
						</tr>

				</html>
				
				
				
                </div>
				
			</main>	
	</body>	
</html>	
<?php



   
