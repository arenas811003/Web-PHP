<html>
	<?php include 'session.php';?>
	<head>
        <meta charset="utf-8">
        
		<link rel="stylesheet" type="text/css" href="bootstrap-4.1.3/site/docs/4.1/examples/dashboard/dashboard.css">
		<link rel="stylesheet" type="text/css" href="bootstrap-4.1.3/dist/css/bootstrap.min.css">
		<script type="text/javascript"src="dist/js/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap-4.1.3/dist/js/bootstrap.min.js"></script>
   		
	</head>
	<body>
			
   		    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-1 shadow">
				
			
      		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/search.php?F_TYPE=&F_NAME=&startRow=0&endRow=7&start=1";>&nbsp;&emsp;PHP-SERVER</a>
			
			
			<ul class="navbar-nav px-3">
		         <li class="nav-item text-nowrap">
			  
			  <button class="btn btn-outline-success"onclick="window.location.replace('/logout.php')">登出</button>
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
							  <?php
                                if($_SESSION['permission'] == 0){  
                                    echo "<button class='btn btn-outline-dark btn-block' onclick=location.href='/user.php'>使用者管理</button>";
                                }
                            ?>
                		</a>
             	</li>
				
		        <li class="nav-item">
			     		 <a class="nav-link active" href="#">
			        		<span data-feather="home"></span>
				 			 <button class="btn btn-outline-dark btn-block"onclick="location.href='/piwork.php'">指派工作項目</button>
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
							<script type="text/javascript"src="static\piwork.js"></script>
							
					</head>
					
						<h1>指派工作項目</h1>
						<form method="POST" id="form" name="form" action="">
                        <?php
                            if(!empty($_GET['P_DESCRIBE'])){
                                $describe=$_GET['P_DESCRIBE'];
                                echo "<th>名稱:</th><input type = 'text' name='add' value='$describe'>";
                            }
                        ?>
							<input type = "button"class="btn btn-outline-dark"  value="修改"onclick = "modify('/piwork2.php')">
						</form>

						<span>當前工作項目</span>

						<form>
                        
                            <?php
                                if(!empty($_GET['F_TYPE']) && !empty($_GET['F_NAME']) && !empty($_GET['PID'])){
                                    $F_TYPE = $_GET['F_TYPE'];
								    $F_NAME = $_GET['F_NAME'];
                                    $PID=$_GET['PID'];
                                    echo "<span>類別:$F_TYPE</span>
                                        <span>工程:$F_NAME</span>";
                                    echo "<input type='hidden' id='pid' name='pid' value='$PID'>";
                                }
                            ?>
							
							
						</form>

							<div class="input-group">
							<form id="form" class="form-inline" >

							<span>類別: </span>
							<select id = "select"class="custom-select mr-sm-3" onclick="F_NAME(this)">

									<option></option>
									<?php
                                        include 'mysql.php';
                                        $select = "select distinct F_TYPE from Manual";
                                        $db = new db;
                                        $row = $db->select_array($select);
                                        $lengh=count($row);
                                        print_r($lengh);
                                        for($i=0;$i<=$lengh-1;$i++){
                                         
                                            echo "<option>".$row[$i][0]."</option>";
                                        } 
                                       
                                    ?>
							</select>
								
							<span>工程: </span>

							    <select id = "select_"class="custom-select mr-sm-3">

							</select>

								<input class="btn btn-outline-dark my-0 my-sm-10" type="button" value="指派" onclick='piwork_page("/piwork2.php")'>

							</form>
						</div>

				</html>
                </div>	
			</main>	
	</body>	
</html>	




   
