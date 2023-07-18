$(".modal-body form").on("submit",function(e){
	e.preventDefault();

	form = $(this);

	data = form.serializeArray();
	token = data[0].value;
	formData = {};
	for (let i=0; i<data.length; i++) {
		formData[data[i].name] = data[i].value;
	}
	$.ajax({
		url : form.attr("action"),
		method : form.attr("method"),
		data : formData,
		success : function(response){
			console.log(response);
			window.location.reload();
		},
		error : function(error){
			if(error.responseJSON != null){
				$.each(error.responseJSON.errors, function(key,item){
					form.find($("[name="+key+"]")).after(`
						<div class="error" style="color: red;">
							`+item+`
						</div>
					`);
				})
			}
		}
	})


})
$("input").on("click", function(){
	console.log($(this));
})