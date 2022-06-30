<?php
#----------------------------------------------------------------------------------------------------

include("./global-objects.php");
include("./simple-html-dom.php");

#---------------------------------------------------------------------------------------------------
# https://simplehtmldom.sourceforge.io/docs/1.9/api/str_get_html/
#---------------------------------------------------------------------------------------------------

$debug_file     = "/home/" . get_current_user() . "/mnt/data/Temp/debug-forex-quotes";

0 ? $debug_flag = true : $debug_flag = false;

#---------------------------------------------------------------------------------------------------

$page_title   = "Forex Quotes";
$url_domain   = "https://www.investing.com";
$url_template = "https://tradingeconomics.com/currencies";

$currencies_array  =
[
    ['EUR/USD',  '1', '€/$']
#  , ['USD/CHF',  '4', '$/₣']
#  , ['GBP/USD',  '2', '£/$']
];

$currencies_string  = '';

#----------------------------------------------------------------------------------------------------

$apps_area        = "fn";
$template_content = "../{$dir_templates}/forex-quotes.html";
$template_html    = "../{$dir_templates}/global-template.html";

function get_items($url_string, $currency_number)
{
  global $debug_flag, $debug_file;

  $input_string = get_url($url_string);

  $input_string = preg_replace("/<style(.*?)style>/s", "", $input_string);
  $input_string = preg_replace("/<script(.*?)script>/s", "", $input_string);
  $input_string = preg_replace("/<meta(.*?)>/s", "", $input_string);

  $html_array = str_get_html($input_string);
  $currency_value = $html_array->find("td[id=p]", 0)->innertext;
  $currency_value = trim($currency_value);
  $currency_value = sprintf("%6.4f", $currency_value);

  if ($debug_flag)
  {
    file_put_contents($debug_file . "-01.log", '');
    file_put_contents($debug_file . "-01.log", $block_string_02, FILE_APPEND);
  }

  $html_array->clear();
  unset($html_array);

  return $currency_value;
}

#----------------------------------------------------------------------------------------------------

foreach($currencies_array as $currency_item)
{
  $url_string = $url_template;

  $currencies_string .= "<div class='clValue'><div class='clSymbol'>" . $currency_item[2] . "</div>" . get_items($url_string, $currency_item[1]) . "</div>";
#  $currencies_string .= "<div class='clValue'>" . get_items($url_string, $currency_item[1]) . "</div>";
}

date_default_timezone_set('Europe/Sofia');
#$time_string =  date('D M d, H:i:s') . ' EET';
$time_string =  date('H:i');

date_default_timezone_set('UTC');
#$time_string_utc =  date('D M d, H:i:s') . ' UTC';
$time_string_utc =  date('H:i');

#------------------------------------------------------------------------------------------------------------

$page_content = get_file_template($template_content);
$page_html = get_file_template($template_html);

#----------------------------------------------------------------------------------------------------

eval("\$page_content = \"{$page_content}\";");
eval("\$page_html = \"{$page_html}\";");
echo $page_html;

#------------------------------------------------------------------------------------------------------------
?>
