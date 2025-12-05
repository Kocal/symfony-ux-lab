import { registerReactControllerComponents } from "@symfony/ux-react";
import { registerSvelteControllerComponents } from "@symfony/ux-svelte";
import "./bootstrap.js";
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import "./styles/app.css";

console.log("This log comes from assets/app.js - welcome to AssetMapper! 🎉");

registerSvelteControllerComponents();
registerReactControllerComponents();

import { trans } from "./translator.js";

console.log(trans('website.route.article_list.entity.outro'));