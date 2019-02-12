$(function(){

	$("body").on("click", ".btn-add", function(e){
		e.preventDefault();
		let divp = $(this).closest("#answerparentdiv")
		let newdiv = $(this).closest("div").clone()
		$(this).closest("div").find(".btn-remove").show()
		$(this).closest("div").find(".btn-add").hide()
		newdiv.appendTo(divp)
		newdiv.find("input").val("")
		newdiv.find(".btn-remove").show()
		newdiv.find("[name='answer[]']").focus()
	})

	$("body").on("click", ".btn-remove", function(e){
		
		if($(this).closest('div').is(":last-child")){
			$(this).closest('div').prev().find(".btn-add").show()
		}
		
		let amountanswer = $("#answerparentdiv").children().length

		if(amountanswer-1 == 1){
			$(this).closest('div').prev().find(".btn-remove").hide()
		}

		if(amountanswer > 1) {
			$(this).closest("div").remove()
		}

	})

	$(document).ready(function() {
		$.post("get_questions.php", {
    		cmd : "get_question"
  		},
		function(data, status){
			$('#question').autocomplete({
				source: data,
				autoFocus: true
			})
		})
	})

	// $("#question").input(function(e){
	// 	alert("cddfsf")
	// })


	$("#smtBtn").click(function(){
		let question = document.getElementById("question").val()

		alert(json)

		// $.post("http://35.198.240.228:20000/api/wordset",
		// {
		//   text: question,
		//   type: type,
		//   answer: answer
		// },
		// function(data,status){
		//   alert("Data: " + data + "\nStatus: " + status);
		// });
	});
	

})