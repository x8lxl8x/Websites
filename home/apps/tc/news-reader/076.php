<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Zerohedge - Page 1",
  "media_url"       => "https://www.zerohedge.com/",
  "media_encode"    => "false",

  "module_body"     => "main[class=main-content]",
  "module_article"  => "div[class^=Article_nonStickyContainer]",
  "module_headline" => "h2 a",

  "article_body"    => "main[class=main-content]",
  "article_title"   => "h1",
  "article_date"    => "div[class^=ArticleFull_headerFooter__date]",
  "article_author"  => "div[class^=ArticleFull_headerFooter__author]",

  "clean_module"    =>  [
                    ["/Article_stickyContainer/s", "Article_nonStickyContainer"],
                  ],

  "clean_article_pre"   =>  [
                    ["/<img class=\"ArticleFull_headerFooter__authorPhoto(.*?)>/s", ""],
                    ["/<div class=\"ArticleFull_headerFooter__author(.*?)\">(.*?)<\/div>/s", " $2"],
                  ],

  "clean_article_post"  => [
                    ["/^(.*)header>/s", ""],
                    ["/<rect(.*?)rect>/s", ""],
                    ["/<svg(.*?)svg>/s", ""],
                    ["/<path(.*?)path>/s", ""],
                    ["/<footer(.*)/s", ""],
                    ["/<a href=\"(.*?)\"><em>Authored by(.*?)<\/em><\/a>/s", "Authored by $2"],
                    ["/ style=\"min(.*?)\"/s", ""],
                    ["/ class=\"Advert_tablet(.*?)\"/s", ""],
                    ["/ class=\"Advert_desktop(.*?)\"/s", ""],
                    ["/ (typeof|data-entity-type|data-entity-uuid|data-image-external-href|data-link-option)=\"(.*?)\"/s", ""],
                    ["/<div(.*?)>/s", ""],
                    ["/<\/div>/s", ""],
                    ["/ (height|width|class|alt|data-responsive-image-style)=\"(.*?)\"/s", ""],
                    ["/\/>/s", ">"],
                    ["/<picture>(.*?)<\/picture>/s", ""],
                    ["/<a data-image-href=\"(.*?)\"(.*?)a>/s", "<img src=\"$1\">"],
                    ["/<a(.*?)>(.*?)<\/a>/s", "$2"],
                    ["/<img src=\"(.*?)\">/s", "<a target='_blank' href='$1'><img class='clImageThumb' src='$1'></a><br>"],
                  ],
];
?>
