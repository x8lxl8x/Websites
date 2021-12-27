<?php
$config_array =
[
  "media_name"      => "Longman En-En",
  "media_url"       => "https://www.ldoceonline.com/dictionary",
  "media_post"      =>  null,
  "media_word"      => ["/^(.*?)$/s", "$1/$word_encoded"],
  "media_encode"    => "false",

  "article_body"    => "div[class=entry_content]",

  "clean_article"  => [
                    ["/<script(.*?)<\/script>/s", ""],
                    ["/<iframe(.*?)<\/iframe>/s", ""],
                    ["/<\!--(.*?)-->/s", ""],
                    ["/<h1 class=\"pagetitle\">(.*?)<\/h1>/s", ""],
                    ["/<div class=\"wordfams\">(.*?)<\/div>/s", ""],
                    ["/<span class=\"PICCAL\">(.*?)<\/span>/s", ""],
                    ["/<span class=\"dictionary_intro span\">(.*?)<\/span>/s", ""],
                    ["/<span class=\"related_topics\">(.*?)<\/span>/s", ""],
                    ["/<span class=\"HYPHENATION\">(.*?)<\/span>/s", ""],
                    ["/<a class=\"topic\"(.*?)>(.*?)<\/a>/s", ""],
                    ["/<\/span><span class=\"HOMNUM\">(.*?)<\/span>/s", "<sup class='clSup'>$1</sup></span>"],
                    ["/<span class=\"FIELD\">(.*?)<\/span>/s", ""],
                    ["/<span class=\"ACTIV\">(.*?)<\/span>/s", ""],
                    ["/<span data-src-mp3=\"(.*?)\"(.*?)>/s", "<span class='clNavAudio' onclick='fncPlayLink(&quot;$1&quot;)'>"],
                    ["/<a(.*?)>(.*?)<\/a>/s", "$2"],
                  ],
];
?>
