import fs from "node:fs";
import path from "node:path";
import { compile } from "svelte/compiler";

function compileDirectory(inputDir, outputDir) {
	const files = fs.readdirSync(inputDir);

	for (const file of files) {
		const inputFile = path.join(inputDir, file);
		const stats = fs.statSync(inputFile);

		if (stats.isDirectory()) {
			const newOutputDir = path.join(outputDir, file);
			if (!fs.existsSync(newOutputDir)) {
				fs.mkdirSync(newOutputDir, { recursive: true });
			}
			compileDirectory(inputFile, newOutputDir);
		} else if (path.extname(file) === ".svelte") {
			const input = fs.readFileSync(inputFile, "utf-8");
			const output = compile(input, {
				discloseVersion: false,

				//    format: 'esm'
			});

			const outputFile = path.join(
				outputDir,
				`${path.basename(file, ".svelte")}.js`,
			);
			fs.writeFileSync(outputFile, output.js.code);
		}
	}
}

compileDirectory(
	path.join(import.meta.dirname, "..", "assets", "svelte"),
	path.join(import.meta.dirname, "..", "assets", "build", "svelte"),
);
