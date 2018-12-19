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
					
					<h1>工作清單</h1>
						<table class="table table-hover">

						<tr>
							<th>名稱</th>
							<th>類別</th>
							<th>工程</th>
							<th>網卡名稱</th> 
							<?php
							if($_SESSION['permission'] != 2 ){	
								echo	"<th>修改/指派</th> 
										<th>刪除</th> ";
							}
							?>
						</tr>
						<?php
							include 'mysql.php';
							$select = "select a.PID,a.P_NAME,a.P_DESCRIBE,b.F_TYPE,b.F_NAME from Pi_list a left outer join Manual b on P_FID = FID";
							$db = new db;
							$row = $db->select_array($select);
							$lengh=count($row);
						
							for($i=0;$i<=$lengh-1;$i++){
								$PID=$row[$i][0];
								$piname=$row[$i][1];
								$describe = $row[$i][2];
								$F_TYPE = $row[$i][3];
								$F_NAME = $row[$i][4];
								echo"<tr>
										<td>$describe</td>
										<td>$F_TYPE</td>
										<td>$F_NAME</td>
										<td>$piname</td>";
								if($_SESSION['permission'] != 2){																
								echo "<td><button id='$PID'class='btn btn-outline-dark' onclick=location.href='/piwork_page.php?PID=$PID&P_DESCRIBE=$describe&F_TYPE=$F_TYPE&F_NAME=$F_NAME'>指派工作</button></td>
									  <td><button id='$PID'class='btn btn-outline-dark' onclick=Delete(this.id,'/piwork2.php')>刪除資料</button></td>						
									  </tr>";
								}
							}
						?>						
					</table>
				</html>			
                </div>
			</main>	
	</body>	
</html>	



   
