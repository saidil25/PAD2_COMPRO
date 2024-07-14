<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <!-- Alpine JS -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Tailwind CSS -->
  @vite('resources/css/app.css')
  <script>
    const BASE_URL = "{{ config('app.base_url') }}";
    async function login() {
      var email = document.getElementById("email").value;
      var password = document.getElementById("pass").value;

      try {
        const response = await fetch(`${BASE_URL}/api/login`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          },
          body: JSON.stringify({ email, password })
        });

        if (!response.ok) {
          throw new Error('Login failed');
        }

        const data = await response.json();

        // Store the token for authenticated requests
        localStorage.setItem('authToken', data.token);

        // SweetAlert for success message
        Swal.fire({
          icon: 'success',
          title: 'Login successful!',
          showConfirmButton: false,
          timer: 1500
        }).then(() => {
          // Redirect to the dashboard or handle login success
          window.location.href = "/carouseltable";
        });

      } catch (error) {
        Swal.fire({
          icon: 'error',
          title: 'Login failed',
          text: 'Username atau password salah!',
        });
      }
    }
  </script>
</head>
<body class="relative bg-gray-100">
  <div class="flex items-center justify-center min-h-screen">
    <div class="flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
      <!-- left side -->
      <div class="flex flex-col justify-center p-8 md:p-14">
        <span class="mb-3 text-4xl font-bold">Login Administrator</span>
        <span class="font-light text-gray-400 mb-8">
        Masuk ke Dashboard Admin
        </span>
        <div class="py-4">
          <span class="mb-2 text-md">Email</span>
          <input
            type="text"
            class="w-full p-2 border border-gray-300 rounded-md placeholder-font-light placeholder-text-gray-500"
            name="email"
            id="email"
          />
        </div>
        <div class="py-4">
          <span class="mb-2 text-md">Password</span>
          <input
            type="password"
            name="password"
            id="pass"
            class="w-full p-2 border border-gray-300 rounded-md placeholder-font-light placeholder-text-gray-500"
          />
        </div>
        <button
          type="button" 
          onclick="login()"
          class="w-full mt-6 bg-black text-white p-2 rounded-lg mb-6 hover:bg-white hover:text-black hover:border hover:border-gray-300"
        >
          Sign in
        </button>
      </div>
      <!-- right side -->
      <div class="relative hidden md:block">
        <img
          src="../img/login_landing.jpg"
          alt="img"
          class="w-[400px] h-full rounded-r-2xl object-cover"
        />
      </div>
    </div>
  </div>
</body>
</html>
