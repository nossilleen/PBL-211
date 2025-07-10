<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transaksi extends Model
{
    use HasFactory;
    
    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'transaksi';
    
    /**
     * Primary key tabel.
     *
     * @var string
     */
    protected $primaryKey = 'transaksi_id';
    
    /**
     * Atribut yang dapat diisi (mass assignable).
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'lokasi_id',
        'produk_id',
        'jumlah_produk',
        'harga_total',
        'poin_used',
        'tanggal',
        'status',
        'pay_method',
        'bukti_transfer',
        'estimasi_hari'
    ];
    
    /**
     * Atribut yang harus dikonversi menjadi tipe data tertentu.
     *
     * @var array
     */
    protected $casts = [
        'tanggal' => 'datetime',
        'harga_total' => 'integer',
        'jumlah_produk' => 'integer',
        'poin_used' => 'integer',
        'estimasi_hari' => 'integer',
    ];
    
    /**
     * Atribut yang harus dimutasi (diproses).
     *
     * @var array
     */
    protected $appends = [
        'formatted_tanggal',
        'status_label',
        'sisa_hari',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id', 'lokasi_id');
    }
    
    public function produk()
    {
        // Sertakan produk yang sudah di-soft-delete agar transaksi tetap dapat diakses
        return $this->belongsTo(Produk::class, 'produk_id', 'produk_id')->withTrashed();
    }

    /**
     * Get formatted tanggal.
     *
     * @return string
     */
    public function getFormattedTanggalAttribute()
    {
        return Carbon::parse($this->tanggal)->format('d M Y');
    }

    /**
     * Get status label dengan format yang lebih baik.
     *
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        $statusLabels = [
            'belum dibayar' => 'Belum Dibayar',
            'menunggu konfirmasi' => 'Menunggu Konfirmasi',
            'sedang dikirim' => 'Sedang Dikirim',
            'selesai' => 'Selesai',
            'dibatalkan' => 'Dibatalkan'
        ];

        return $statusLabels[$this->status] ?? ucwords($this->status);
    }

    /**
     * Hitung sisa hari berdasarkan estimasi_hari dan tanggal transaksi
     * Jika estimasi tidak ada, kembalikan null.
     * @return int|null
     */
    public function getSisaHariAttribute()
    {
        if (is_null($this->estimasi_hari)) {
            return null;
        }

        try {
            $daysPassed = Carbon::parse($this->tanggal)->diffInDays(now());
            $remaining = (int) $this->estimasi_hari - $daysPassed;
            return $remaining < 0 ? 0 : $remaining;
        } catch (\Exception $e) {
            return $this->estimasi_hari;
        }
    }

    /**
     * Cek apakah transaksi ini menggunakan metode pembayaran poin.
     *
     * @return bool
     */
    public function isUsingPoints()
    {
        return $this->pay_method === 'poin';
    }

    /**
     * Cek apakah transaksi ini sedang aktif (belum selesai atau dibatalkan).
     *
     * @return bool
     */
    public function isActive()
    {
        return !in_array($this->status, ['selesai', 'dibatalkan']);
    }

    /**
     * Cek apakah transaksi ini dapat diupload bukti transfer.
     *
     * @return bool
     */
    public function canUploadPaymentProof()
    {
        return $this->status === 'belum dibayar' && $this->pay_method === 'transfer';
    }

    /**
     * Cek apakah transaksi ini dapat dibatalkan.
     *
     * @return bool
     */
    public function canBeCancelled()
    {
        return $this->status === 'belum dibayar';
    }

    /**
     * Cek apakah transaksi ini dapat ditandai selesai oleh pembeli.
     *
     * @return bool
     */
    public function canBeCompleted()
    {
        return $this->status === 'sedang dikirim';
    }
} 