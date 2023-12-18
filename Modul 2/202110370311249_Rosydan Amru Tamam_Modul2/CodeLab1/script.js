function jumlahkan() {
  var bilangan1 = parseFloat(document.getElementById("bilangan1").value);
  var bilangan2 = parseFloat(document.getElementById("bilangan2").value);

  if (isNaN(bilangan1) || isNaN(bilangan2)) {
    alert("Masukkan angka yang valid pada kedua kolom.");
  } else {
    var hasil = bilangan1 + bilangan2;
    alert("Hasil penjumlahan = " + hasil);
  }
}

function ulang() {
  document.getElementById("bilangan1").value = "";
  document.getElementById("bilangan2").value = "";
}
