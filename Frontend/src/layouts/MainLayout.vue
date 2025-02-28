<script setup>
</script>

<template>
  <q-layout view="hHh lpR fFf">

    <q-header elevated class="bg-teal-2 text-dark" height-hint="98">
      <q-toolbar>
        <q-img src="images/logo.png" alt="Logó" width="50px" height="50px" class="q-mr-md" />
        <q-space />
        <q-tabs align="center">
          <q-route-tab to="/" label="Kezdőlap" />
          <q-route-tab to="/hirdetesek/kartyak" label="Hirdetések" />
          <q-route-tab to="/hirdetesek/tabla" label="Kereső" />
          <q-route-tab to="/hirdetesfeladas" label="Új hirdetés" />
        </q-tabs>
        <q-space />
      </q-toolbar>
    </q-header>

    <q-page-container>
      <router-view/>
    </q-page-container>

  </q-layout>
</template>

<style lang="scss" scoped>
</style>
