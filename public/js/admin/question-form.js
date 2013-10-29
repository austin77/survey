var questionForm = {
	$el: $('#questions-page'),

	ui: {
		"optionBtn": "#add-option-btn",
		"optionForm": "#option-form",
		"optionValue": "#option-value",
		"optionList": "#option-list",
		"form": "form"
	},

	setUpUi: function() {
		var self = this;

		_.each(_.keys(self.ui), function(key) {
	      var selector = self.ui[key];
	      this.ui[key] = $(selector);
	    }, this);

	},

	delegateEvents: function() {
		var self = this;

		$("#add-option-btn").on('click', function (event) {
			self.showOptionForm(event);
		});

		$("#option-add-btn").on('click', function (event) {
			self.addOption(event);
		});

		$('a.remove-option').on('click', function (event) {
			self.removeOption(event);
		});
	},

	showOptionForm: function (event) {
		this.ui.optionForm.toggle();
	},

	addOption: function (event) {
		var self = this;

		if(!this.ui.optionValue.val()) {
			alert("Please enter an option");
		}
		else {
			//get value from option field
			var optionValue = this.ui.optionValue.val();
				this.ui.optionValue.val('');

			this.updateOptionList(optionValue);

			$('a.remove-option').click(function (event) {
				self.removeOption(event);
			});
		}
	},

	removeOption: function (event) {
		var el = $(event.currentTarget),
			val = el.attr('data-value');

		this.ui.form.find('input[value="'+val+'"]').remove();
		el.parent('div').parent('li').fadeOut().remove();
		event.preventDefault();
	},

	updateOptionList: function (value) {

		var template = _.template($("#option-template").html()),
			option = '<input type="hidden" name="option[]" value="'+value+'">';

			this.ui.form.append(option);
			this.ui.optionList.prepend( template({value: value}) );
	},

	init: function() {
		
		this.setUpUi();
		this.delegateEvents();
	}
};