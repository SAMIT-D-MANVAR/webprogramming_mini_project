<?php  
 $connect = mysqli_connect("localhost", "root", "", "autodoc");  
$sql = "SELECT * FROM customerdetails INNER JOIN servicedetails ON customerdetails.application_no = servicedetails.application_no";  
 $result = mysqli_query($connect, $sql);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>service|details</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
           <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
           <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
           <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
           <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
           <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
           <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

<style>

#customer_data 
{
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customer_data td, #employee_data th 
{
  border: 1px solid #ddd;
  padding: 8px;
}

#customer_data tr:nth-child(even)
{background-color:#99ff66;}

#customer_data tr:hover 
{background-color: yellow;}

#customer_data th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}  
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style type="text/css">
</head>  
<body>  
   
		 <div class="container-fluid">  <!--start container-->
                <h3 align="center">Customer Service Details</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="customer_data" >  
                          <thead>  
                               <tr>  
							   <td style="width:50px;">aid</td>
							   <td style="width:200px;">Name</td>
							   <td style="width:200px;">car regno</td>
							   <td style="width:230px;">type</td>
                               <td style="width:100px;">model</td>
							   <td style="width:300px;">pick/drop</td> 
                               <td style="width:100px;">sevice date</td> 	
                               <td style="width:100px;">service time</td> 										
                               <td style="width:100px;">service type</td>  
                               <td>cost</td>  
                               </tr>  
                          </thead>  
                    <?php  
                         while($row = mysqli_fetch_array($result))  
                            {  
                               echo '  
                               <tr>  
							   <td>'.$row["application_no"].'</td> 
							   <td>'.$row["customer_name"].'</td>  
							   <td>'.$row["reg_no"].'</td>  
                               <td>'.$row["vehicle_type"].'</td> 
                               <td>'.$row["make_model"].'</td>							  
							   <td>'.$row["pickup"].'</td>  
							   <td>'.$row["sdate"].'</td>
							   <td>'.$row["stime"].'</td>
                               <td>'.$row["service_type"].'</td>  
                               <td>'.$row["cost"].'</td>
							   </tr>  
                               ';  
                          }  
                          ?>  
<tfoot>  
    <tr>  
							   <td >aid</td>
							   <td >Name</td>
							   <td>car regno</td>
							   <td>type</td>
                               <td>model</td>
							   <td>pick/drop</td> 
                               <td>sevice date</td> 	
                               <td>service time</td> 										
                               <td>service type</td>  
                               <td>cost</td>  
                                   
</tr>  	
</tfoot>  
</table>  
</div>  
</div>  
<!--end of container-->
<br><!--button -->
<center><a href="customerdetail.php" style="text-decoration:none;" class="button"> CHECK CUSTOMER  DETAILS </a><br>
<a href="adminupdate.php" style="text-decoration:none;" class="button"> CHECK CUSTOMER 	SERVICE STATUS </a>
      </body>  
      
 </html>  
 <script> <!--jquery datable to create search,pdf,excel --> 
$(document).ready( function() {
    $('#customer_data').DataTable( {
        dom: 'Bfrtip',
        buttons: [ 
		{
            extend: 'excelHtml5',
            autoFilter: true,
            sheetName: 'Exported data'
        },

		{
            extend: 'pdfHtml5',
            orientation: 'potrait',
            pageSize: 'A4',
		    download :'open'
        }
		
		
		]
    } );
} );
</script>  
