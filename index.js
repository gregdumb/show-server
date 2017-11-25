

$(document).ready(function () {
	$('select').material_select();
	
	updateRemoteProjectList();
	
	// Play button
	$("#btn-play-show").on("click", function() {
		
		var newShow = $("#select-show").val();
		
		$.get("./api/playshow.php?id=" + newShow, function(data) {
			
		});
		
		console.log(newShow);
	});
	
	// Play all button
	$("#btn-play-all").on("click", function() {
		
		$.get("./api/killall.php", function(data) {
			$.get("./api/playall.php");
		});
		
		
	});
	
	// Stop button
	$("#btn-stop").on("click", function() {
		$.get("./api/killall.php");
	});
	
	// Sparkle button
	$("#btn-sparkle").on("click", function() {
		$.get("./api/run.php?cmd=sparkle");
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