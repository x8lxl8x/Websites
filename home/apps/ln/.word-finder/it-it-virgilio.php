<?php
$config_array =
[
  "media_name"      => "Virgilio It-It",
  "media_url"       => "https://sapere.virgilio.it/parole/vocabolario",
  "media_post"      => null,
  "media_word"      => ["/^(.*?)$/s", "$1/$word_encoded"],
  "media_encode"    => "false",

  "article_body"    => "section[class*=sct--ouverture]",

  "clean_article"  => [
                    ["/<div class=\"sct-asd_list\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"sct-source\">(.*?)$/s", ""],
                    ["/<h1>(.*?)<\/h1>/s", ""],
                    ["/<div class=\"sct-descr\">(.*?)<\/div>/s", "$1"],
                    ["/^(.*?)<br\/>/s", "<p>"],
                    ["/<strong>/s", " <strong>"],
                    ["/<\/ol><\/li>/s", "</li>\n</ol>"],
                    ["/<br\/>(\s*?)<\/p>/s", "</p>"],
                    ["/<ol>(.*?)<li>/s", "<ol>\n<li>"],
                    ["/<ol>(.*?)<li>/s", "<ol>\n<li>"],
                    ["/<\/ol>(.*?)<br\/>/s", "</ol>"],
                    ["/Verbo(.*?)Transitivo/s", "Verbo Transitivo"],
                    ["/Verbo(.*?)Intransitivo/s", "Verbo Intransitivo"],
                  ],
];
?>
