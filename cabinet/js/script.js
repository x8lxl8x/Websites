/*----------------------------------------------------------------------------------------------------------*/

var prevScrollpos = window.pageYOffset;

window.onscroll = function()
{
  var currentScrollPos = window.pageYOffset;

  if (prevScrollpos > currentScrollPos)
  {
    document.getElementById( 'idHeader' ).style.top = '0';
  }
  else
  {
    document.getElementById( 'idHeader' ).style.top = '-06.00em';
  }
  prevScrollpos = currentScrollPos;
}

/*----------------------------------------------------------------------------------------------------------*/

function fncOnLoadAuthentication()
{
  var strCookieName = 'ckIdKey';
  var arrCookies = document.cookie.split('; ');

  for( i = arrCookies.length - 1; i >= 0; i-- )
  {
    var arrCookie = arrCookies[i].split('=');
    if ( arrCookie[0] === strCookieName )
    {
      var strIdKey = arrCookie[1]
      break;
    }
  }

  if ( strIdKey )
  {
    strURLNew = window.location.protocol + '//' + window.location.host + '/php/cred-authentication-proc.php?varIdKey=' + strIdKey;
    window.location.href = strURLNew;
  }
}

/*----------------------------------------------------------------------------------------------------------*/

function fncOnLoadAdmin()
{
  localStorage.clear();
}

/*----------------------------------------------------------------------------------------------------------*/

function fncSubmitAuthentication()
{
  var strCookieName = 'ckIdKey';
  var varDate = new Date();
  varDate.setTime( varDate.getTime() + ( 365 * 24 * 60 * 60 * 1000 ) );
  var strCookieExpiresPath = '; expires=' + varDate.toGMTString() + '; path=/';
  var strIdKey = document.getElementById( 'idIdKey' ).value;

  document.cookie = strCookieName + '=' + strIdKey + strCookieExpiresPath;
  document.getElementById( 'idMain' ).submit();
}

/*----------------------------------------------------------------------------------------------------------*/

function fncSubmitIdkeyRestoration()
{
  document.getElementById( 'idMain' ).submit();
}

/*----------------------------------------------------------------------------------------------------------*/

function fncExitCabinet()
{
  var strCookieName = 'ckIdKey';
  var varDate = new Date();
  varDate.setTime( varDate.getTime() + ( 365 * 24 * 60 * 60 * 1000 ) );
  var strCookieExpiresPath = '; expires=' + varDate.toGMTString() + '; path=/';

  document.cookie = strCookieName + '=' + '' + strCookieExpiresPath;
  localStorage.clear();

  strURLNew = window.location.protocol + '//' + window.location.host + '/';
  window.location.href = strURLNew;
}

/*----------------------------------------------------------------------------------------------------------*/

function fncOnLoadRecommendationAdmin( intForm, intFields )
{
  var strForm = intForm.toString()
  if ( strForm.length < 2 )
  {
    strForm = '0' + strForm;
  }

  var strFormSaved = localStorage.getItem( 'var' + strForm + '00' );

  for( var intCounter = 1; intCounter <= intFields; intCounter++ )
  {
    var strField = intCounter.toString();
    if ( strField.length < 2 )
    {
      strField = '00' + strField;
    }

    if ( strField.length < 3 )
    {
      strField = '0' + strField;
    }

    var strId = 'id' + strForm + strField;

    var strName = 'var' + strForm + strField;
    var strValue = localStorage.getItem( strName );
    var strType = document.getElementById( strId ).type;

    if ( strFormSaved === '1' || strFormSaved == null )
    {
      if ( strType === 'text' )
      {
        localStorage.setItem( strName, document.getElementById( strId ).placeholder );
        document.getElementById( strId ).value = document.getElementById( strId ).placeholder;
        document.getElementById( strId ).placeholder = '';
      }

      if ( strType === 'textarea' )
      {
        localStorage.setItem( strName, document.getElementById( strId ).innerHTML );
        document.getElementById( strId ).value = document.getElementById( strId ).innerHTML;
      }

      if ( strType === 'checkbox' )
      {
        if ( document.getElementById( strId ).placeholder === '1' )
        {
          localStorage.setItem( strName, '1' );
          document.getElementById( strId ).checked = true;
        }
        else
        {
          localStorage.setItem( strName, '0' );
          document.getElementById( strId ).checked = false;
        }

        document.getElementById( strId ).placeholder = '';
      }

      if ( strType === 'select-one' )
      {
        for( var intOption = 0; intOption < document.getElementById( strId ).length; intOption++ )
        {
          if ( document.getElementById( strId ).title != '' )
          {
            if ( document.getElementById( strId ).options[intOption].text === document.getElementById( strId ).title )
            {
              document.getElementById( strId ).options[intOption].selected = true;
              localStorage.setItem( strName, document.getElementById( strId ).title );
            }
          }
        }
      }
    }
    else
    {
      if ( strType === 'text' )
      {
        document.getElementById( strId ).value = strValue;
      }

      if ( strType === 'textarea' )
      {
        document.getElementById( strId ).value = strValue;
      }

      if ( strType === 'checkbox' )
      {
        if ( strValue === '1' )
        {
          document.getElementById( strId ).checked = true;
        }
        else
        {
          document.getElementById( strId ).checked = false;
        }
      }

      if ( strType === 'select-one' )
      {
        document.getElementById( strId ).value = strValue;
      }
    }

  }

  localStorage.setItem( 'var' + strForm + '00', '0' );
}

