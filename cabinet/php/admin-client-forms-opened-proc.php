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
  $objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
  mysqli_query( $objConnection, "set character set 'utf8'" );
  mysqli_query( $objConnection, "set names utf8" );
  mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );

  $strQuery = "update aa_client set date_completed = '0000-00-00', date_consulted = '0000-00-00' where idkey = '$strClientIdKey';";
  mysqli_query( $objConnection, $strQuery );
  mysqli_query( $objConnection, 'commit;' );
  mysqli_close( $objConnection );

  $strMailTo    = $strClientEmail;
  $strMailSubject  = "=?UTF-8?B?" . base64_encode( "Доступ к изменению форм открыт" ) . "?=";

  $strMailData = fncGetTemplate( $strDirMailData . '/admin-forms-opened.html' );
  eval( "\$strMailData = \"$strMailData\";" );

  ini_set( 'sendmail_from', $strConsultantEmailFull );
  mail( $strMailTo, $strMailSubject, $strMailData, $strMailHeaders, '-f ' . $strConsultantEmail );
  ini_restore( 'sendmail_from' );

  $strRedirect = "<meta http-equiv='refresh' content='5;url=$strRoot/php/admin-cabinet-page.php?varIdKey=$strIdKey' />";
  $strContent = fncGetTemplate( $strDirResponses . '/admin-client-forms-opened-passed.html' );
}

$strPage = fncGetTemplate( $strDirPages . '/media-screen.html' );

#---------------------------------------------------------------------------------------------------

eval( "\$strContent = \"$strContent\";" );
eval( "\$strPage = \"$strPage\";" );
echo $strPage;

#---------------------------------------------------------------------------------------------------
?>
