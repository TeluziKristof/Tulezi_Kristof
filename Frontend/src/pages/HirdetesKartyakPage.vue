<script setup>
import { useStore } from "../stores/store";
import { onMounted, computed } from "vue";

const store = useStore();

const card = computed(() => store.hirdetesek.documents);

onMounted(() => {
  store.getCardHirdetesek();
});
</script>

<template>
  <q-page class="q-pa-sm">
    <q-container class="fit row wrap justify-around items-center content-center">
      <q-card v-for="c in card" :key="c.hirdetoId" class="custom-card q-card" flat bordered>
        <q-img v-if="c.kepUrl" :src="c.kepUrl" class="custom-img" />

        <q-card-section class="custom-card-section">
          <div class="text-overline text-orange-9">{{ c.felhasznaloNev || 'Hirdető név' }}</div>
          <div class="text-h5 q-mt-sm q-mb-xs">{{ c.hirdetesCim || 'Hirdetés cím' }}</div>
          <div class="text-h6 text-grey">
            {{ c.uzemanyag }} , {{ c.evjarat }}
          </div>
        </q-card-section>

        <q-card-section>
          <div class="row no-wrap items-center">
            <div class="col text-h6 ellipsis">{{ c.marka }}</div>
          </div>
        </q-card-section>

        <q-card-section class="q-pt-none">
  <div class="text-subtitle1 price">
    {{ new Intl.NumberFormat('hu-HU', { style: 'currency', currency: 'HUF' }).format(c.ar) }}
  </div>
</q-card-section>
      </q-card>
    </q-container>
  </q-page>
</template>

<style lang="scss" scoped>
.q-card {
  width: 100%;
  max-width: 400px;
  margin: 10px;
  border-radius: 15px; /* Enyhén kerekített sarkok */
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Finom árnyék */
}

.custom-card {
  display: flex;
  flex-direction: column;
  height: 100%;
}

.custom-img {
  border-radius: 10px;
  max-height: 250px; /* Kép méretének szabályozása */
  object-fit: cover;
}

.custom-card-section {
  padding: 20px;
  background-color: #f9f9f9; /* Világos háttér a szövegeknek */
  border-radius: 10px; /* Lekerekített sarkok */
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1); /* Finom belső árnyék */
}

.q-card-section {
  padding: 10px;
}

.text-h5 {
  font-weight: bold;
  color: #333;
}

.text-h6 {
  color: #555;
}

.price {
  display: flex;
  justify-content: center;
  font-size: 20px;
  font-weight: bold;
  color: #d32f2f; /* Piros ár */
}


@media (max-width: 768px) {
  .fit {
    flex-direction: column;
  }

  .q-card {
    width: 100%;
  }
}

@media (max-width: 576px) {
  .q-card {
    margin-bottom: 20px;
  }

  .fit {
    justify-content: center;
  }
}
</style>
