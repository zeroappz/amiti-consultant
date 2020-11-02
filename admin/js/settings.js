$(document).ready(function(){
	var settingData = $('#settingList').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"manage_settings.php",
			type:"POST",
			data:{action:'settingListing'},
			dataType:"json"
		},
		"columnDefs":[
			{
				"targets":[0, 4, 5],
				"orderable":false,
			},
		],
		"pageLength": 10
	});		
	$(document).on('click', '.delete', function(){
		var settingId = $(this).attr("id");		
		var action = "settingDelete";
		if(confirm("Are you sure you want to delete this setting?")) {
			$.ajax({
				url:"manage_settings.php",
				method:"POST",
				data:{settingId:settingId, action:action},
				success:function(data) {					
					settingData.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
});