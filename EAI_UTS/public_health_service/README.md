# Public Health Monitoring Service API Documentation

## Deskripsi
Layanan ini digunakan untuk menerima data pasien dari Telemedicine Service dan menyimpan data tersebut secara lokal. Berperan sebagai provider dan (opsional) consumer.

---

## Endpoint

### 1. POST /api.php
Menerima data pasien dari layanan Telemedicine.

- URL: http://localhost/public_health_service/api.php
- Method: POST
- Content-Type: application/json
- Body (contoh request):

```json
{
  "nama": "Andi",
  "umur": 30,
  "gejala": "Demam, batuk",
  "diagnosa": "Influenza"
}
