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
  $objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
  mysqli_query( $objConnection, "set character set 'utf8'" );
  mysqli_query( $objConnection, "set names utf8" );
  mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );

  $strQuery = "select idkey, email, name_last, name_first from aa_client where idkey = '$strIdKey';";
  $objResult = mysqli_query( $objConnection, $strQuery );
  $intNumberOfRows = mysqli_num_rows( $objResult );
  $arrValues = mysqli_fetch_row( $objResult );
  mysqli_free_result( $objResult );

  $strClientIdKey = $strIdKey;
  $strClientEmail = $arrValues[1];
  $strClientNameLast = $arrValues[2];
  $strClientNameFirst = $arrValues[3];

  $strDate = date( 'Y-m-d' );

  $strQuery = "update aa_client set date_completed = '$strDate' where idkey = '$strIdKey';";
  mysqli_query( $objConnection, $strQuery );
  mysqli_query( $objConnection, 'commit;' );

  mysqli_close( $objConnection );

  #----------------------------------------------------------------------------------------------
  # To Consultant
  #----------------------------------------------------------------------------------------------

  $strMailTo    = $strConsultantEmail;
  $strMailSubject  = "=?UTF-8?B?" . base64_encode( "Формы заполнены -  $strClientNameFirst $strClientNameLast" ) . "?=";

  $strMailData = fncGetTemplate( $strDirMailData . '/client-forms-completed-admin.html' );
  eval( "\$strMailData = \"$strMailData\";" );

  ini_set( 'sendmail_from', $strConsultantEmailFull );
  mail( $strMailTo, $strMailSubject, $strMailData, $strMailHeaders, '-f ' . $strConsultantEmail );
  ini_restore( 'sendmail_from' );

  #----------------------------------------------------------------------------------------------
  # To Client
  #----------------------------------------------------------------------------------------------

  $strMailTo    = $strClientEmail;
  $strMailSubject  = "Сообщение о готовности форм к обработке получено";

  $strMailData = fncGetTemplate( $strDirMailData . '/client-forms-completed-client.html' );
  eval( "\$strMailData = \"$strMailData\";" );

  ini_set( 'sendmail_from', $strConsultantEmailFull );
  mail( $strMailTo, $strMailSubject, $strMailData, $strMailHeaders, '-f ' . $strConsultantEmail );
  ini_restore( 'sendmail_from' );

  $strRedirect = "<meta http-equiv='refresh' content='5;url=$strRoot/php/client-cabinet-page.php?varIdKey=$strIdKey' />";
  $strContent = fncGetTemplate( $strDirResponses . '/client-forms-completed-passed.html' );
}

$strPage = fncGetTemplate( $strDirPages . '/media-screen.html' );

#---------------------------------------------------------------------------------------------------

eval( "\$strContent = \"$strContent\";" );
eval( "\$strPage = \"$strPage\";" );
echo $strPage;

#---------------------------------------------------------------------------------------------------
?>
