$(document).ready(function(){
	var categoryData = $('#jobsList').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"manage_jobs.php",
			type:"POST",
			data:{action:'jobsListing'},
			dataType:"json",
		},
		"columnDefs":[
			{
				"targets":[0,2,3],
				"orderable":true,
			},
		],
		"pageLength": 10
	});		
	$(document).on('click', '.delete', function(){
		var jobId = $(this).attr("id");		
		var action = "jobDelete";
		if(confirm("Are you sure you want to delete this category?")) {
			$.ajax({
				url:"manage_jobs.php",
				method:"POST",
				data:{jobId:jobId, action:action},
				success:function(data) {					
					categoryData.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
});