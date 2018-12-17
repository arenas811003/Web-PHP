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
                </html>
                    <head>
                        <meta charset="utf-8">
                        <script type="text/javascript"src="static\excel_export.js"></script> 
                        <script type="text/javascript"src="dist\js\jquery.min.js"></script>
                    </head>
                        <h1>Excel匯出</h1>
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="input-group">
                                <form id="form" class="form-inline" >
                                    <span>類別: </span>
                                    <span> &nbsp;</span>
                                    <select id="select" class="custom-select" onclick="getType(this)">
                                    <option> </option>
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
                                    <span> &nbsp;</span>
                                    
                                    <span>工作項目: </span>
                                    <span> &nbsp;</span>
                                    <select id="select_type" class="custom-select">

                                        
                                        <option> </option>
     

                                    </select>
                                    <span> &nbsp;</span>
                                    <span> 關鍵字搜尋: </span>
                                    <span> &nbsp;</span>   
                                    <input type="text" id="keyword" onclick="keywords()"onkeypress="if (event.keyCode == 13){search_data('/excel_export.php?'); return false;}">
                                    <span> &nbsp;</span>
                                    <span> &nbsp;</span>
                                    <input class="btn btn-outline-dark my-0 my-sm-10" type="button" value="搜尋" onclick="search_data('/excel_export.php?')">
                                </form>
                             
                                <form class="form-inline" >
                                    <span> &nbsp;</span>
                                    <span> Excel: </span>
                                    <span> &nbsp;</span>
                                    <input class="btn btn-outline-dark my-0 my-sm-10" type="button"  value="匯出搜尋頁面" onclick='Excel_path()'>
                                </form>

                            </div>
                        </nav>
                        <table id="datatable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>類別</th>
                                    <th>工程</th> 
                                </tr>
                            </thead>
                        <!-- {% if message != "" %}
                        <tr>
                            <td>搜尋 "{{message}}" 無此筆資料</td>
                        </td>
                        {% endif%} -->

                            <tbody>
                                <?php
                                    $F_TYPE = $_GET['F_TYPE'];
                                    $F_NAME = $_GET['F_NAME'];
                                    
                                    function showline($sql){
                                        $db= new db;
                                        $Value=$db->select_array($sql);
                                        $lengh=count($Value);
                    
                                        for($i=0;$i<=$lengh-1;$i++){
                                            echo "<tr><td>".$Value[$i][1]."</td>"."<td>".$Value[$i][2]."</td></tr>";
                                        }
                                        return $lengh;
                                    }
                                  
                                    if(!empty($_GET['F_TYPE']) && empty($_GET['F_NAME'])){//搜尋類別
                                        
                                        $sql = "select * from Manual where F_TYPE = '$F_TYPE'";
                                        showline($sql);
                                    }

                                    if(empty($_GET['F_TYPE']) && !empty($_GET['F_NAME'])){//搜尋工程
                                        
                                        $sql = "select * from Manual where F_NAME like '%$F_NAME%'";
                                        $lengh=showline($sql); 
                                        if($lengh<1){

                                            echo"<tr><td>"."'$F_NAME'無此筆資料"."<td></tr>";
                                        }           
                                        exit;
                                    }
                                    if(empty($_GET['F_TYPE']) && empty($_GET['F_NAME'])){//搜尋所有類別、工程
                                        
                                        $sql = "select * from Manual";
                                        showline($sql);
                                        
                                    }

                                    if(!empty($_GET['F_TYPE']) && !empty($_GET['F_NAME'])){//搜尋類別、工程
                                        
                                        $sql = "select * from Manual where F_TYPE = '$F_TYPE' and F_NAME = '$F_NAME'";
                                        showline($sql);
                                        
                                    }
                                    
                                ?>
                            <!-- {%for record in showline%}
                                <tr>
                                    <td>{{record[1]}}</td>
                                    <td>{{record[2]}}</td>
                                </tr>
                            {% endfor %} -->
                            </tbody>
                        </table>
                </html>
                </div>
				
			</main>	
	</body>	
</html>	




   
