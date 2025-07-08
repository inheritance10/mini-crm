# 🧠 Mini CRM API - Laravel + PostgreSQL + JWT

Bu proje, bir çalışanın görevlerini takip edebileceğiniz, RESTful yapıda hazırlanmış JWT tabanlı bir mini CRM API servisidir. Laravel'in servis-repository mimarisiyle geliştirilmiştir ve PostgreSQL veritabanı kullanır.

## 🚀 Özellikler

- JWT tabanlı kimlik doğrulama
- Çalışan (Employee) CRUD işlemleri
- Görev (Task) atama, güncelleme, listeleme, tamamlama
- Servis ve repository yapısı
- FormRequest ile doğrulama
- Global exception handler ile anlaşılır hata mesajları
- Seeder ile demo kullanıcı ve veriler
- Postman Collection desteği

---

## 🧱 Kullanılan Teknolojiler

| Teknoloji            | Açıklama                  |
| -------------------- | ------------------------- |
| Laravel 10           | PHP Framework             |
| PostgreSQL           | Veritabanı                |
| tymon/jwt-auth       | JWT Authentication paketi |
| Repository & Service | Katmanlı mimari           |
| FormRequest          | Validation yapısı         |
| Exception Handler    | Özel hata yönetimi        |

---

## 🧬 Proje Mimarisi

```
app/
├── Http/
│   ├── Controllers/     # API endpoint'leri
│   ├── Requests/        # FormRequest doğrulama sınıfları
│
├── Repositories/
│   └── Eloquent/        # Eloquent implementasyonları
│
├── Services/            # İş mantığının yer aldığı servis katmanı
│
├── Exceptions/          # Global hata yakalayıcılar
```

> Bu yapı sayesinde controller’lar sadece yönlendirici rolü üstlenir, veritabanı işlemleri repository'lerde, iş mantığı servis katmanında izole şekilde yer alır.

---

## ⚙️ Kurulum Adımları

```bash
# 1. Repoyu klonlayın
git clone <repo-url>
cd mini-crm

# 2. Paketleri kurun
composer install

# 3. Ortam dosyası oluşturun
cp .env.example .env

# 4. Uygulama anahtarını oluşturun
php artisan key:generate

# 5. .env dosyasına PostgreSQL bilgilerinizi girin
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=mini_crm
DB_USERNAME=postgres
DB_PASSWORD=postgres

# 6. JWT secret oluşturun
php artisan jwt:secret

# 7. Veritabanı migrasyonu ve seeding
php artisan migrate:fresh --seed

# 8. Projeyi başlatın
php artisan serve
```

---

## 🔑 Demo Kullanıcı

| Email             | Şifre    |
| ----------------- | -------- |
| admin@example.com | password |

---

## 🧪 API Uç Noktaları

### 🔐 Auth

| Yöntem | Endpoint           | Açıklama        |
| ------ | ------------------ | --------------- |
| POST   | /api/auth/register | Kullanıcı kaydı |
| POST   | /api/auth/login    | Giriş yap       |
| GET    | /api/auth/me       | Oturum bilgisi  |
| POST   | /api/auth/logout   | Çıkış yap       |
| POST   | /api/auth/refresh  | Token yenile    |

### 👤 Employee (Auth gerekir)

| Yöntem | Endpoint            | Açıklama              |
| ------ | ------------------- | --------------------- |
| GET    | /api/employees      | Tüm çalışanları getir |
| POST   | /api/employees      | Yeni çalışan ekle     |
| GET    | /api/employees/{id} | Belirli çalışan getir |
| PUT    | /api/employees/{id} | Çalışan güncelle      |
| DELETE | /api/employees/{id} | Çalışan sil           |

### 📝 Task (Auth gerekir)

| Yöntem | Endpoint                          | Açıklama                          |
| ------ | --------------------------------- | --------------------------------- |
| POST   | /api/tasks                        | Yeni görev oluştur                |
| PUT    | /api/tasks/{id}                   | Görev güncelle                    |
| PATCH  | /api/tasks/{id}/complete          | Görevi tamamlandı olarak işaretle |
| GET    | /api/employees/{employeeId}/tasks | Çalışana ait görevleri getir      |

---

## 🌱 Seeder Verileri

- 1 adet demo kullanıcı (`admin@example.com` / `password`)
- 5 adet örnek çalışan
- Her çalışan için 2-3 adet görev atanmış şekilde

---

## ⚠️ Global Hata Mesajları

| Durum Kodu | Mesaj                                 |
| ---------- | ------------------------------------- |
| 401        | Giriş yapılmamış veya token geçersiz  |
| 403        | Bu işlemi yapmaya yetkiniz yok        |
| 404        | Kayıt bulunamadı                      |
| 422        | Doğrulama hatası                      |
| 500        | Sunucu hatası - beklenmeyen bir durum |

---

## 🧪 Postman

Tüm API uç noktalarını test edebilmeniz için `.postman_collection.json` dosyası da mevcuttur.

---

## 📄 Lisans

Bu proje, yalnızca değerlendirme/test amaçlı hazırlanmıştır. Gerçek projelerde production-level güvenlik ve performans kontrolleri yapılması önerilir.

---

## 👨‍💻 Hazırlayan

Bu proje, Laravel'in servis mimarisi ve JWT ile kimlik doğrulama süreçlerini kavramsal ve pratik olarak deneyimlemek amacıyla hazırlanmıştır.

---
