<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Laporan Telemedicine</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #f5f7fa;
      font-family: 'Poppins', sans-serif;
      color: #333;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    form {
      background-color: #ffffff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      max-width: 1000px;
      width: 100%;
    }

    h1 {
      text-align: center;
      color: #0077b6;
      margin-bottom: 30px;
      font-weight: 600;
    }

    label {
      font-weight: 500;
      display: block;
      margin-bottom: 6px;
      color: #555;
    }

    input, textarea {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      background-color: #f1f1f1;
      border: 1px solid #ccc;
      border-radius: 6px;
      color: #333;
      font-size: 14px;
    }

    input:focus, textarea:focus {
      border-color: #0077b6;
      background-color: #fff;
      outline: none;
    }

    button {
      width: 100%;
      padding: 14px;
      background-color: #0077b6;
      border: none;
      border-radius: 8px;
      color: #fff;
      font-weight: 600;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #005f8f;
    }

    /* Pop-up notification */
    #popup {
      position: fixed;
      top: 20px;
      right: 20px;
      background-color: #4caf50;
      color: white;
      padding: 16px 24px;
      border-radius: 8px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.2);
      display: none;
      z-index: 9999;
      animation: fadeInOut 4s ease forwards;
      font-size: 14px;
    }

    @keyframes fadeInOut {
      0% { opacity: 0; transform: translateY(-20px); }
      10% { opacity: 1; transform: translateY(0); }
      90% { opacity: 1; }
      100% { opacity: 0; transform: translateY(-20px); }
    }
  </style>
</head>
<body>

  <div id="popup"></div>

  <form id="telemedicineForm">
    <h1>Form Laporan Telemedicine</h1>

    <label for="nama">Nama Pasien</label>
    <input type="text" id="nama" name="nama" required>

    <label for="gejala">Gejala</label>
    <textarea id="gejala" name="gejala" rows="3" required></textarea>

    <label for="diagnosa">Diagnosa</label>
    <input type="text" id="diagnosa" name="diagnosa" required>

    <label for="resep">Resep</label>
    <textarea id="resep" name="resep" rows="2" required></textarea>

    <button type="submit">Kirim ke Public Health</button>
  </form>

  <script>
    const form = document.getElementById("telemedicineForm");
    const popup = document.getElementById("popup");

    function showPopup(message, isSuccess = true) {
      popup.textContent = message;
      popup.style.backgroundColor = isSuccess ? "#4caf50" : "#f44336"; // hijau kalau sukses, merah kalau error
      popup.style.display = "block";
      setTimeout(() => {
        popup.style.display = "none";
      }, 4000);
    }

    form.addEventListener("submit", function(e) {
      e.preventDefault();

      const formData = new FormData(form);

      fetch("send_data.php", {
        method: "POST",
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.status === "success") {
          showPopup(data.message, true);
          form.reset();
        } else {
          showPopup(data.message || "❌ Gagal mengirim data.", false);
        }
      })
      .catch(error => {
        console.error("Error:", error);
        showPopup("❌ Terjadi kesalahan saat mengirim ke server.", false);
      });
    });
  </script>

</body>
</html>
