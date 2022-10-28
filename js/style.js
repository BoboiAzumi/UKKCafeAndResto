window.setTimeout("waktu()", 1000);
function waktu() {
  var element = document.getElementById("jamKunjung");
  if(typeof(element) != 'undefined' && element != null){
    var tanggal = new Date();
    setTimeout("waktu()", 1000);
    document.getElementById("jamKunjung").innerHTML =
    tanggal.getHours() +
    ":" +
    tanggal.getMinutes() +
    ":" +
    tanggal.getSeconds();
  }
}

$(document).ready(function () {
  $(".money").simpleMoneyFormat();

  $(document).on("keypress", ".angkaSemua", function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      return false;
    }
  });

  /*
  setTimeout(function () {
    $(".alert").alert("close");
  }, 3000);
  */
});
