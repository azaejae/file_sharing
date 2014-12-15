/**
 * Created by Azaejae on 14-Dec-14.
 */
function cekSesi()
{
    if(sessionStorage.getItem('access_key')==null)
    {
        $(location).attr('href','login.php');
    }
    //alert(sessionStorage.access_key);
}

function logout()
{
        alert('Anda Berhasil Logout');
        sessionStorage.clear();
        $(location).attr('href','login.php');
}