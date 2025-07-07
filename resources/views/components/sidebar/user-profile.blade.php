<div class="p-6 flex flex-col items-center bg-white border-b border-green-100">
    <div class="relative group">
        <div class="w-24 h-24 rounded-full bg-green-600 flex items-center justify-center text-white text-3xl font-bold shadow-md overflow-hidden">
            @if(Auth::user()->foto_toko)
                <img src="{{ asset('storage/' . Auth::user()->foto_toko) }}" alt="Foto Profil" class="w-full h-full object-cover">
            @else
                {{ substr(Auth::user()->nama, 0, 1) }}
            @endif
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 rounded-full flex items-center justify-center transition-all duration-300 cursor-pointer opacity-0 group-hover:opacity-100">
            <div class="text-white text-xs font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Ubah Foto</span>
            </div>
        </div>
    </div>
    <h2 class="text-xl font-bold mt-4">{{ Auth::user()->nama }}</h2>
    <p class="text-gray-500 text-sm">{{ ucfirst(Auth::user()->role) }}</p>
</div>

<div id="modal-crop-foto" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full relative">
        <button onclick="closeCropModal()" class="absolute top-2 right-2 text-gray-400 hover:text-red-500">&times;</button>
        <h2 class="text-lg font-bold mb-4">Ubah Foto Profil</h2>
        <form id="form-crop-foto" method="POST" action="{{ route('profile.updatePhoto') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" accept="image/*" id="input-foto-crop" class="mb-4" required />
            <div class="mb-4">
                <img id="cropper-preview" class="w-48 h-48 mx-auto rounded-full object-cover bg-gray-100" style="max-height:200px;" />
            </div>
            <input type="hidden" name="cropped_foto_toko" id="cropped_foto_toko" />
            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 font-semibold">Simpan Perubahan</button>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" />
<script>
let cropper = null;
const modal = document.getElementById('modal-crop-foto');
const inputFoto = document.getElementById('input-foto-crop');
const preview = document.getElementById('cropper-preview');
const croppedInput = document.getElementById('cropped_foto_toko');

function openCropModal() {
    modal.classList.remove('hidden');
}
function closeCropModal() {
    modal.classList.add('hidden');
    if (cropper) { cropper.destroy(); cropper = null; }
    preview.src = '';
    inputFoto.value = '';
}
document.querySelector('.group').addEventListener('click', function() {
    openCropModal();
});
inputFoto.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(ev) {
        preview.src = ev.target.result;
        if (cropper) cropper.destroy();
        cropper = new Cropper(preview, {
            aspectRatio: 1,
            viewMode: 1,
            autoCropArea: 1,
            movable: false,
            cropBoxResizable: true
        });
    };
    reader.readAsDataURL(file);
});
document.getElementById('form-crop-foto').addEventListener('submit', function(e) {
    if (cropper) {
        const canvas = cropper.getCroppedCanvas({ width: 300, height: 300 });
        croppedInput.value = canvas.toDataURL('image/jpeg');
    }
});
</script> 