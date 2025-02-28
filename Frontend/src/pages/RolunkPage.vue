<script setup>

</script>

<template>
  <q-page class="q-pa-md">
    <div class="about-container">
      <h2 class="text-center animated fadeIn">Rólunk</h2>
      <p class="lead animated fadeIn delay-1s">
        Üdvözöljük a <strong>TK AUTÓKERESKEDÉS</strong> oldalán! Weboldalunk célja, hogy megkönnyítse a vásárlók és eladók közötti kapcsolatfelvételt. Használt autók széles választékával várunk, ahol bárki, akár magánszemélyek is, könnyedén hirdethetik járműveiket. Mi biztosítjuk a kényelmes és biztonságos vásárlást, segítve a legjobb ajánlatok megtalálását.
      </p>
      <q-btn to="/hirdetesfeladas" label="Hirdetésfeladás" color="primary" class="q-mt-md animated fadeInUp delay-2s"/>
    </div>
  </q-page>
</template>

<style scoped>
.about-container {
  max-width: 800px;
  margin: 0 auto;
  text-align: center;
}

h2 {
  color: #0066cc;
  margin-bottom: 15px;
}

.lead {
  font-size: 1.2rem;
  margin-bottom: 20px;
}

.q-btn {
  width: 200px;
}

/* Animations */
.animated {
  opacity: 0;
  animation-duration: 1s;
  animation-fill-mode: forwards;
}

.fadeIn {
  animation-name: fadeIn;
}

.fadeInUp {
  animation-name: fadeInUp;
}

.delay-1s {
  animation-delay: 1s;
}

.delay-2s {
  animation-delay: 2s;
}

@keyframes fadeIn {
  to {
    opacity: 1;
  }
}

@keyframes fadeInUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
