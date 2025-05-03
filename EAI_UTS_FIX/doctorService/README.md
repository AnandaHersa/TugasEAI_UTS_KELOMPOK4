# DoctorService

## Deskripsi
Layanan ini bertanggung jawab untuk menyediakan data dokter. Layanan ini memiliki dua endpoint utama:
- **GET /doctors**: Untuk mengambil data dokter.
- **POST /doctors**: Untuk menambah data dokter baru.

## Endpoint

### 1. **GET /doctors**
- **Deskripsi**: Mengambil data dokter dalam format JSON.
- **Response**:
  ```json
  [
    {
      "id": 1,
      "name": "Dr. Emily Williams",
      "specialty": "Cardiologist",
      "contact": "9876543210"
    },
    {
      "id": 2,
      "name": "Dr. Michael Johnson",
      "specialty": "Neurologist",
      "contact": "1234432110"
    }
  ]
