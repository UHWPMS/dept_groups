<html>
   <head>
      <title>Department Groupings</title>
      <script src="//code.jquery.com/jquery-1.12.3.js"></script>
      <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
      <script
         src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
      <link rel="stylesheet"
      href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <link rel="stylesheet"
      href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
      <script>
         $(document).ready(function() {
            $('#table').DataTable();
         } );
      </script>
   </head>
   <body>
      <h1>Manage Department Groupings</h1>
      <table class="table" id="table">
         <thead>
            <th>Campus Code</th> <th>Group Number</th> <th>Department Group Name</th>
            <th>Actions</th>
         </thead>
         <tbody>
            @foreach ($group_names as $group)
               <tr>
                  <td>{{$group->CAMPUS_CODE}}</td>
                  <td>{{$group->DEPT_GRP}}</td>
                  <td>{{$group->DEPT_GRP_NAME}}</td>
                  <td><button class="edit-modal btn btn-info"
                     data-info="{{$group->CAMPUS_CODE}},{{$group->DEPT_GRP}},
                     {{$group->DEPT_GRP_NAME}}">
                     <span class="glyphicon glyphicon-edit"></span> </button>
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
   </body>
</html>
