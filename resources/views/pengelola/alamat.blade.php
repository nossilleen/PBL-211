@extends('pengelola.layout')

@section('title', 'Alamat - Pengelola EcoZense')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Alamat</h1>
        <p class="text-gray-600 mt-1">Kelola data alamat dan lokasi bank sampah</p>
    </div>
    
    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    
    <style>
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #3cb371;
            box-shadow: 0 0 0 2px rgba(60, 179, 113, 0.2);
        }
    </style>
    
    <div class="bg-white rounded-lg shadow p-6">
        <div class="form-group">
            <label>Nama Jalan</label>
            <input type="text" placeholder="Entered text" />
        </div>
        
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" placeholder="Entered text" />
        </div>
        
        <div class="form-group">
            <label>Kelurahan</label>
            <input type="text" placeholder="Entered text" />
        </div>
        
        <div class="form-group">
            <label>Kecamatan</label>
            <input type="text" placeholder="Entered text" />
        </div>
        
        <div class="form-group">
            <label>Pin Lokasi Di Peta :</label>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0584375839!2d104.04588166492947!3d1.1187259992115102!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98921856ddfab%3A0xf9d9fc65ca00c9d!2sPoliteknik%20Negeri%20Batam!5e0!3m2!1sen!2sid!4v1646209525342!5s!5m2!1sen!2sid"
                width="100%"
                height="400"
                style="border: 0; border-radius: 8px;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
@endsection 