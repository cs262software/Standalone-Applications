$(document).ready(
	function(){
		$("input[type=submit]").click(function(event){
			event.preventDefault();
			// Checkable fields, and select fields.
			var query = '';
			$('input[type=radio]').each(function()
			{
				if ((this.checked || this.selected) && this.value != '')
				{
					query += '&' + this.attributes["name"].value + '=' + this.value;
				}
			} );
			var filename = $("[name=filename]").val();
			var path = 'setup.php?filename=' + filename + query;
			console.log(path);
			$.get( path,
				function(my_var){
					if(my_var != 'error' )
						reloadFile(my_var);
					else
						alert('error');
				}, 'text'
			);
			return 0;
		});
	}
);

function reloadFile(filename)
{
	$("#outputfilename").html("Download XML").attr('href', filename);
	$.get(filename, function( my_var ) {
		$("#output").val(my_var);
	}, 'text');
}

function uploadFile(){
	//event.preventDefault();
	var file = document.getElementById('fileBox').files[0]; //Files[0] = 1st file
	var reader = new FileReader();
	reader.readAsText(file, 'UTF-8');
	reader.onload = shipOff;
	//reader.onloadstart = ...
	//reader.onprogress = ... <-- Allows you to update a progress bar.
	//reader.onabort = ...
	//reader.onerror = ...
	//reader.onloadend = ...
	return 0;
}


function shipOff(event) {
    var result = event.target.result;
    var fileName = document.getElementById('fileBox').files[0].name; //Should be 'picture.jpg'
    $.post('myscript.php', { data: result, name: fileName}, continueSubmission, 'json');
}

function continueSubmission(data)
{
	$("input[name=filename]").val(data.serverFile);
}