<html>
   <head>
      <style>
         .body {
            padding: 0;
            margin: 0;
         }

         .table {
            width: 100%;
            height: 60%;
         }

         .table-padding {
            padding-top: 30px;
            padding: 0 90px;
         }
         .center-table {
            margin: 0 auto;
         }

         /* .testing {
            max-height: 200px; /* Set the maximum height for the table */
            /* overflow-y: auto } */

         .custom-header-color {
            background-color: #333333;
            color: white;
         }

         .header-width {
            background-color: #BFE8E5;
            padding-left: 20px;
            padding-top: 30px;
            padding-bottom: 30px;
         }

         .dept-groupings-content {
            padding: 0 60px;
         }

         .dataTables_filter {
            text-align: left;
         }

         .dataTables_filter label {
            display: none;
         }

         .dataTables_filter input {
            background-color: #FFF;
            border: 1px solid #CCC;
            border-radius: 20px; 
            padding: 10px;
            margin-top: 10px;
            width: 300px;
            height: 40px;
         }
         
         .create-dept-group-button {
            background-color: #BFE8E5;
            /* color: black; */
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 20px;
         }

         .right-align {
            text-align: right;
         }
      </style>
      <title>Department Groupings</title>
      <script src="//code.jquery.com/jquery-1.12.3.js"></script>
      <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
      <script
         src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
      <link rel="stylesheet"
      href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <link rel="stylesheet"
      href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="/public/css/styles.css"> 
      <script>
         $(document).ready(function() {
            $('#table').DataTable({
               info: false, // Disable the "Showing 1 to 8 of 8 entries" info
               paging: false, // Disable pagination
            });

            $('.custom-header-color').css('height', '60px');

            
         } );
      </script>
   </head>
   <body>
      <div class="header-width">
      <h3>Manage Department Groupings</h3>
      </div>
      <div class="dept-groupings-content">
         <div class="dataTables_filter">
            <input type="search" class="form-control" id="table_filter" placeholder="Search">
         </div>
         <div class="testing" id="container">
            <div class="table-padding table-responsive">
               <table class="table table-bordered table-hover center-table" style="width: auto" id="table">
                  <thead class="custom-header-color">
                     <th>Campus Code</th>
                     <th>Group Number</th>
                     <th>Department Group Name</th>
                     <th>Edit</th>
                     <th>Delete</th>
                  </thead>
                  <tbody>
                     @foreach ($group_names as $group)
                        <tr>
                           <td>{{$group->CAMPUS_CODE}}</td>
                           <td>{{$group->DEPT_GRP}}</td>
                           <td>{{$group->DEPT_GRP_NAME}}</td>
                           <td>
                              <button class="edit-modal btn btn-info"
                              data-info="{{$group->CAMPUS_CODE}},{{$group->DEPT_GRP}},
                              {{$group->DEPT_GRP_NAME}}">
                                 <span class="glyphicon glyphicon-edit"></span>
                              </button>
                           <td>
                              <button class="delete-modal btn btn-danger"
                                 data-info="{{$group->CAMPUS_CODE}},{{$group->DEPT_GRP}},
                                 {{$group->DEPT_GRP_NAME}}">
                                 <span class="glyphicon glyphicon-trash"></span> 
                              </button>
                           </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
         <div class="right-align">
            <button class="create-dept-group-button">Create Department Group</button>
         </div>
      </div>
   </body>
</html>
