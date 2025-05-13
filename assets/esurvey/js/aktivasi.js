	

//-------------------------- author badge -------------------------------------------------
var author = '<div class="footer navbar-fixed-bottom text-center"><p>LPM &copy; 2020 Depelover By <a href="https://facebook.com/daskimt">Abu Syahlaa</a> &nbsp;&bull;&nbsp; v.1.0.0</p></div>';
  $("body").append(author);

//--------------------------- status internet --------------------------------
function updateOnlineStatus() {
    document.getElementById("status").innerHTML = "<i class='fa fa-spinner fa-pulse'></i> Online";
}
function updateOfflineStatus() {
    document.getElementById("status").innerHTML = "<i class='fa fa-spinner'></i> Offline";
}
window.addEventListener('online', updateOnlineStatus);
window.addEventListener('offline', updateOfflineStatus); 
