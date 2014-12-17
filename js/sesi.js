/**
 * Created by Azaejae on 13-Dec-14.
 */

function sesiPengajar()
{
    //cek sesi
    if(sessionStorage.getItem('token')==null)
    {

        $('#before_login').show();
        $(location).attr('href','login.php');
    }
    else
    {
        $('#after_login').show();
    }
}

function showMenu()
{
    if(sessionStorage.getItem('token')==null)
    {

        $('#before_login').show();
    }
    else
    {
        $('#after_login').show();
    }
}

function logout()
{
    //logout
    sessionStorage.clear();
    alert('Anda Berhasil Logout');
    $(location).attr('href','login.php');
}
