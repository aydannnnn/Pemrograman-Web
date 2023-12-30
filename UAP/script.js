let barangArray = [
  { code: "001", nama: "Barang A", harga: 10000 },
  { code: "002", nama: "Barang B", harga: 20000 },
  { code: "003", nama: "Barang C", harga: 30000 },
];

function hitungTotalHarga() {
  const codeInput = document.getElementById("code").value;
  const quantityInput = parseInt(document.getElementById("quantity").value);

  if (codeInput && !isNaN(quantityInput) && quantityInput > 0) {
    const barangTerpilih = barangArray.find(
      (barang) => barang.code === codeInput
    );

    if (barangTerpilih) {
      const totalHarga = hitungHargaBarang(barangTerpilih.harga, quantityInput);
      alert("Total Harga untuk " + barangTerpilih.nama + ": " + totalHarga);
    } else {
      alert("Barang dengan kode " + codeInput + " tidak ditemukan.");
    }
  } else {
    alert("Mohon isi kode barang dan jumlah barang dengan benar.");
  }
}

function hitungHargaBarang(hargaSatuan, quantity) {
  return hargaSatuan * quantity;
}

function updateTable() {
  const tableBody = document.getElementById("barangTableBody");
  tableBody.innerHTML = "";

  barangArray.forEach((barang) => {
    const row = tableBody.insertRow();
    const cell1 = row.insertCell(0);
    const cell2 = row.insertCell(1);
    const cell3 = row.insertCell(2);

    cell1.innerHTML = barang.code;
    cell2.innerHTML = barang.nama;
    cell3.innerHTML = barang.harga;
  });
}

updateTable();