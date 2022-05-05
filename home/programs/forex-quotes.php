<?php
#----------------------------------------------------------------------------------------------------

include("./global-objects.php");
include("./simple-html-dom.php");

#----------------------------------------------------------------------------------------------------

$page_title     = "Forex Quotes";
$strUrlDomain   = "https://www.investing.com";
$strUrlTemplate = "https://www.widgets.investing.com/live-currency-cross-rates?theme=darkTheme&cols=last,change,changePerc&pairs=PAIRS";

$arrCurrencies  =
[
    ['USD/CHF',  '4', '$/₣']
#  , ['EUR/USD',  '1', '€/$']
#  , ['GBP/USD',  '2', '£/$']
];

$strCurrencies  = '';

#----------------------------------------------------------------------------------------------------

$apps_area        = "fn";
$template_content = "../{$dir_templates}/forex-quotes.html";
$template_html    = "../{$dir_templates}/global-template.html";

function fncGetItems($strUrl, $strCurrencyNumber)
{
  $strInput = get_url($strUrl);
  $arrHtml = str_get_html($strInput);

  $strCurrencyName = $arrHtml->find("div[class*=pid-${strCurrencyNumber}-last]", 0)->innertext;
  $strOutput = $strCurrencyName;

  $arrHtml->clear();
  unset($arrHtml);

  return $strOutput;
}

#----------------------------------------------------------------------------------------------------

foreach($arrCurrencies as $strCurrency)
{
  $strUrl = str_replace("PAIRS", $strCurrency[1], $strUrlTemplate);
  $strCurrencies .= "<div class='clValue'><div class='clSymbol'>" . $strCurrency[2] . "</div>" . fncGetItems($strUrl, $strCurrency[1]) . "</div>";
#  $strCurrencies .= "<div class='clValue'>" . fncGetItems($strUrl, $strCurrency[1]) . "</div>";
}

date_default_timezone_set('Europe/Sofia');
#$strTime =  date('D M d, H:i:s') . ' EET';
$strTime =  date('H:i');

date_default_timezone_set('UTC');
#$strTimeUTC =  date('D M d, H:i:s') . ' UTC';
$strTimeUTC =  date('H:i');

#------------------------------------------------------------------------------------------------------------

$page_content = get_file_template($template_content);
$page_html = get_file_template($template_html);

#----------------------------------------------------------------------------------------------------

eval("\$page_content = \"{$page_content}\";");
eval("\$page_html = \"{$page_html}\";");
echo $page_html;

#------------------------------------------------------------------------------------------------------------
?>
