<?php
$config_array =
[
  "media_name"      => "Larousse Fr-Fr",
  "media_url"       => "https://www.larousse.fr/dictionnaires/francais",
  "media_post"      => null,
  "media_word"      => ["/^(.*?)$/s", "$1/$word_encoded"],
  "media_encode"    => "false",

  "article_body"    => "article[class*=BlocDefinition]",

  "clean_article"  => [
                    ["/\t/s", " "],
                    ["/<div class=\"Zone(.*?)\"(.*?)>(.*?)<\/div>/s", "$3"],
                    ["/<h2(.*?)>(.*?)<\/h2>/s", "$2"],
                    ["/<a class=\"lienconj\"(.*?)>Conjugaison<\/a>/s", ""],
                    ["/<span class=\"linkaudio fontello\"(.*?)span>/s", ""],
                    ["/<\/audio>(.*?)</s", "</audio><"],
                    ["/<audio(.*?)src=\"(.*?)\" type=\"audio\/mp3\"><\/audio>/s", "<span class='clNavAudio' onclick='fncPlayLink(&quot;https://larousse.fr$2&quot;)'></span>"],
                    ["/<a(.*?)>(.*?)<\/a>/s", "$2"],
                    ["/<li class=\"DivisionDefinition\">(.*?)<\/li>/s", "<div class='DivisionDefinition'>$1</div>"],
                    ["/<ul class=\"Definitions\">(.*?)<\/ul>/s", "$1"],
                  ],
];
?>
