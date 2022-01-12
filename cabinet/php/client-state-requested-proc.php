<?php
#---------------------------------------------------------------------------------------------------

include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-variables.php" );
include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-functions.php" );

#---------------------------------------------------------------------------------------------------

$strIdKey = $_GET['varIdKey'];

#---------------------------------------------------------------------------------------------------

$intResult = fncCheckAuthentication( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase, $strIdKey );

if ( $intResult == 0 || $intResult == 2 )
{
  $strContent = fncGetTemplate( $strDirResponses . '/cred-authentication-failed.html' );
}
else if ( $intResult == 1 )
{
  $strPackage      = $_POST['varPackage'];
  $strPaymentMethod  = $_POST['varPaymentMethod'];
  $strClientNameLast  = $_POST['varClientNameLast'];
  $strClientNameFirst  = $_POST['varClientNameFirst'];
  $strClientEmail    = $_POST['varClientEmail'];

  switch ( $strPaymentMethod )
  {
    case '01':
      $strPaymentMethodName = 'Сбербанк';
      break;
    case '02':
      $strPaymentMethodName = 'SEPA';
      break;
    case '03':
      $strPaymentMethodName = 'Western Union';
      break;
    case '04':
      $strPaymentMethodName = 'Золотая корона';
      break;
    case '05':
      $strPaymentMethodName = 'Interac';
      break;
    case '06':
      $strPaymentMethodName = 'ACH';
      break;
  }

  $strDate = date( 'Y-m-d' );

  $objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
  mysqli_query( $objConnection, "set character set 'utf8'" );
  mysqli_query( $objConnection, "set names utf8" );
  mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );

  $strQuery = "update aa_client set package = '$strPackage', payment_method = '$strPaymentMethod', date_requested = '$strDate' where idkey = '$strIdKey';";
  mysqli_query( $objConnection, $strQuery );
  mysqli_query( $objConnection, 'commit;' );

  $strQuery = "update aa_client inner join aa_packages on aa_client.package = aa_packages.package set aa_client.price = aa_packages.package_price where aa_client.idkey = '$strIdKey';";
  mysqli_query( $objConnection, $strQuery );
  mysqli_query( $objConnection, 'commit;' );

  $strQuery = "select package_name from aa_packages where package = '$strPackage';";
  $objResult = mysqli_query( $objConnection, $strQuery );
  $arrValues = mysqli_fetch_row( $objResult );
  mysqli_free_result( $objResult );

  $strPackageName = $arrValues[0];

  mysqli_close( $objConnection );

  $strMailData = fncGetTemplate( $strDirMailData . '/client-state-requested.html' );
  eval( "\$strMailData = \"$strMailData\";" );

  $strMailSubject  = "=?UTF-8?B?" . base64_encode( "Пакет и метод оплаты выбраны" ) . "?=";

  ini_set( 'sendmail_from', $strConsultantEmailFull );

  $strMailTo    = $strClientEmail;
  mail( $strMailTo, $strMailSubject, $strMailData, $strMailHeaders, '-f ' . $strConsultantEmail );

  $strMailTo    = $strConsultantEmail;
  mail( $strMailTo, $strMailSubject, $strMailData, $strMailHeaders, '-f ' . $strConsultantEmail );

  ini_restore( 'sendmail_from' );

  $strRedirect = "<meta http-equiv='refresh' content='5;url=$strRoot/php/client-cabinet-page.php?varIdKey=$strIdKey' />";
  $strContent = fncGetTemplate( $strDirResponses . '/client-state-requested-passed.html' );
}

$strPage = fncGetTemplate( $strDirPages . '/media-screen.html' );

#---------------------------------------------------------------------------------------------------

eval( "\$strContent = \"$strContent\";" );
eval( "\$strPage = \"$strPage\";" );
echo $strPage;

#---------------------------------------------------------------------------------------------------
?>
