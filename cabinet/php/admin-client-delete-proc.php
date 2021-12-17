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
  $strClientIdKey  = $_POST['varClientIdKey'];

  $objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
  mysqli_query( $objConnection, "set character set 'utf8'" );
  mysqli_query( $objConnection, "set names utf8" );
  mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );

  $strQuery = "select idkey, name_last, name_first from aa_client where idkey = '$strClientIdKey';";
  $objResult = mysqli_query( $objConnection, $strQuery );
  $intNumberOfRows = mysqli_num_rows( $objResult );
  $arrValues = mysqli_fetch_row( $objResult );
  mysqli_free_result( $objResult );

  $strClientNameLast    = $arrValues[1];
  $strClientNameFirst    = $arrValues[2];

  if ( $intNumberOfRows != 0)
  {
    $strQuery = "delete from aa_client where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_welcome_message where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_form_01 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_form_02 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_form_03 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_form_04 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_form_05 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_form_06 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_form_07 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_form_08 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_form_09 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_form_10 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_form_11 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_form_99 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_recommendation_01 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_recommendation_02 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_recommendation_03 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_recommendation_04 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_recommendation_05 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_recommendation_06 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_recommendation_07 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_recommendation_08 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_recommendation_09 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_recommendation_10 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_recommendation_11 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_recommendation_12 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_recommendation_13 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_recommendation_14 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_recommendation_15 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strQuery = "delete from aa_recommendation_99 where idkey = '$strClientIdKey';";
    mysqli_query( $objConnection, $strQuery );
    mysqli_query( $objConnection, 'commit;' );

    $strDirName = $strDirPhoto . '/' . $strClientIdKey;

    if ( is_dir( $strDirName ) == true )
    {
      foreach( glob( $strDirName . '/*' ) as $strFileName ) { unlink( $strFileName ); }
      rmdir( $strDirName );
    }

    $strRedirect = "<meta http-equiv='refresh' content='5;url=$strRoot/php/admin-cabinet-page.php?varIdKey=$strIdKey' />";
    $strContent = fncGetTemplate( $strDirResponses . '/admin-client-delete-passed.html' );
  }
  else
  {
    $strRedirect = "<meta http-equiv='refresh' content='5;url=$strRoot/php/admin-cabinet-page.php?varIdKey=$strIdKey' />";
    $strContent = fncGetTemplate( $strDirResponses . '/admin-client-delete-failed.html' );
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
