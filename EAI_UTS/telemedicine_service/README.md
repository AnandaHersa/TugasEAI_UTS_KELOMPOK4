# Telemedicine Service

Service ini berfungsi sebagai **pengirim data** (consumer) ke Public Health Service.

## Endpoint yang digunakan

Tidak memiliki endpoint publik. Bertugas sebagai client/consumer yang mengirim data pasien.

## Alur Kerja

1. User mengisi form pasien.
2. Data dikirim ke Public Health Service melalui HTTP POST menggunakan `cURL`.

## Contoh JSON yang dikirim
```json
{
  "nama": "Budi",
  "gejala": "Demam, Batuk",
  "diagnosa": "Flu",
  "resep": "Paracetamol"
}
