# AppointmentService

## Deskripsi
Layanan ini bertanggung jawab untuk mengelola janji temu antara pasien dan dokter. Layanan ini menyediakan dua endpoint:
- **GET /appointments**: Untuk mengambil daftar janji temu.
- **POST /appointments**: Untuk membuat janji temu baru.

## Endpoint

### 1. **GET /appointments**
- **Deskripsi**: Mengambil semua data janji temu dalam format JSON.
- **Response**:
  ```json
  [
    {
      "appointment_id": 1,
      "patient_name": "John Doe",
      "doctor_name": "Dr. Michael Johnson",
      "appointment_date": "2025-06-15T10:00:00"
    },
    {
      "appointment_id": 2,
      "patient_name": "Alice Brown",
      "doctor_name": "Dr. Emily Williams",
      "appointment_date": "2025-06-16T14:00:00"
    }
  ]
