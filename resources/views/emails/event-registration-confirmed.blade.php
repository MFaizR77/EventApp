<x-mail::message>
# Halo {{ $user->name }},

Terima kasih telah mendaftar untuk mengikuti event **{{ $event->title }}**.

**Rincian Event:**
* **Nama Event:** {{ $event->title }}
* **Tanggal & Waktu:** {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y - H:i') }} WIB

*Catatan: Terima kasih telah mendaftar event ini.*

Sampai jumpa di lokasi acara!

Salam hangat,<br>
**Tim EventApp**
</x-mail::message>
