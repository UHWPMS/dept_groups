import { createApp } from 'vue';
import App from './App.vue';

const app = createApp(App);
import HeaderComponent from './components/HeaderComponent.vue';
import SideBar from './components/SideBar.vue';
import FooterComponent from './components/FooterComponent.vue';

app.component('header-component', HeaderComponent);
app.component('side-bar', SideBar);
app.component('footer-component', FooterComponent);

app.mount('#app');
