<?php
// config
$app = "index.html";
$js = ["app.js"];
$css = ["style.css"];
$file = "index.embed.html";

// get init html
$html = file_get_contents($app);

// replace all js includes
for ($x = 0; $x < count($js); $x++) {
    $replacer = '<script src="' . $js[$x] . '"></script>';
    $mini = preg_replace(array("/\s+\n/", "/\n\s+/", "/ +/"), array("\n", "\n ", " "), file_get_contents($js[$x]));
    $replacement = '<script>' . $mini . '</script>';
    $html = str_replace($replacer, $replacement, $html);
}

// replace all css includes
for ($x = 0; $x < count($js); $x++) {
    $replacer = '<link rel="stylesheet" href="' . $css[$x] . '" />';
    $mini = str_replace('; ', ';', str_replace(' }', '}', str_replace('{ ', '{', str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), "", preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', file_get_contents($css[$x]))))));
    $replacement = '<style>' . $mini . '</style>';
    $html = str_replace($replacer, $replacement, $html);
}

// export
$export = fopen($file, "w") or die("Unable to export embed!");
fwrite($export, $html);
fclose($export);
