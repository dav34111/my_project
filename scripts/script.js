$(document).ready(function(){

	$('#add').click(function(){
		
		var c_name = $('.name').val();
		var c_code = $('.code').val();
		var c_district = $('.district').val();
		var c_polulation = $('.population').val();

		$.ajax({
			url:'../user/add',
			type:'post',
			data:{ c_name:c_name, c_code:c_code, c_district:c_district, c_polulation:c_polulation },
			success: function(data){
				document.location.reload();
			}
		})
	})

	$('.update').click(function(){
		
		var id = $(this).closest('tr').attr('id');
		var new_pop = $(this).parent().prev().text();
		var new_dist = $(this).parent().prev().prev().text();
		var new_code = $(this).parent().prev().prev().prev().text();
		var new_name = $(this).parent().prev().prev().prev().prev().text();

		$.ajax({
			url:'../user/update',
			type:'post',
			data:{ id:id, new_name:new_name, new_code:new_code, new_dist:new_dist, new_pop:new_pop },
			success: function(data){
				//document.location.reload();
				$('#disp').text(data);
			}
		})
	})

	$('.delete').click(function(){
		
		var id = $(this).closest('tr').attr('id');
		
		$.ajax({
			url:'../user/delete',
			type:'post',
			data:{ id:id },
			success: function(data){
				document.location.reload();
			}
		})
	})

})