/*----------------------------------------------------------------------------------------------------------*/

function fncSubmitRecommendationAdmin( intForm, intFields )
{
  var strForm = intForm.toString()
  if ( strForm.length < 2 )
  {
    strForm = '0' + strForm;
  }

  for( var intCounter = 1; intCounter <= intFields; intCounter++ )
  {
    var strField = intCounter.toString();
    if ( strField.length < 2 )
    {
      strField = '00' + strField;
    }

    if ( strField.length < 3 )
    {
      strField = '0' + strField;
    }

    var strName = 'var' + strForm + strField;
    var strId = 'id' + strForm + strField;
    var strValue = document.getElementById( strId ).value;

    localStorage.setItem( 'var' + strForm + '00', '1' );
    localStorage.setItem( strName, '' );
  }

  document.getElementById( 'idMain' ).submit();
}

/*----------------------------------------------------------------------------------------------------------*/

function fncOnLoadFormAdmin( intForm, intFields )
{
  var strForm = intForm.toString()
  if ( strForm.length < 2 )
  {
    strForm = '0' + strForm;
  }

  for( var intCounter = 1; intCounter <= intFields; intCounter++ )
  {
    var strField = intCounter.toString();
    if ( strField.length < 2 )
    {
      strField = '0' + strField;
    }

    var strId = 'id' + strForm + strField;

    var strName = 'var' + strForm + strField;
    var strType = document.getElementById( strId ).type;

    if ( strType === 'text' )
    {
      document.getElementById( strId ).value = document.getElementById( strId ).placeholder;
      document.getElementById( strId ).placeholder = '';
    }

    if ( strType === 'textarea' )
    {
      document.getElementById( strId ).value = document.getElementById( strId ).innerHTML;
    }

    if ( strType === 'checkbox' )
    {
      if ( document.getElementById( strId ).placeholder === '1' )
      {
        document.getElementById( strId ).checked = true;
      }
      else
      {
        document.getElementById( strId ).checked = false;
      }

      document.getElementById( strId ).placeholder = '';
    }

    if ( strType === 'select-one' )
    {
      for( var intOption = 0; intOption < document.getElementById( strId ).length; intOption++ )
      {
        if ( document.getElementById( strId ).title != '' )
        {
          if ( document.getElementById( strId ).options[intOption].text === document.getElementById( strId ).title )
          {
            document.getElementById( strId ).options[intOption].selected = true;
          }
        }
      }
    }
  }

  var strIdentificator;
  var strString;

  strIdentificator = 'idHeader3';
  strString = document.getElementById( strIdentificator ).innerHTML;
  document.getElementById( strIdentificator ).innerHTML = strString.replace( 'Личный кабинет - ', '' );

  strIdentificator = 'idHeader4';
  strString = document.getElementById( strIdentificator ).innerHTML;
  document.getElementById( strIdentificator ).innerHTML = strString.replace( 'Опроснaя формa - ', '' );

  strIdentificator = 'idExitLink';
  document.getElementById( strIdentificator ).innerHTML = "<a href='javascript:history.back()'>Вернуться на страницу клиента</a>";

  if ( strForm === '99' )
  {
    return;
  }

  strIdentificator = 'idSubmit';
  document.getElementById( strIdentificator ).innerHTML = '';
}

/*----------------------------------------------------------------------------------------------------------*/

