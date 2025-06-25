import { Controller } from "@hotwired/stimulus";
import "leaflet-editable";

export default class extends Controller {
	connect() {
		this.element.addEventListener("ux:map:pre-connect", this._onPreConnect);
		this.element.addEventListener("ux:map:connect", this._onConnect);
		this.element.addEventListener("ux:map:marker:before-create", (event) => {
			event.detail.definition.rawOptions = { opacity: 0.5};
			event.detail.definition.bridgeOptions = { title: 'Paris!!'};
		});
	}

	disconnect() {
		// You should always remove listeners when the controller is disconnected to avoid side effects
		this.element.removeEventListener("ux:map:pre-connect", this._onPreConnect);
		this.element.removeEventListener("ux:map:connect", this._onConnect);
	}

	_onPreConnect(event) {
		event.detail.rawOptions = {
			editable: true,
			// other custom options
		};
	}

	_onConnect(event) {
		console.log(event.detail.L);
		console.log(window.L);
		console.log(event.detail.L === window.L);
	}
}
