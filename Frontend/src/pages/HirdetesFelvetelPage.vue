<script setup>
import { useStore } from "../stores/store";
import { ref } from "vue";
import { Notify } from 'quasar';  


const store = useStore();



const nev = ref("John Doe");
const telSzam = ref("06307770089");
const email = ref("johndoe@example.com");
const hirdetesCim = ref("Példa");
const kepUrl = ref("https://example.com/image.jpg");
const ar = ref(5000000);  
const leiras = ref("Jó állapotú");
const marka = ref("Ford");
const modell = ref("Focus");
const kivitel = ref("Sedan");
const evjarat = ref(2018);  
const kmOraAllas = ref(35000);  
const szallithatoSzemelySzama = ref(5); 
const ajtokSzama = ref(5);  
const uzemanyag = ref("Benzin");
const hengerurtartalom = ref(1600); 
const teljesitmeny = ref(120); 


const addNewAdat = async () => {
  if (!nev.value || !hirdetesCim.value || !ar.value || !email.value) {
    Notify.create({  
      type: 'negative',
      message: 'A szükséges mezők nincsenek kitöltve!',
    });
    return;
  }


  const newAdat = {
    nev: nev.value,
    telSzam: telSzam.value, 
    email: email.value,
    hirdetesCim: hirdetesCim.value,
    kepUrl: kepUrl.value,
    ar: Number(ar.value),
    leiras: leiras.value,
    marka: marka.value,
    modell: modell.value,
    kivitel: kivitel.value,
    evjarat: Number(evjarat.value),
    kmOraAllas: Number(kmOraAllas.value),
    szallithatoSzemelySzama: Number(szallithatoSzemelySzama.value),
    ajtokSzama: Number(ajtokSzama.value),
    uzemanyag: uzemanyag.value,
    hengerurtartalom: Number(hengerurtartalom.value),
    teljesitmeny: Number(teljesitmeny.value)
  };

  store.hirdetesek.document = newAdat;
  store.hirdetesek.documents.push(newAdat);

  Notify.create({  
    type: 'positive',
    message: 'Új hirdetés hozzáadva!',
  });


  await store.createHirdetes();


  nev.value = "";
  telSzam.value = "";
  email.value = "";
  hirdetesCim.value = "";
  kepUrl.value = "";
  ar.value = 0;
  leiras.value = "";
  marka.value = "";
  modell.value = "";
  kivitel.value = "";
  evjarat.value = 2000;
  kmOraAllas.value = 0;
  szallithatoSzemelySzama.value = 1;
  ajtokSzama.value = 4;
  uzemanyag.value = "";
  hengerurtartalom.value = 0;
  teljesitmeny.value = 0;
};
</script>


<template>
  <q-page class="q-pa-md">
    <div class="form-container">
      <q-form @submit.prevent="addNewAdat" class="q-gutter-md">
        <fieldset class="q-pa-md">
          <legend>Hirdető adatai</legend>
          <div class="form-row">
            <q-input filled v-model="nev" label="Hirdető neve" :rules="[(val) => !!val || 'Kötelező mező!']" class="q-mb-md" dense />
            <q-input filled v-model="telSzam" label="Telefonszám" :rules="[(val) => !!val || 'Kötelező mező!']" class="q-mb-md" dense />
          </div>
          <q-input filled v-model="email" label="Email" :rules="[(val) => !!val || 'Kötelező mező!']" class="q-mb-md" dense />
        </fieldset>

        <fieldset class="q-pa-md">
          <legend>Hirdetés adatai</legend>
          <div class="form-row">
            <q-input filled v-model="hirdetesCim" label="Hirdetés címe" :rules="[(val) => !!val || 'Kötelező mező!']" class="q-mb-md" dense />
            <q-input filled v-model="kepUrl" label="Kép URL" :rules="[(val) => !!val || 'Kötelező mező!']" class="q-mb-md" dense />
          </div>
          <q-input filled type="number" v-model="ar" label="Ár" :rules="[(val) => !!val || 'Kötelező mező!']" class="q-mb-md" dense />
          <q-input filled v-model="leiras" label="Leírás" :rules="[(val) => !!val || 'Kötelező mező!']" class="q-mb-md" dense />
        </fieldset>

        <fieldset class="q-pa-md">
          <legend>Jármű adatai</legend>
          <div class="form-row">
            <q-input filled v-model="marka" label="Márka" :rules="[(val) => !!val || 'Kötelező mező!']" class="q-mb-md" dense />
            <q-input filled v-model="modell" label="Modell" :rules="[(val) => !!val || 'Kötelező mező!']" class="q-mb-md" dense />
          </div>
          <div class="form-row">
            <q-input filled v-model="kivitel" label="Kivitel" :rules="[(val) => !!val || 'Kötelező mező!']" class="q-mb-md" dense />
            <q-input filled type="number" v-model="evjarat" label="Évjárat" :rules="[(val) => !!val || 'Kötelező mező!']" class="q-mb-md" dense />
          </div>
        </fieldset>

        <fieldset class="q-pa-md">
          <legend>Specifikációk</legend>
          <div class="form-row">
            <q-input filled type="number" v-model="kmOraAllas" label="Km Óra Állás" :rules="[(val) => !!val || 'Kötelező mező!']" class="q-mb-md" dense />
            <q-input filled type="number" v-model="szallithatoSzemelySzama" label="Szállítható személyek száma" :rules="[(val) => !!val || 'Kötelező mező!']" class="q-mb-md" dense />
          </div>
          <div class="form-row">
            <q-input filled type="number" v-model="ajtokSzama" label="Ajtók száma" :rules="[(val) => !!val || 'Kötelező mező!']" class="q-mb-md" dense />
            <q-input filled v-model="uzemanyag" label="Üzemanyag" :rules="[(val) => !!val || 'Kötelező mező!']" class="q-mb-md" dense />
          </div>
          <div class="form-row">
            <q-input filled type="number" v-model="hengerurtartalom" label="Hengerűrtartalom" :rules="[(val) => !!val || 'Kötelező mező!']" class="q-mb-md" dense />
            <q-input filled type="number" v-model="teljesitmeny" label="Teljesítmény" :rules="[(val) => !!val || 'Kötelező mező!']" class="q-mb-md" dense />
          </div>
        </fieldset>

        <q-btn label="Hirdetésfeladás" color="primary" @click="addNewAdat" class="q-ml-none q-mt-md" style="display: block; margin: 20px auto; max-width: 200px;" />
      </q-form>
    </div>
  </q-page>
</template>

<style scoped>
.form-container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}

fieldset {
  width: 100%;
  border: 1px solid #ccc;
  padding: 20px;
  margin-bottom: 20px;
  border-radius: 10px;
}

legend {
  font-weight: bold;
  font-size: 1.2em;
  padding: 0 10px;
}

.form-row {
  display: flex;
  justify-content: space-between;
  gap: 20px;
  margin-bottom: 10px;
}

.q-input {
  max-width: 300px;
  width: 100%;
}

.q-btn {
  width: 100%;
  max-width: 300px;
  margin: 20px auto 0;
}
</style>


