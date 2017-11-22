

$(document).ready(function () {
	$('select').material_select();
	
	updateRemoteProjectList();
	
	$("#btn-play-show").on("click", function() {
		
		var newShow = $("#select-show").val();
		
		$.get("./api/playshow.php?id=" + newShow, function(data) {
			
		});
		
		console.log(newShow);
	});
});



function updateRemoteProjectList() {
	
	var projectDropdown = $("#select-show");
	projectDropdown.empty();
	projectDropdown.material_select();
	
	getRemoteProjectList(function(newList) {
		console.log(newList);
		
		for(let i = 0; i < newList.length; i++) {
			let newString = newList[i];
			
			let newOption = $("<option>").attr('value', newString).text(newString);
			
			projectDropdown.append(newOption);
		}
		
		// Refresh
		projectDropdown.material_select();
	});
}

function getRemoteProjectList(callbackFunction) {
	$.get("api/" + "getprojects.php", function(data) {
		var projectArray = JSON.parse(data);
		callbackFunction(projectArray);
	});
}