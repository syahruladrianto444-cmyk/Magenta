@extends('layouts.app')

@section('title', 'Verifikasi Login - MAGENTA Admin')

@section('content')
    <div class="min-h-screen flex items-center justify-center dark:bg-dark-950 bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8" data-aos="fade-up">
            {{-- Header --}}
            <div class="text-center">
                <div
                    class="w-20 h-20 bg-gradient-primary rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-primary-500/30">
                    <i data-lucide="shield-check" class="w-10 h-10 text-white"></i>
                </div>
                <h2 class="text-3xl font-bold dark:text-white text-dark-900">
                    Verifikasi <span class="text-gradient">Login</span>
                </h2>
                <p class="mt-3 dark:text-dark-400 text-dark-600">
                    Kami mendeteksi login dari perangkat baru. Kode verifikasi telah dikirim ke email Anda.
                </p>
            </div>

            {{-- Alert Messages --}}
            @if(session('success'))
                <div class="bg-green-500/10 border border-green-500/30 rounded-xl p-4 text-center">
                    <p class="text-green-500 text-sm font-medium">{{ session('success') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-500/10 border border-red-500/30 rounded-xl p-4 text-center">
                    @foreach($errors->all() as $error)
                        <p class="text-red-500 text-sm font-medium">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            {{-- Debug Mode: Show OTP directly (only visible when APP_DEBUG=true) --}}
            @if(config('app.debug') && session('otp_code_debug'))
                <div class="bg-yellow-500/10 border-2 border-yellow-500/50 rounded-xl p-4 text-center">
                    <p class="text-yellow-600 dark:text-yellow-400 text-xs font-semibold mb-1">🔧 MODE DEVELOPMENT</p>
                    <p class="text-yellow-700 dark:text-yellow-300 text-sm mb-2">Kode OTP Anda (tidak tampil di production):</p>
                    <p class="text-3xl font-bold tracking-[8px] text-yellow-600 dark:text-yellow-400 font-mono">
                        {{ session('otp_code_debug') }}</p>
                </div>
            @endif

            {{-- OTP Form --}}
            <div class="dark:bg-dark-800 bg-white rounded-2xl shadow-xl p-8 dark:border-dark-700 border-gray-200 border">
                <form method="POST" action="{{ route('admin.otp.verify') }}" id="otpForm">
                    @csrf

                    {{-- Email Display --}}
                    <div class="text-center mb-6">
                        <p class="dark:text-dark-400 text-dark-600 text-sm">Kode dikirim ke:</p>
                        <p class="dark:text-white text-dark-900 font-semibold">{{ session('otp_email', '***@***.com') }}</p>
                    </div>

                    {{-- OTP Input --}}
                    <div class="flex justify-center gap-3 mb-6" x-data="otpInput()">
                        @for($i = 0; $i < 6; $i++)
                            <input type="text" maxlength="1"
                                class="w-12 h-14 text-center text-xl font-bold rounded-xl dark:bg-dark-700 bg-gray-50 dark:text-white text-dark-900 dark:border-dark-600 border-gray-300 border focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 outline-none transition-all"
                                x-ref="otp{{ $i }}" @input="handleInput($event, {{ $i }})"
                                @keydown.backspace="handleBackspace($event, {{ $i }})" @paste="handlePaste($event)"
                                inputmode="numeric" pattern="[0-9]" autocomplete="one-time-code">
                        @endfor
                        <input type="hidden" name="otp" id="otpHidden" value="">
                    </div>

                    {{-- Countdown Timer --}}
                    <div class="text-center mb-6" x-data="otpTimer()" x-init="startTimer()">
                        <div x-show="timeLeft > 0">
                            <p class="dark:text-dark-400 text-dark-500 text-sm">
                                Kode berlaku selama
                                <span class="text-primary-500 font-bold" x-text="formatTime()"></span>
                            </p>
                        </div>
                        <div x-show="timeLeft <= 0">
                            <p class="text-red-500 text-sm font-medium">Kode telah kedaluwarsa</p>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit"
                        class="w-full py-3.5 bg-gradient-primary text-white font-semibold rounded-xl hover:shadow-lg hover:shadow-primary-500/30 transition-all duration-300 btn-animate">
                        <i data-lucide="check-circle" class="w-5 h-5 inline mr-2"></i>
                        Verifikasi Kode
                    </button>
                </form>

                {{-- Resend OTP --}}
                <div class="text-center mt-6 pt-6 border-t dark:border-dark-700 border-gray-200">
                    <p class="dark:text-dark-400 text-dark-600 text-sm mb-3">Tidak menerima kode?</p>
                    <form method="POST" action="{{ route('admin.otp.resend') }}">
                        @csrf
                        <button type="submit"
                            class="text-primary-500 font-semibold hover:text-primary-400 transition-colors text-sm">
                            <i data-lucide="refresh-cw" class="w-4 h-4 inline mr-1"></i>
                            Kirim Ulang Kode
                        </button>
                    </form>
                </div>
            </div>

            {{-- Back to Login --}}
            <div class="text-center">
                <a href="{{ route('admin.login') }}"
                    class="text-sm dark:text-dark-400 text-dark-600 hover:text-primary-500 transition-colors">
                    <i data-lucide="arrow-left" class="w-4 h-4 inline mr-1"></i>
                    Kembali ke halaman login
                </a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function otpInput() {
            return {
                handleInput(event, index) {
                    const input = event.target;
                    const value = input.value.replace(/[^0-9]/g, '');
                    input.value = value;

                    if (value && index < 5) {
                        this.$refs['otp' + (index + 1)].focus();
                    }

                    this.updateHidden();
                },
                handleBackspace(event, index) {
                    if (!event.target.value && index > 0) {
                        this.$refs['otp' + (index - 1)].focus();
                    }
                    this.updateHidden();
                },
                handlePaste(event) {
                    event.preventDefault();
                    const paste = (event.clipboardData || window.clipboardData).getData('text').replace(/[^0-9]/g, '').slice(0, 6);
                    for (let i = 0; i < paste.length && i < 6; i++) {
                        this.$refs['otp' + i].value = paste[i];
                    }
                    if (paste.length > 0) {
                        this.$refs['otp' + Math.min(paste.length - 1, 5)].focus();
                    }
                    this.updateHidden();
                },
                updateHidden() {
                    let code = '';
                    for (let i = 0; i < 6; i++) {
                        code += this.$refs['otp' + i].value || '';
                    }
                    document.getElementById('otpHidden').value = code;
                }
            };
        }

        function otpTimer() {
            return {
                timeLeft: 300, // 5 minutes
                startTimer() {
                    const interval = setInterval(() => {
                        if (this.timeLeft > 0) {
                            this.timeLeft--;
                        } else {
                            clearInterval(interval);
                        }
                    }, 1000);
                },
                formatTime() {
                    const min = Math.floor(this.timeLeft / 60);
                    const sec = this.timeLeft % 60;
                    return `${min}:${sec.toString().padStart(2, '0')}`;
                }
            };
        }
    </script>
@endpush