<?php
$config_array =
[
  "media_name"      => "Corriere It-It",
  "media_url"       => "https://dizionari.corriere.it/dizionario_italiano",
  "media_post"      => null,
  "media_word"      => ["/^(.*?)$/s", "$1/{$word_first_char}/{$word_encoded}.shtml"],
  "media_encode"    => "false",

  "article_body"    => "dl[class=chapter]",

  "clean_article"  => [
                    ["/<h1(.*?)>(.*?)<\/h1>/s", ""],
                    ["/<dt><\/dt>/s", ""],
                    ["/<dd>/s", ""],
                    ["/<\/dd>/s", ""],
                    ["/<span class=\"blu\">(\s*?)<em>(.*?)<\/em><\/span>/s", "<span class='blue'>$2</span>"],
                    ["/class=\"green\"/s", "class='darkred'"],
                    ["/<em>(.*?)<\/em>/s", "<span class='green'>$1</span>"],
                    ["/<!-- Blocco \"ADV bottom1\"-->(.*?)<!--\/ End blocco \"ADV bottom1\"-->/s", ""],
                    ["/<a(.*?)>(.*?)<\/a>/s", "$2"],
                  ],
];
?>
