function doDate() {
    var str = "";

    var months = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "December");

    var now = new Date();

    str += now.getDate() + " " + months[now.getMonth()] + " " + now.getFullYear() + " " + now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
    document.getElementById("hariini").innerHTML = str;
}

setInterval(doDate, 1000);

var tanggal = document.getElementById("tanggal");
tanggal.addEventListener("change", function () {
    document.getElementById("tanggalshift").innerHTML = tanggal.value;
})