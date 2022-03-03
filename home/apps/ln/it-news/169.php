<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "il Giornale - Tecnologia - Pagina 1",
  "media_url"       => "https://www.ilgiornale.it/sezioni/tecnologia.html?page=1",
  "media_encode"    => "false",

  "module_body"     => "div[class=term__main]",
  "module_article"  => "article",
  "module_headline" => "div[class=card__title]",

  "article_body"    => "article",
  "article_title"   => "h1",
  "article_date"    => "span[class=content__date]",
  "article_author"  => "span[class=author-ref]",

  "clean_module"    =>  [
                    ["/<a class=\"card\"(.*?)>(.*?)<\/a>/s", "<article><a class=\"card\"$1>$2</a></article>"],
                  ],

  "clean_article_pre"   =>  [
                    ["/<h1(.*?)>(\s*?)<span>(.*?)<\/span>(\s*?)<\/h1>/s", "<h1>$3</h1>"],
                    ["/<span class=\"author-ref\">(.*?)<span>(.*?)<\/span>(.*?)<\/span>/s", "<span class=\"author-ref\">$2</span>"],
                  ],

  "clean_article_post"  => [
                    ["/<h1(.*?)>(.*?)<\/h1>/s", ""],
                    ["/<div class=\"strip-article--academy\">(.*?)$/s", ""],
                    ["/<button(.*?)>(.*?)<\/button>/s", ""],
                    ["/<span class=\"content__date\">(.*?)<\/span>/s", ""],
                    ["/<div class=\"content__authors\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"content__ix\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"content__authors-comments\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"social-share\">(.*?)<\/div>/s", ""],
                    ["/<div id=\"adv-gpt-box-mobile-container1\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"banner(.*?)\">(.*?)<\/div>/s", ""],
                    ["/<figure(.*?)>(.*?)<\/figure>/s", "$2"],
                    ["/<picture(.*?)>(.*?)<\/picture>/s", "$2"],
                    ["/<div(.*?)>/s", ""],
                    ["/<\/div>/s", ""],
                    ["/<p>(\s*?)<\/p>/s", ""],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                    ["/jpg\?\_=(.*?)'/s", "jpg'"],
                  ],
];
?>
