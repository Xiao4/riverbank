;
(function($) {
	var __acPatten=/ac_[A-z]+/g;
	$('body').click(function(e) {
		//permission denied to access property 'className' from a non-chrome context(ff3.5 bug). so we try.
		try {
			var target = e.target || e.srcElement || e.originalTarget,
			actions = __getActions(target.className),
			key = 0;
			
			if (!actions.length && '_abutton'.indexOf(target.parentNode.nodeName)) {
				target = target.parentNode;
				actions = __getActions(target.className);
			}
			
			//frist item in actions[] is not useable.we send the other ones as event name.
			while (actions[key]){
				$.publish('click_' + actions[key++], target, e);
			}
		} catch(e) {
			return false;
		}
	});
	function __getActions(actions){
		var tmp=actions.match(__acPatten);
		if(tmp&&tmp.length)
			return tmp.join(',').replace('ac_','').split(',');
		else
			return [];
	}
})(jQuery);
