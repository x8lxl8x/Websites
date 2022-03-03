<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Chronicle.bg - Истории Page 3",
  "media_url"       => "https://www.chr.bg/istorii/page/3/",
  "media_encode"    => "false",

  "module_body"     => "main[role=main]",
  "module_article"  => "div[id*=post-]",
  "module_headline" => "h3 a",

  "article_body"    => "div[id*=post-]",
  "article_title"   => "h1 a",
  "article_date"    => "time",
  "article_author"  => "",

  "clean_module"    =>  [
                    ["", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["", ""],
                  ],

  "clean_article_post"  => [
                    ["", ""],
                    ["/<div id=\"div-inconent\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"mobile-in-middle\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"image-author-base\">(.*?)<\/div>/s", ""],
                    ["/<\!-- post title -->(.*?)<\!-- \/post title -->/s", ""],
                    ["/<div class=\"addthis_sharing_toolbox\"(.*?)<\/div>/s", ""],
                    ["/<div class=\"col-xs-12 col-sm-3 p-0\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"post-details\">(.*?)<\/div>/s", ""],
                    ["/<\!-- post details -->(.*?)<\!-- \/post details -->/s", ""],//
                    ["/<div class=\"col-xs-12 col-sm-9 p-0\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"clearfix\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"col-sm-6\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"row\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"related-container pull-right\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"has-content-area\"(.*?)>(.*?)<\/div>(.*)/s", "$2"],
                    ["/<div class=\"chronicle_gallery\"(.*?)>(.*?)<\/div>/s", "$2"],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
