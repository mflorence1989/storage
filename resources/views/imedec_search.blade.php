<!DOCTYPE html>
<html>
 <head>
  <title>Imedecs Data</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container box stable-wrapper-scroll-y ">
   <h3 align="center">Imedecs</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">Search Employee Data</div>
    <div class="panel-body" style="overflow:auto;">
     <div class="form-group">
       @csrf
      <input type="text" name="search" id="search" class="form-control" placeholder="Search Imedecs Data" />
     </div>
     <div class="table-responsive  table-hover">
      <h3 align="center">Total Employees : <span id="total_records"></span></h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>First Name</th>
         <th>Last Name</th>
         <th>email</th>
         <th>company</th>
        </tr>
       </thead>
       <tbody>

       </tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('imedec_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>
