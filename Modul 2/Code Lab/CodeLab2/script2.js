document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("registrationForm");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const nama = document.getElementById("nama").value.trim();
    const email = document.getElementById("email").value.trim();
    const alamat = document.getElementById("alamat").value.trim();

    if (!nama || !email || !alamat) {
      alert("Anda harus mengisi data dengan lengkap !");
    } else {
      alert("Pendaftaran berhasil!");
    }
  });
});
