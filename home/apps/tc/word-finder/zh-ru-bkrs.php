<?php
$config_array =
[
  "media_name"      => "БКРС Zh-Ru",
  "media_url"       => "https://bkrs.info",
  "media_post"      =>  null,
  "media_word"      => ["/^(.*?)$/s", "$1/slovo.php?ch=$word_encoded"],
  "media_encode"    => "false",

  "article_body"    => "div[class=margin_left]",

  "clean_article"  => [
                    ["/^(.*?)<div id='ch'>/s", "<div id='ch'>"],
                    ["/<div id='backlinks'>(.*?)$/s", ""],
                    ["/<div class='pt10(.*?)$/s", ""],
                    ["/<img(.*?)>/s", ""],
                    ["/(\s+)<div/s", "\n<div"],
                  ],
];
?>
