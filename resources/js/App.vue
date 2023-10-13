<template>
  <div class="app-container">
    <HeaderComponent></HeaderComponent>
    <SideBar></SideBar>
    <div class="content">
      <!-- Your main content goes here -->
    </div>
    <FooterComponent></FooterComponent>
  </div>
</template>

<script>
import FooterComponent from './components/FooterComponent.vue';
import HeaderComponent from './components/HeaderComponent.vue';
import SideBar from './components/SideBar.vue';

export default {
  name: 'App',
  data() {
    return {};
  },
  components: {
    HeaderComponent,
    FooterComponent,
    SideBar,
  },
};
</script>

<style scoped>
.app-container {
  display: flex;
  flex-direction: column;
  min-height: 100vh;

}

.content {
  flex: 1;
}

/* Style the footer */
FooterComponent {
  position: fixed;
  bottom: 0;
}
</style>