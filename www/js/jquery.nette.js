/**
 * AJAX Nette Framwork plugin for jQuery
 *
 * @copyright  Copyright (c) 2009, 2010 Jan Marek
 * @copyright  Copyright (c) 2009, 2010 David Grudl
 * @license    MIT
 * @link       http://nette.org/cs/extras/jquery-ajax
 */

/*
 if (typeof jQuery != 'function') {
 alert('jQuery was not loaded');
 }
 */

(function($) {

	$.nette = {
		success: function(payload)
		{
			if (!payload) {
				return;
			}
			// redirect
			if (payload.redirect) {
				window.location.href = payload.redirect;
				return;
			}

			// state
			if (payload.state) {
				$.nette.state = payload.state;
			}

			// snippets
			if (payload.snippets) {
				for (var i in payload.snippets) {
					$.nette.updateSnippet(i, payload.snippets[i]);
				}
			}

			// change URL (requires HTML5)
			if (window.history && history.pushState && $.nette.href) {
				history.pushState({href: $.nette.href}, '', $.nette.href);
			}
		},
		updateSnippet: function(id, html)
		{
			$('#' + id).html(html);
		},
		// create animated spinner
		createSpinner: function(id)
		{
			return this.spinner = $('<div></div>').attr('id', id ? id : 'ajax-spinner').ajaxStart(function() {
				$(this).show();

			}).ajaxStop(function() {
				$(this).hide().css({
					position: 'fixed',
					left: '50%',
					top: '50%'
				});

			}).appendTo('body').hide();
		},
		// current page state
		state: null,
		href: null,
		// spinner element
		spinner: null
	};


})(jQuery);

jQuery.extend({
	nette: {
		updateSnippet: function(id, html) {
			jQuery(document.getElementById(id)).html(html);
		},
		success: function(response) {
			var payload = response.responseJSON;

			if (!payload) {
				return;
			}
			// redirect
			if (payload.redirect) {
				window.location.href = payload.redirect;
				return;
			}
			// snippets
			if (payload.snippets) {
				for (var i in payload.snippets) {
					jQuery.nette.updateSnippet(i, payload.snippets[i]);
				}
			}
		}
	}
});

jQuery.ajaxSetup({
	complete: jQuery.nette.success,
	dataType: "json"
});


