<script setup>
import { useStore } from "../stores/store";
import { onMounted } from "vue";

const store = useStore();

const columns = [
  { name: "hirdetesCim", label: "Hirdetés címe", field: "hirdetesCim", align: "left" },
  { name: "evjarat", label: "Évjárat", field: "evjarat", align: "left" },
  { name: "marka", label: "Márka", field: "marka", align: "left" },
  { name: "modell", label: "Modell", field: "modell", align: "left" },
  { name: "kmOraAllas", label: "Km óra állás", field: "kmOraAllas", align: "right" },
  { name: "uzemanyag", label: "üzemanyag", field: "uzemanyag", align: "left" },
  { name: "ar", label: "Ár (Ft)", field: "ar", align: "right" },
  { name: "nev", label: "Hirdető neve", field: "nev", align: "left" },
  { name: "telSzam", label: "Telefonszám", field: "telSzam", align: "left" },
  { name: "email", label: "E-mail", field: "email", align: "left" },
  { name: "megnez", label: "További információ", field: "megnez", align: "left" },
];

onMounted(() => {
  store.getHirdetesek();
});
</script>

<template>
  <q-page>
    <div class="q-pa-md">
     
      <q-table :columns="columns" :rows="store.hirdetesek.documents" :row-key="row => row.hirdetesId">

        <template v-slot:body-cell-megnez="props">
          <q-td :props="props">
            <router-link :to="`/egyedi/${props.row.hirdetesId}`">
              <q-chip outline color="teal" text-color="white" icon="directions">
                Több információ
              </q-chip>
            </router-link>
          </q-td>
        </template>


      </q-table>
    </div>
  </q-page>
</template>

<style scoped>

</style>
