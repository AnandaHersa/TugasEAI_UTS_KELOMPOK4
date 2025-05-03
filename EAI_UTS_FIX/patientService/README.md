# PatientService

## Deskripsi
Layanan ini bertanggung jawab untuk menyediakan data pasien. Layanan ini memiliki dua endpoint utama:
- **GET /patients**: Untuk mengambil data pasien.
- **POST /patients**: Untuk menambah data pasien baru.

## Endpoint

### 1. **GET /patients**
- **Deskripsi**: Mengambil data pasien dalam format JSON.
- **Response**:
  ```json
  [
    {
      "id": 1,
      "name": "John Doe",
      "age": 45,
      "gender": "Male",
      "contact": "1234567890"
    },
    {
      "id": 2,
      "name": "Jane Smith",
      "age": 38,
      "gender": "Female",
      "contact": "0987654321"
    }
  ]