function fncOnLoadForm( intForm, intFields )
{
  var strForm = intForm.toString()
  if ( strForm.length < 2 )
  {
    strForm = '0' + strForm;
  }

  var strFormSaved = localStorage.getItem( 'var' + strForm + '00' );

  for( var intCounter = 1; intCounter <= intFields; intCounter++ )
  {
    var strField = intCounter.toString();
    if ( strField.length < 2 )
    {
      strField = '0' + strField;
    }

    var strId = 'id' + strForm + strField;

    var strName = 'var' + strForm + strField;
    var strValue = localStorage.getItem( strName );
    var strType = document.getElementById( strId ).type;

    if ( strFormSaved === '1' || strFormSaved == null )
    {
      if ( strType === 'text' )
      {
        localStorage.setItem( strName, document.getElementById( strId ).placeholder );
        document.getElementById( strId ).value = document.getElementById( strId ).placeholder;
        document.getElementById( strId ).placeholder = '';
      }

      if ( strType === 'textarea' )
      {
        localStorage.setItem( strName, document.getElementById( strId ).innerHTML );
        document.getElementById( strId ).value = document.getElementById( strId ).innerHTML;
      }

      if ( strType === 'checkbox' )
      {
        if ( document.getElementById( strId ).placeholder === '1' )
        {
          localStorage.setItem( strName, '1' );
          document.getElementById( strId ).checked = true;
        }
        else
        {
          localStorage.setItem( strName, '0' );
          document.getElementById( strId ).checked = false;
        }

        document.getElementById( strId ).placeholder = '';
      }

      if ( strType === 'select-one' )
      {
        for( var intOption = 0; intOption < document.getElementById( strId ).length; intOption++ )
        {
          if ( document.getElementById( strId ).title != '' )
          {
            if ( document.getElementById( strId ).options[intOption].text === document.getElementById( strId ).title )
            {
              document.getElementById( strId ).options[intOption].selected = true;
              localStorage.setItem( strName, document.getElementById( strId ).title );
            }
          }
        }
      }
    }
    else
    {
      if ( strType === 'text' )
      {
        document.getElementById( strId ).value = strValue;
      }

      if ( strType === 'textarea' )
      {
        document.getElementById( strId ).value = strValue;
      }

      if ( strType === 'checkbox' )
      {
        if ( strValue === '1' )
        {
          document.getElementById( strId ).checked = true;
        }
        else
        {
          document.getElementById( strId ).checked = false;
        }
      }

      if ( strType === 'select-one' )
      {
        document.getElementById( strId ).value = strValue;
      }
    }

  }

  strIdentificator = 'idFormsCompleted';
  strFormsCompleted = document.getElementById( strIdentificator ).value;

  if ( strFormsCompleted !== '0000-00-00' )
  {
    strIdentificator = 'idSubmit';
    document.getElementById( strIdentificator ).innerHTML = "";
  }

  localStorage.setItem( 'var' + strForm + '00', '0' );
}

/*----------------------------------------------------------------------------------------------------------*/

function fncOnLoadPhoto()
{
  strIdentificator = 'idFormsCompleted';
  strFormsCompleted = document.getElementById( strIdentificator ).value;

  if ( strFormsCompleted !== '0000-00-00' )
  {
    strIdentificator = 'idSubmit';
    document.getElementById( strIdentificator ).innerHTML = "";
  }
}

/*----------------------------------------------------------------------------------------------------------*/

function fncOnBlur( varItem )
{
  var strId    = varItem.id;
  var strName  = varItem.name;
  var strValue = varItem.value;
  var strType  = varItem.type;

  if ( strType === 'checkbox' )
  {
    if ( varItem.checked )
    {
      strValue = '1';
    }
    else
    {
      strValue = '';
    }
  }

  if ( strType === 'select-one' )
  {
//    alert(strValue);
  }

  if ( ( strName === 'var0101' || strName === 'var0258' ) && ( isNaN( strValue ) || strValue === '' ) )
  {
    if ( strName === 'var0101' )
    {
      alert( 'Введите число в поле: Год рождения' );
    }
    else if ( strName === 'var0258' )
    {
      alert( 'Введите число в поле: Длительность цикла (дней)' );
    }

    window.setTimeout( function() { document.getElementById( strId ).focus(); }, 0 );
    return;
  }

  localStorage.setItem( strName, strValue );
}

/*----------------------------------------------------------------------------------------------------------*/

function fncSubmitForm( intForm, intFields )
{
  var strForm = intForm.toString()
  if ( strForm.length < 2 )
  {
    strForm = '0' + strForm;
  }

  for( var intCounter = 1; intCounter <= intFields; intCounter++ )
  {
    var strField = intCounter.toString();
    if ( strField.length < 2 )
    {
      strField = '0' + strField;
    }

    var strName = 'var' + strForm + strField;
    var strId = 'id' + strForm + strField;
    var strValue = document.getElementById( strId ).value;

    if ( ( strName === 'var0101' || strName === 'var0258' ) && ( isNaN( strValue ) || strValue === '' ) )
    {
      if ( strName === 'var0101' )
      {
        alert( 'Введите число в поле: Год рождения' );
      }
      else if ( strName === 'var0258' )
      {
        alert( 'Введите число в поле: Длительность цикла (дней)' );
      }

      window.setTimeout( function() { document.getElementById( strId ).focus(); }, 0 );
      return;
    }

    localStorage.setItem( 'var' + strForm + '00', '1' );
    localStorage.setItem( strName, '' );
  }

  document.getElementById( 'idMain' ).submit();
}

