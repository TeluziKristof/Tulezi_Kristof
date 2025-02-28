<script setup>
import { useStore } from '../stores/store';
import { onMounted, computed, ref } from 'vue';
import { useRoute } from 'vue-router';
import { Loading } from 'quasar';

const startLoading = () => Loading.show();
const stopLoading = () => Loading.hide();

const route = useRoute();
const store = useStore();

const expanded = ref(false);

onMounted(async () => {
  startLoading();
  if (route.params.id) {
    try {
      await store.getHirdetesById(Number(route.params.id));
    } catch (error) {
      console.error("Hiba történt:", error);
    }
  }
  stopLoading();
});

const hirdetes = computed(() => store.hirdetesek.document);
const isLoading = computed(() => store.isLoading);
</script>

<template>
  <div v-if="hirdetes && hirdetes.hirdetoId" class="product-details">
    <div class="detail-container">
      <h2>Hirdető Adatok</h2>
      <table>
        <tr><th>Név</th><td>{{ hirdetes.nev }}</td></tr>
        <tr><th>Telefonszám</th><td>{{ hirdetes.telSzam }}</td></tr>
        <tr><th>Email</th><td>{{ hirdetes.email }}</td></tr>
      </table>
    </div>

    <div class="detail-container">
      <h2>Hirdetés Részletei</h2>
      <table>
        <tr><th>Cím</th><td>{{ hirdetes.hirdetesCim }}</td></tr>
        <tr><th>Ár</th><td>{{ new Intl.NumberFormat('hu-HU', { style: 'currency', currency: 'HUF' }).format(hirdetes.ar) }}</td></tr>
        <tr><th>Leírás</th><td>{{ hirdetes.leiras || 'Nincs leírás' }}</td></tr>
      </table>
    </div>

    <div class="detail-container">
      <h2>Jármű Részletek</h2>
      <table>
        <tr><th>Márka</th><td>{{ hirdetes.marka }}</td></tr>
        <tr><th>Modell</th><td>{{ hirdetes.modell }}</td></tr>
        <tr><th>Kivitel</th><td>{{ hirdetes.kivitel }}</td></tr>
        <tr><th>Évjárat</th><td>{{ hirdetes.evjarat }}</td></tr>
      </table>
    </div>

    <div class="detail-container">
      <h2>Specifikációk</h2>
      <table>
        <tr><th>Km óra állás</th><td>{{ hirdetes.kmOraAllas }} km</td></tr>
        <tr><th>Szállítható személyek</th><td>{{ hirdetes.szallithatoSzemelySzama }}</td></tr>
        <tr><th>Ajtók száma</th><td>{{ hirdetes.ajtokSzama }}</td></tr>
        <tr><th>Üzemanyag</th><td>{{ hirdetes.uzemanyag }}</td></tr>
        <tr><th>Hengerűrtartalom</th><td>{{ hirdetes.hengerurtartalom }} cm³</td></tr>
        <tr><th>Teljesítmény</th><td>{{ hirdetes.teljesitmeny }} LE</td></tr>
      </table>
    </div>
  </div>
</template>

<style scoped>
.product-details {
  padding: 20px;
}

.detail-container {
  margin-bottom: 30px;
}

h2 {
  font-size: 1.5rem;
  margin-bottom: 10px;
  color: #2c3e50;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 10px;
  text-align: left;
  border: 1px solid #ddd;
}

th {
  background-color: #f4f4f4;
  color: #333;
}

td {
  color: #555;
}
</style>
