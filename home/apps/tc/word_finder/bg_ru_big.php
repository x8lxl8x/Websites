<?php
$config_array =
[
  "media_name"      => "Большой Бг-Ру",
  "media_url"       => "http://www.learn-bulgarian.ru",
  "media_post"      =>  [
      'langdir' => 'lang_rus'
    , 'search'  => ''
  ],

  "media_word"      => ["//s", ""],
  "media_encode"    => "false",

  "article_body"    => "div[class=lexemeshldr]",

  "clean_article"  => [
                    ["/<script(.*?)script>/s", ""],
                    ["/<ins(.*?)ins>/s", ""],
                    ["/<div id=\"vk_comments\">(.*?)<\/div>/s", ""],
                    ["/<\!--(.*?)-->/s", ""],
                    ["/<div style=\"padding(.*?)div>/s", ""],
                    ["/<div style=\"margin-top(.*?)div>/s", ""],
                    ["/\[ref\]/s", ""],
                    ["/\[\/ref\]/s", ""],
                  ],
];
?>
