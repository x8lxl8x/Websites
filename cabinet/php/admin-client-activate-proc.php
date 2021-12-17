<?php
#---------------------------------------------------------------------------------------------------

include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-variables.php" );
include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-functions.php" );

#---------------------------------------------------------------------------------------------------

$strIdKey      = $_GET['varIdKey'];
$strClientIdKey    = $_GET['varClientIdKey'];
$strClientNameLast  = $_GET['varClientNameLast'];
$strClientNameFirst  = $_GET['varClientNameFirst'];
$strClientEmail    = $_GET['varClientEmail'];

#---------------------------------------------------------------------------------------------------

$intResult = fncCheckAuthentication( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase, $strIdKey );

if ( $intResult == 0 || $intResult == 1 )
{
  $strContent = fncGetTemplate( $strDirResponses . '/cred-authentication-failed.html' );
}
else if ( $intResult == 2 )
{
  $strDatePaid = date( 'Y-m-d' );

  $objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
  mysqli_query( $objConnection, "set character set 'utf8'" );
  mysqli_query( $objConnection, "set names utf8" );
  mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );

  $strQuery = "update aa_client set payment_confirmed = 'Y' where idkey = '$strClientIdKey';";
  $objResult1 = mysqli_query( $objConnection, $strQuery );
  $objResult2 = mysqli_query( $objConnection, 'commit;' );
  mysqli_close( $objConnection );

  if ( $objResult1 && $objResult2 )
  {
    $strMailTo    = $strClientEmail;
    $strMailSubject  = "=?UTF-8?B?" . base64_encode( "Оплата получена. Опросные формы доступны для заполнения." ) . "?=";

    $strMailData = fncGetTemplate( $strDirMailData . '/admin-client-activated.html' );
    eval( "\$strMailData = \"$strMailData\";" );

    $strDirName = $strDirPhoto . '/' . $strClientIdKey;

    ini_set( 'sendmail_from', $strConsultantEmailFull );
    mail( $strMailTo, $strMailSubject, $strMailData, $strMailHeaders, '-f ' . $strConsultantEmail );
    ini_restore( 'sendmail_from' );

    $strRedirect = "<meta http-equiv='refresh' content='5;url=$strRoot/php/admin-cabinet-page.php?varIdKey=$strIdKey' />";
    $strContent = fncGetTemplate( $strDirResponses . '/admin-client-activate-passed.html' );
  }
  else
  {
    $strRedirect = "<meta http-equiv='refresh' content='5;url=$strRoot/php/admin-cabinet-page.php?varIdKey=$strIdKey' />";
    $strContent = fncGetTemplate( $strDirResponses . '/admin-client-activate-failed.html' );
  }
}

$strPage = fncGetTemplate( $strDirPages . '/media-screen.html' );

#---------------------------------------------------------------------------------------------------

eval( "\$strContent = \"$strContent\";" );
eval( "\$strPage = \"$strPage\";" );
echo $strPage;

#---------------------------------------------------------------------------------------------------
?>
