$(function(){
	var codes = $('.highlight code');
	codes.each(function (ind, el) {
		hljs.highlightBlock(el);
	});

	$('.lobipanel-fullscreen').lobiPanel({
		reload: false,
		close: false,
		minimize: false,
		unpin: false,
		editTitle: false,
	});
});