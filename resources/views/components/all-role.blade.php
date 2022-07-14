<table id="dt-button" class="table table-bordered table-hover table-striped w-100">
    <thead>
        <tr>
            <th>Role Name</th>
            <th>Status</th>
            <th>Actions</th>
            <!-- <th>Salary</th> -->
        </tr>
    </thead>
    <tbody>

	@foreach($result as $result)
		<tr>
			<td>{{$result->role_name}}</td>
			<td>Active</td>
            <td><a onclick="LoadPage('/assignrolerights/{{$result->id}}/{{$result->role_name}}')" class="btn btn-primary"style="color:white !important;">Assign Rights</a></td>
            
		</tr>
	@endforeach
      
    </tbody>
</table>

<script>
    $(document).ready(function()
   {
       $('#dt-button').dataTable(
       {
           responsive: true,
           dom:
               "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'B>>" +
               "<'row'<'col-sm-12'tr>>" +
               "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
           buttons: [
               {
                   extend: 'colvis',
                   text: 'Column Visibility',
                   titleAttr: 'Col visibility',
                   className: 'btn-outline-default'
               },
               {
                   extend: 'csvHtml5',
                   text: 'CSV',
                   titleAttr: 'Generate CSV',
                   className: 'btn-outline-default'
               },
               {
                   extend: 'copyHtml5',
                   text: 'Copy',
                   titleAttr: 'Copy to clipboard',
                   className: 'btn-outline-default'
               },
               {
                   extend: 'print',
                   text: 'Print',
                   titleAttr: 'Print Table',
                   className: 'btn-outline-default'
               }
           ]
       });
   });
</script>

<script>
        // function LoadPage(courl) {
        //     $.ajax({
        //         headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},
        //         url: courl,
        //         success: function(result) {
        //             $("#js-page-content").html(result);
        //         }
        //     });
        // }
    </script>