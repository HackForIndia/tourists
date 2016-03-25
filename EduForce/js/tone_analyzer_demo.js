function txt() 
{
	
	var txt = $("#txt").val();
		var dataString = 'txt='+ txt;
		$.ajax({
			type: "POST",
			url: "tone_analyzer.php",
			data: dataString,
			cache: false,
			beforeSend: function() 
			{
				$("#loading").html('<img width="98px" height="98px" src="images/loading.gif" align="absmiddle" />');
			},
			success: function(response)
			{
				$('#response').html(response);
				$("#loading").html('');
			}
		});
}