import * as $ from "svelte/internal/client";

var root = $.template(`<div> </div>`);

export default function _unknown_($$anchor, $$props) {
	let name = $.prop($$props, "name", 8, "Svelte");
	var div = root();
	var text = $.child(div);

	$.reset(div);
	$.template_effect(() => $.set_text(text, `Hello ${name() ?? ""}`));
	$.append($$anchor, div);
}
