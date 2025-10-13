// Ambil elemen penting
const cartIcon = document.getElementById("shopping-cart");
const userIcon = document.getElementById("user");
const darkModeBtn = document.getElementById("dark-mode-toggle");
const body = document.body;
const weatherInfo = document.getElementById("weather");

// Simulasi cart
let cartCount = 0;

// Klik Cart → tampilkan jumlah item
cartIcon.addEventListener("click", (e) => {
  e.preventDefault();
  alert(`🛒 Kamu punya ${cartCount} item di cart.`);
});

// Klik User → tampilkan info
userIcon.addEventListener("click", (e) => {
  e.preventDefault();
  alert("👤 Halaman profil sedang dalam pengembangan.");
});

// Klik Gambar Produk → tambah ke cart
const products = document.querySelectorAll("section table td img");
products.forEach((product) => {
  product.addEventListener("click", () => {
    cartCount++;
    alert(`✅ ${product.alt} berhasil ditambahkan ke cart!`);
  });
});

// Dark Mode Toggle
darkModeBtn.addEventListener("click", () => {
  body.classList.toggle("dark-mode");
  darkModeBtn.textContent = body.classList.contains("dark-mode") ? "☀️" : "🌙";
});

// Fetch API → Ambil Cuaca Jakarta
async function fetchWeather() {
  try {
    const response = await fetch(
      "https://api.open-meteo.com/v1/forecast?latitude=-6.2&longitude=106.8&current_weather=true"
    );
    const data = await response.json();
    const temp = data.current_weather.temperature;
    const wind = data.current_weather.windspeed;
    weatherInfo.textContent = `🌤️ Jakarta: ${temp}°C | Angin ${wind} km/h`;
  } catch (error) {
    weatherInfo.textContent = "⚠️ Gagal memuat data cuaca.";
  }
}

// Jalankan weather fetch saat halaman load
fetchWeather();
