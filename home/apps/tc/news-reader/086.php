<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Real Investment Advice - Page 2",
  "media_url"       => "https://realinvestmentadvice.com/real-investment-daily/page/2/",
  "media_encode"    => "false",
  "media_encoding"  => "",

  "module_body"     => "div[class*=main-content]",
  "module_article"  => "article",
  "module_headline" => "h2 a",

  "article_body"    => "div[class=content]",
  "article_title"   => "h1",
  "article_date"    => "div[class=meta] small",
  "article_author"  => "",

  "clean_module"    =>  [
                    ["//s", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["//s", ""],
                  ],

  "clean_article_post"  => [
                    ["/<a data-site(.*?)a>/s", ""],
                    ["/<span class=\"ssba-share-text\">(.*?)<\/span>/s", ""],
                    ["/<h1(.*?)h1>/s", ""],
                    ["/<div class=\"meta\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"printfriendly(.*?)<\/div>/s", ""],
                    ["/^(.*?)<div class=\"pf-content\">/s", "<div class=\"pf-content\">"],
                    ["/<!--(.*?)-->/s", ""],
                    ["/<figure(.*?)>/s", ""],
                    ["/<\/figure>/s", ""],
                    ["/<a(.*?)>(.*?)<\/a>/s", "$2"],
                    ["/<div class=\"post-views(.*)$/s", ""],
                    ["/<div(.*?)>/s", ""],
                    ["/<\/div>/s", ""],
                    ["/(alt|title|width|height|itemprop|srcset|loading|sizes|style|class|target|rel|data-preserver-spaces)=\"(.*?)\"/s", ""],
                    ["/(\s*?)>/s", ">"],
                    ["/<noscript>(.*?)<\/noscript>/s", ""],
                    ["/<img(\s*?)src/s", "<img src"],
                    ["/<img src=\"(.*?)\"/s", "<img "],
                    ["/data-lazy-/s", ""],
                    ["/<img(\s*?)src=\"https:\/\/realinvestmentadvice\.com\/wp-content\/uploads\/2019\/01\/Newsletter-Banner\.png\">/s", ""],
                    ["/<img(\s*?)src=\"https:\/\/realinvestmentadvice\.com\/wp-content\/uploads\/2021\/08\/Newsletter-Banner\.png\">/s", ""],
                    ["/<img(\s*?)src=\"https:\/\/realinvestmentadvice\.com\/wp-content\/uploads\/2018\/11\/Need-A-Plan-To-Protect-Your-Savings-1\.png\">/s", ""],
                    ["/<img(\s*?)src=\"https:\/\/realinvestmentadvice\.com\/wp-content\/uploads\/2021\/08\/Need-A-Plan-To-Protect-Your-Savings-1\.png\">/s", ""],
                    ["/<img(\s*?)src=\"https:\/\/realinvestmentadvice\.com\/wp-content\/uploads\/2019\/08\/Subscribe-YOUTUBE\.jpg\">/s", ""],
                    ["/<img(\s*?)src=\"https:\/\/realinvestmentadvice\.com\/wp-content\/uploads\/2021\/08\/Subscribe-YOUTUBE\.jpg\">/s", ""],
                    ["/<img(\s*?)src=\"https:\/\/realinvestmentadvice\.com\/wp-content\/uploads\/2021\/08\/760_x_90_RIA_PRO_Ad_Actionable_Intelligence\.jpg\">/s", ""],
                    ["/<img(\s*?)src=\"https:\/\/realinvestmentadvice\.com\/wp-content\/uploads\/2021\/08\/760_x_90_RIA_PRO_Ad_Actionable_Intelligence\.jpg\">/s", ""],
                    ["/<img(\s*?)src=\"https:\/\/realinvestmentadvice\.com\/wp-content\/uploads\/2019\/08\/RIAPRO-Insights-Banner\.jpg\">/s", ""],
                    ["/<img(\s*?)src=\"https:\/\/realinvestmentadvice\.com\/wp-content\/uploads\/2019\/01\/Investments-Prepared-For-Next-Bear-Market\.png\">/s", ""],
                    ["/<img(\s*?)src=\"https:\/\/realinvestmentadvice\.com\/wp-content\/uploads\/2019\/01\/The-Next-Bear-Market-Is-Coming\.png\">/s", ""],
                    ["/<img(\s*?)src=\"https:\/\/realinvestmentadvice\.com\/wp-content\/uploads\/2018\/11\/RIA-Banner-Blog-Post-500k-or-More-1\.png\">/s", ""],
                    ["/<img(\s*?)src=\"https:\/\/realinvestmentadvice\.com\/wp-content\/uploads\/2019\/01\/RIA-Banner-Blog-Post-500k-or-More\.png\">/s", ""],
                    ["/<img(\s*?)src=\"https:\/\/realinvestmentadvice\.com\/wp-content\/uploads\/2019\/08\/RIAPRO-Dont-Invest-Alone-Banner\.jpg\">/s", ""],
                    ["/<img(\s*?)src=\"https:\/\/realinvestmentadvice\.com\/wp-content\/uploads\/2021\/08\/Need-A-Plan-To-Protect-Your-Savings-1\.png\">/s", ""],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
