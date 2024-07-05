@extends('layouts.dashboard')
@section('title', 'Ganti Password')
@section('content')
<div class="w-3/2 bg-white rounded-lg p-10 shadow-lg">
        <div class="text-2xl font-bold mb-6">Password</div>
        <form>
            <div class="mb-4">
                <label class="block text-gray-700">New Password</label>
                <input type="password" disabled name="password_new"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Confirm New Password</label>
                <input type="password" disabled name="password_confirm"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500">
            </div>
            <button type="submit" disabled class="px-4 py-2 bg-red-200 text-white font-bold rounded-lg hover:bg-red-200 cursor-not-allowed">Change
                Password</button>
            <button type="button" id="open_key"
                class="px-4 py-2 bg-yellow-300 text-white font-bold rounded-lg hover:bg-yellow-600">Open</button>
        </form>
    </div>
    <div class="hidden" id="modal">
        <div class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                <h2 class="text-xl font-bold mb-4">Input Password</h2>
                <div class="relative mb-4">
                    <input type="password" id="password" placeholder="Enter your password"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    <button type="button" onclick="togglePassword()"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
                        <i class="bi bi-eye" id="toggleIcon"></i>
                    </button>
                </div>
                <div class="flex justify-end">
                    <button
                    id="close"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg mr-2 hover:bg-gray-400 focus:outline-none">Batal</button>
                    <button
                        class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 focus:outline-none">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const button = document.getElementById('open_key');
        const modal = document.getElementById('modal');
        const close = document.getElementById('close');
        button.addEventListener('click', function() {
            modal.classList.remove('hidden')
            modal.classList.add('block')
        });

        close.addEventListener('click', function(){
            modal.classList.add('hidden');
        });


        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            }
        }








        function confirmDelete() {
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: 'Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-post').submit();
                }
            });
        }

        @if (session('success'))
            showMessageSuccess('{{ session('success') }}');
        @endif

        function showMessageSuccess(message) {
            Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire({
                icon: 'success',
                title: 'Behasil !!!',
                text: message,
            });
        }
    </script>
@endsection
