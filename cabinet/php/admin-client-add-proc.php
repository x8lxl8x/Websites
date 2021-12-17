<?php
#---------------------------------------------------------------------------------------------------

include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-variables.php" );
include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-functions.php" );

#---------------------------------------------------------------------------------------------------

$strIdKey = $_GET['varIdKey'];

#---------------------------------------------------------------------------------------------------

$intResult = fncCheckAuthentication( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase, $strIdKey );

if ( $intResult == 0 || $intResult == 1 )
{
  $strContent = fncGetTemplate( $strDirResponses . '/cred-authentication-failed.html' );
}
else if ( $intResult == 2 )
{
  $strClientNameLast    = $_POST['varClientNameLast'];
  $strClientNameFirst    = $_POST['varClientNameFirst'];
  $strClientEmail      = $_POST['varClientEmail'];
  $blnClientEmailSend    = isset( $_POST['varClientEmailSend'] );
  $strMessageText      = $_POST['varMessageText'];

  $objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
  mysqli_query( $objConnection, "set character set 'utf8'" );
  mysqli_query( $objConnection, "set names utf8" );
  mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );

  $strQuery = "select email from aa_client where email = '$strClientEmail';";
  $objResult = mysqli_query( $objConnection, $strQuery );
  $intNumberOfRows = mysqli_num_rows( $objResult );

  if ( $intNumberOfRows == 0 )
  {
    mysqli_free_result( $objResult );

    $strStringSeed = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $strClientIdKey = '';

    for( $intCounter = 0; $intCounter < 12; $intCounter++ )
    {
      $strClientIdKey = $strClientIdKey . $strStringSeed[rand( 0, strlen( $strStringSeed ) )];
    }

    $objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
    mysqli_query( $objConnection, "set character set 'utf8'" );
    mysqli_query( $objConnection, "set names utf8" );
    mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );

    $strDateRequested = date( 'Y-m-d' );
    $strQuery = "insert into aa_client ( idkey, name_last, name_first, email, date_contacted ) values ( '$strClientIdKey', '$strClientNameLast', '$strClientNameFirst', '$strClientEmail', '$strDateRequested' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_welcome_message ( idkey, message_text ) values ( '$strClientIdKey', '$strMessageText' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_form_01 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_form_02 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_form_03 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_form_04 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_form_05 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_form_06 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_form_07 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_form_08 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_form_09 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_form_10 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_form_11 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_form_99 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_recommendation_01 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_recommendation_02 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_recommendation_03 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_recommendation_04 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_recommendation_05 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_recommendation_06 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_recommendation_07 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_recommendation_08 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_recommendation_09 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_recommendation_10 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_recommendation_11 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_recommendation_12 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_recommendation_13 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_recommendation_14 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_recommendation_15 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "insert into aa_recommendation_99 ( idkey ) values ( '$strClientIdKey' );";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strDirName = $strDirPhoto . '/' . $strClientIdKey;

    if ( is_dir( $strDirName ) == false )
    {
      mkdir( $strDirName );
    }

    if ( $blnClientEmailSend )
    {
      $strMailTo    = $strClientEmail;
      $strMailSubject  = "=?UTF-8?B?" . base64_encode( "Виды консультации, стоимость и методы оплаты" ) . "?=";

      $strMailData = fncGetTemplate( $strDirMailData . '/admin-client-added.html' );
      eval( "\$strMailData = \"$strMailData\";" );

      ini_set( 'sendmail_from', $strConsultantEmailFull );
      mail( $strMailTo, $strMailSubject, $strMailData, $strMailHeaders, '-f ' . $strConsultantEmail );
      ini_restore( 'sendmail_from' );
    }

    $strRedirect = "<meta http-equiv='refresh' content='5;url=$strRoot/php/admin-cabinet-page.php?varIdKey=$strIdKey' />";
    $strContent = fncGetTemplate( $strDirResponses . '/admin-client-add-passed.html' );
  }
  else
  {
    $strRedirect = "<meta http-equiv='refresh' content='5;url=$strRoot/php/admin-cabinet-page.php?varIdKey=$strIdKey' />";
    $strContent = fncGetTemplate( $strDirResponses . '/admin-client-add-failed.html' );
  }

  mysqli_close( $objConnection );
}

$strPage = fncGetTemplate( $strDirPages . '/media-screen.html' );

#---------------------------------------------------------------------------------------------------

eval( "\$strContent = \"$strContent\";" );
eval( "\$strPage = \"$strPage\";" );
echo $strPage;

#---------------------------------------------------------------------------------------------------
?>
