<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "The Conversation - Politique",
  "media_url"       => "https://theconversation.com/fr/politique",
  "media_encode"    => "false",

  "module_body"     => "div[class=wrapper]",
  "module_article"  => "article",
  "module_headline" => "h2 a",

  "article_body"    => "div[class=grid-twelve large-grid-eleven]",
  "article_title"   => "h1 strong",
  "article_date"    => "time",
  "article_author"  => "span[class*=author-name]",

  "clean_module"    =>  [
                    ["", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["", ""],
                  ],

  "clean_article_post"  => [
                    ["/topic-list\">(.*)$/s", "\">"],
                    ["/<aside(.*?)aside>/s", ""],
                    ["/<figure(.*?)>(.*?)<\/figure>/s", "$2"],
                    ["/<figcaption(.*?)>(.*?)<\/figcaption>/s", "$2"],
                    ["/ src=\"(.*?)\"/s", ""],
                    ["/data-src=/s", "src="],
                    ["/srcset=/s", "src="],
                    ["/<a(.*?)>(.*?)<\/a>/s", "$2"],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                    ["/<span class=\"source\">(.*?)<\/span>/s", ""],
                    ["/<div(.*?)>/s", ""],
                    ["/<\/div>/s", ""],
                    ["/<span(.*?)>/s", ""],
                    ["/<\/span>/s", ""],
                    ["/<li><p>(.*?)<\/p><\/li>/s", "<li>$1</li>"],
                  ],
];
?>
