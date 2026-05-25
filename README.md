# Corrieri Backend

Backend Laravel per app di gestione punti di ritiro BRT, DHL e SDA.

---

## Setup

### 1. Crea il database MySQL
```sql
CREATE DATABASE corrieri CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'corrieri'@'localhost' IDENTIFIED BY 'C0rr13r1!2024Db#';
GRANT ALL PRIVILEGES ON corrieri.* TO 'corrieri'@'localhost';
FLUSH PRIVILEGES;
```

### 2. Installa le dipendenze
```bash
composer install
```

### 3. Copia e configura l'env (già pronto)
Il file `.env` è già configurato con:
- DB: `corrieri` / utente: `corrieri` / password: `C0rr13r1!2024Db#`
- JWT secret già generato
- Admin API key: `admin_corr13r1_s3cr3t_k3y_2024`

### 4. Esegui le migration e i seeder
```bash
php artisan migrate --seed
```

### 5. Avvia il server
```bash
php artisan serve
```
Il server sarà disponibile su `http://localhost:8000`

---

## API Reference

Tutte le rotte sono sotto il prefisso `/api`.

### Autenticazione

| Metodo | Endpoint | Auth | Descrizione |
|--------|----------|------|-------------|
| POST | `/api/auth/register` | No | Registrazione |
| POST | `/api/auth/login` | No | Login |
| POST | `/api/auth/logout` | JWT | Logout |
| POST | `/api/auth/refresh` | JWT | Rinnovo token |
| GET  | `/api/auth/me` | JWT | Dati utente corrente |

**Register** – body:
```json
{
  "name": "Maria",
  "surname": "Rossi",
  "email": "maria@esempio.it",
  "password": "password123",
  "password_confirmation": "password123",
  "phone": "333 1234567",
  "address": "Via Roma 1, Roma"
}
```

**Login** – body:
```json
{ "email": "maria@esempio.it", "password": "password123" }
```

**Header JWT** (tutte le rotte protette):
```
Authorization: Bearer <token>
```

---

### Punti di Ritiro

| Metodo | Endpoint | Auth | Descrizione |
|--------|----------|------|-------------|
| GET | `/api/pickup-points` | No | Lista punti (filtrabili) |
| GET | `/api/pickup-points/{id}` | No | Dettaglio punto |

**Filtri disponibili** su `GET /api/pickup-points`:
- `?courier=BRT` (BRT, DHL, SDA)
- `?city=Roma`
- `?search=tiburtina`

---

### Pacchi

| Metodo | Endpoint | Auth | Descrizione |
|--------|----------|------|-------------|
| POST | `/api/packages/check` | JWT | Controlla e ritira un pacco |
| GET  | `/api/my-packages` | JWT | Lista pacchi ritirati dall'utente |

**Check pacco** – body:
```json
{
  "tracking_code": "ABC1234DEF",
  "pickup_point_id": 1
}
```

**Errori possibili:**
- `404` Il pacco non esiste
- `422` Il pacco è già stato ritirato il GG/MM/AAAA alle HH:MM
- `422` Il pacco è scaduto
- `422` Il pacco è assegnato a un punto di ritiro diverso: [nome punto]

---

### Profilo Utente

| Metodo | Endpoint | Auth | Descrizione |
|--------|----------|------|-------------|
| GET | `/api/profile` | JWT | Dettaglio profilo |
| PUT | `/api/profile` | JWT | Modifica profilo |

**Update profilo** – body (tutti i campi opzionali):
```json
{
  "name": "Maria",
  "surname": "Verdi",
  "phone": "333 9876543",
  "address": "Via Nuova 10, Roma",
  "password": "nuovaPassword123",
  "password_confirmation": "nuovaPassword123"
}
```

---

### Preferiti

| Metodo | Endpoint | Auth | Descrizione |
|--------|----------|------|-------------|
| GET    | `/api/favorites` | JWT | Lista punti preferiti |
| POST   | `/api/favorites` | JWT | Aggiungi preferito |
| DELETE | `/api/favorites/{pickup_point_id}` | JWT | Rimuovi preferito |

**Aggiungi preferito** – body:
```json
{ "pickup_point_id": 3 }
```

---

### API Admin – Crea Pacco (servizio interno)

| Metodo | Endpoint | Header | Descrizione |
|--------|----------|--------|-------------|
| POST | `/api/admin/packages` | `X-Admin-Key` | Crea un pacco da ritirare |

**Header richiesto:**
```
X-Admin-Key: admin_corr13r1_s3cr3t_k3y_2024
```

**Body:**
```json
{
  "recipient_name": "Marco",
  "recipient_surname": "Bianchi",
  "pickup_point_id": 5
}
```

**Risposta:**
```json
{
  "message": "Pacco creato con successo.",
  "tracking_code": "XYZ1234ABC",
  "data": { ... }
}
```

---

## Utenti di test (seeder)

| Nome | Email | Password |
|------|-------|----------|
| Giulia Bianchi | giulia.bianchi@gmail.com | Test1234! |
| Luca Ferrari   | luca.ferrari@gmail.com   | Test1234! |

---

## Database

- **45 punti di ritiro** in tutta Italia (20+ a Roma e nel Lazio)
- **95 pacchi** già inseriti (80 pending, 15 expired)
- **1 utente** di test

### Struttura tabelle

| Tabella | Descrizione |
|---------|-------------|
| `users` | Utenti registrati |
| `pickup_points` | Punti di ritiro BRT/DHL/SDA |
| `packages` | Pacchi da ritirare |
| `favorites` | Punti preferiti per utente |
