<script setup lang="ts"></script>

<template>
  <div class="fullscreen bg-gradient-to-r from-blue-600 via-blue-800 to-blue-900 text-white text-center q-pa-md flex flex-center">
    <div>
      <div class="error-code" style="font-size: 20vh; font-weight: bold;">404</div>
      
      <div class="text-h2" style="opacity: 0.8; font-style: italic; margin-bottom: 20px;">
        Hups! Valami elromlott.
      </div>
      
      <div class="error-description" style="margin-bottom: 30px;">
        Az oldal, amit keresel, nem található. Kérlek, próbálkozz egy másik oldallal, vagy térj vissza a főoldalra.
      </div>

      <q-btn class="q-mt-xl" color="white" label="Vissza a főoldalra" no-caps text-color="blue-8" to="/" unelevated />
    </div>
  </div>
</template>

<style scoped>
.fullscreen {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  text-align: center;
}

.error-code {
  font-family: 'Arial', sans-serif;
  color: #fff;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}

.error-description {
  font-size: 1.2rem;
  color: #ddd;
  margin-top: 10px;
}

q-btn {
  font-size: 1.1rem;
  padding: 10px 20px;
  border-radius: 25px;
}
</style>