/*----------------------------------------------------------------------------------------------------------*/

function fncClientAdd()
{
  var strId = '';
  var strValue =

  strId = 'idClientNameLast'
  strValue = document.getElementById( strId ).value;
  if ( strValue === '' )
  {
    alert( 'Введите фамилию' );
    window.setTimeout( function() { document.getElementById( strId ).focus(); }, 0 );
    return;
  }

  strId = 'idClientNameFirst'
  strValue = document.getElementById( strId ).value;
  if ( strValue === '' )
  {
    alert( 'Введите имя' );
    window.setTimeout( function() { document.getElementById( strId ).focus(); }, 0 );
    return;
  }

  strId = 'idClientEmail'
  strValue = document.getElementById( strId ).value;
  if ( strValue === '' )
  {
    alert( 'Введите почтовый адрес' );
    window.setTimeout( function() { document.getElementById( strId ).focus(); }, 0 );
    return;
  }

/*
  strId = 'id7204'
  strValue = document.getElementById( strId ).value;
  if ( strValue === '' )
  {
    alert( 'Введите дату' );
    window.setTimeout( function() { document.getElementById( strId ).focus(); }, 0 );
    return;
  }
  else if ( isNaN( strValue.substring( 0, 4 ) ) || isNaN( strValue.substring( 5, 7 ) ) || isNaN( strValue.substring( 8, 10 ) ) )
  {
    alert( 'Введите дату' );
    window.setTimeout( function() { document.getElementById( strId ).focus(); }, 0 );
    return;
  }
  else
  {
    if (
      parseInt( strValue.substring( 0, 4 ), 10 ) < 1900  || parseInt( strValue.substring( 0, 40 ), 10 ) > 2050 ||
      parseInt( strValue.substring( 5, 7 ), 10 ) > 12 || parseInt( strValue.substring( 8, 10 ), 10 ) > 31 ||
      parseInt( strValue.substring( 5, 7 ), 10 ) == 0 || parseInt( strValue.substring( 8, 10 ), 10 ) == 0 ||
      parseInt( strValue.substring( 0, 4 ), 10 ) == 0
    )
    {
      alert( 'Некорректная дата' );
      window.setTimeout( function() { document.getElementById( strId ).focus(); }, 0 );
      return;
    }
  }
*/
  document.getElementById( 'idMainAdd' ).submit();
}

/*----------------------------------------------------------------------------------------------------------*/

function fncClientSearch()
{
  var strId = '';
  var strValue = '';

  if ( document.getElementById( 'idClientNameLast' ).value == '' && document.getElementById( 'idClientNameFirst' ).value == '' && document.getElementById( 'idClientEmail' ).value == '' )
  {
    alert( 'Хотя бы одно поле должно быть заполнено' );
    window.setTimeout( function() { document.getElementById( strId ).focus(); }, 0 );
    return;
  }

  document.getElementById( 'idMainSearch' ).submit();
}

/*----------------------------------------------------------------------------------------------------------*/

function fncOnLoadClientContacted()
{
  strId01 = 'idPackage01'
  strId02 = 'idPackage02'

  strId03 = 'idPaymentMethod01'
  strId04 = 'idPaymentMethod02'
  strId05 = 'idPaymentMethod03'
  strId06 = 'idPaymentMethod04'
  strId07 = 'idPaymentMethod05'

  strChecked01 = document.getElementById( strId01 ).checked;
  strChecked02 = document.getElementById( strId02 ).checked;
  strChecked03 = document.getElementById( strId03 ).checked;
  strChecked04 = document.getElementById( strId04 ).checked;
  strChecked05 = document.getElementById( strId05 ).checked;
  strChecked06 = document.getElementById( strId06 ).checked;
  strChecked07 = document.getElementById( strId07 ).checked;

  if ( ( ! strChecked01 ) && ( ! strChecked02  ) )
  {
    alert( 'Выберите пакет' );
    window.setTimeout( function() { document.getElementById( strId01 ).focus(); }, 0 );
    return;
  }

  if ( ( ! strChecked03 ) && ( ! strChecked04 ) && ( ! strChecked05 ) && ( ! strChecked06 ) && ( ! strChecked07 ) && ( ! strChecked08 ) )
  {
    alert( 'Выберите метод оплаты' );
    window.setTimeout( function() { document.getElementById( strId01 ).focus(); }, 0 );
    return;
  }

  document.getElementById( 'idMain' ).submit();
}

/*----------------------------------------------------------------------------------------------------------*/
