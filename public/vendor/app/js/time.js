var tanggal = document.getElementById("tanggal");
tanggal.addEventListener("change", function () {
    document.getElementById("tanggalshift").innerHTML = tanggal.value;
})