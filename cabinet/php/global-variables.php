<?php
#---------------------------------------------------------------------------------------------------

$strRoot                        = 'https://' . $_SERVER['SERVER_NAME'] . '/';
$strDocroot                     = $_SERVER['DOCUMENT_ROOT'];
$strBlog                        = 'https://ayurveda.help/';

$strPrefix                      = 'galatqxu';
$strSuffix                      = 'site';

$strDbHost                      = 'localhost';
$strDbDatabase                  = $strPrefix . '_' . $strSuffix;
$strDbUser                      = $strPrefix . '_' . $strSuffix;
$strDbPassword                  = '(T*a*7qZ8hy)nk(%';

$strDirTemplates                = '../templates';
$strDirForms                    = $strDirTemplates . '/forms';
$strDirPages                    = $strDirTemplates . '/pages';
$strDirResponses                = $strDirTemplates . '/responses';
$strDirPayments                 = $strDirTemplates . '/payments';
$strDirMailData                 = $strDirTemplates . '/maildata';
$strDirRecommendations          = $strDirTemplates . '/recommendations';

$strDirPhoto                    = '../photos';

$strRecommendationsDir          = '../recommendations/texts';
$strRecommendationsWebImages    = $strRoot . 'recommendations';

$strConsultantEmail             = 'consultant@ayurveda.help';
$strConsultantEmailFull         = "Лина Аюрведа <$strConsultantEmail>";
$strMailHeaders                 = "From: " . $strConsultantEmailFull . "\n";
$strMailHeaders                .= "MIME-Version: 1.0\n";
$strMailHeaders                .= "Content-Type: text/html; charset=UTF-8\n";
$strMailHeaders                .= 'Content-Transfer-Encoding: 8bit\n';

$strPriceFull                   = '120';
$strPriceBasic                  = '60';

$strSourceCurrency              = 'EUR';
$strSourceCurrencySymbol        = '€';
$strSourceCurrencyText          = 'Евро';

$strTargetCurrencyUSD           = 'USD';
$strTargetCurrencySymbolUSD     = '&#36;';
$strTargetCurrencyTextUSD       = 'Доллары США';

$strTargetCurrencyCAD           = 'CAD';
$strTargetCurrencySymbolCAD     = '&#36;';
$strTargetCurrencyTextCAD       = 'Канадские Доллары';

$strTargetCurrencyRUB           = 'RUB';
$strTargetCurrencySymbolRUB     = '₽';
$strTargetCurrencyTextRUB       = 'Рубли';

$strConverterUrl                = 'https://www.google.com/search?q={Amount}+{SourceCurrency}+to+{TargetCurrency}';
$strConverterPattern            = 'data-value="(.*)"';

$strUserAgent                   = 'Mozilla/5.0 (X11; Linux x86_64; rv:98.0) Gecko/20100101 Firefox/98.0';

$strRedirect                    = '';
$strFuncOnLoad                  = '';

#---------------------------------------------------------------------------------------------------
?>
