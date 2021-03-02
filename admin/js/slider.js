$(document).ready(function(){
	var categoryData = $('#sliderList').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"manage_slider.php",
			type:"POST",
			data:{action:'sliderListing'},
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
		var sliderId = $(this).attr("id");		
		var action = "sliderDelete";
		if(confirm("Are you sure you want to delete this category?")) {
			$.ajax({
				url:"manage_slider.php",
				method:"POST",
				data:{sliderId:sliderId, action:action},
				success:function(data) {					
					categoryData.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
});