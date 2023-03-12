<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <a onclick="window.history.back()">
          <x-button>Kembali</x-button>
        </a><br><br>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nama')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Role -->
            <div class="mt-4">
              <x-label for="role" :value="__('Jabatan')" />
              <select class="
              form-select appearance-none
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding bg-no-repeat
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
              " name="role">
                <option value="ke">Knowledge Engineer</option>
                <option value="admin">Administrator</option>
              </select>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Kata sandi')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            <small><a href="#" id="passwordFieldsVisibilityTogglerLink" style="color: blue; text-decoration: underline;" onclick="togglePasswordFieldsVisibility()">Tampilkan kata sandi</a> | <a href="#" style="color: blue; text-decoration: underline" onclick="generateRandomPassword()">Buat kata sandi acak</a></small><br><br>
            <script type="text/javascript">
              function generateRandomPassword(){
                var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                var length = 32;
                var password = "";

                for (var i = 0; i < length; i++) {
                  var randomNumber = Math.floor(Math.random() * chars.length);
                  password += chars.substring(randomNumber, randomNumber +1);
                }

                document.getElementById("password").value = password;
                document.getElementById("password_confirmation").value = password;
              }

              function togglePasswordFieldsVisibility(){
                var passwordField, passwordConfirmationField;

                passwordField = document.getElementById("password");
                passwordConfirmationField = document.getElementById("password_confirmation");
                passwordFieldsVisibilityTogglerLink = document.getElementById("passwordFieldsVisibilityTogglerLink");

                if (passwordField.type == "password" &&
                passwordConfirmationField.type == "password") {
                  passwordField.type = "text";
                  passwordConfirmationField.type = "text";
                  passwordFieldsVisibilityTogglerLink.innerHTML = "Sembunyikan kata sandi";
                } else {
                  passwordField.type = "password";
                  passwordConfirmationField.type = "password";
                  passwordFieldsVisibilityTogglerLink.innerHTML = "Tampilkan kata sandi";
                }
              }
            </script>
            </div>

            <!-- Confirm Password -->
            <div class="mt-2">
                <x-label for="password_confirmation" :value="__('Konfirmasi kata sandi')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Sudah memiliki akun?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('DAFTAR') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
