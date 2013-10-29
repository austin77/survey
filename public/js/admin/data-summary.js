var dataSummary = {
	$el: $('#analytics-index-page'),

	init: function () {

		var questions = this.$el.find('div.question-summary');
			questions.each(function() {
				var data = {
					labels : ["January","February","March","April","May","June","July"],
					datasets : [
						{
							fillColor : "rgba(220,220,220,0.5)",
							strokeColor : "rgba(220,220,220,1)",
							data : [65,59,90,81,56,55,40]
						},
						{
							fillColor : "rgba(151,187,205,0.5)",
							strokeColor : "rgba(151,187,205,1)",
							data : [28,48,40,19,96,27,100]
						}
					]
				};

				var questionOptions = $(this).find('input[type="hidden"]').val(),
					questionCtx = $(this).find('canvas').get(0).getContext("2d");

				var questionChart = new Chart(questionCtx).Bar(data);
			});
	}		
}