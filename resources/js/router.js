import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { createWebHistory, createRouter } from 'vue-router';



// Import main Components
import TopPage from './Pages/TopPage.vue';
import Main from './Pages/Main.vue';
import ProductsList from './Pages/ProductsList.vue';
import Tanks from './Pages/Tanks.vue';
import Woods from './Pages/Woods.vue';
import Stones from './Pages/Stones.vue';
import Fishes from './Pages/Fishes.vue';
import Plants from './Pages/Plants.vue';
import Products from './Pages/Products.vue';
import Fish from './Pages/Fish.vue';
import Concept from './Pages/Concept.vue';
import Layout from './Pages/Layout.vue';
import FishList from './Pages/FishList.vue';
import FishPicks from './Pages/FishPicks.vue';
import Recommend from './Pages/Recommend.vue';
import Input from './Pages/Input.vue';
import Favorite from './Pages/Favorite.vue';
import Trouble from './Pages/Trouble.vue';
import Measure from './Pages/Measure.vue';
import Contact from './Pages/Contact.vue';
import Confirm from './Pages/Confirm.vue';
import Complete from './Pages/Complete.vue';
import Order from './Pages/Order.vue';
import NoticetoVisit from './Pages/NoticetoVisit.vue';
import AdTop from './Pages/AdTop.vue';
import AdMain from './Pages/AdMain.vue';
import AdContact from './Pages/AdContact.vue';
import AdCustomer from './Pages/AdCustomer.vue';
import AdProducts from './Pages/AdProducts.vue';
import AdMaster from './Pages/AdMaster.vue';



const routes = [
  // Route for Pages
  { path: '/TopPage', component: TopPage },
  { path: '/Main', component: Main },
  { path: '/ProductsList', component: ProductsList },
  { path: '/Tanks', component: Tanks },
  { path: '/Woods', component: Woods },
  { path: '/Stones', component: Stones },
  { path: '/Fishes', component: Fishes },
  { path: '/Plants', component: Plants },
  { path: '/Products', component: Products },
  { path: '/Fish', component: Fish },
  { path: '/Concept', component: Concept },
  { path: '/Layout', component: Layout },
  { path: '/FishList', component: FishList },
  { path: '/FishPicks', component: FishPicks },
  { path: '/Recommend', component: Recommend },
  { path: '/Input', component: Input },
  { path: '/Favorite', component: Favorite },
  { path: '/Trouble', component: Trouble },
  { path: '/Measure', component: Measure },
  { path: '/Contact', component: Contact },
  { path: '/Confirm', component: Confirm },
  { path: '/Complete', component: Complete },
  { path: '/Order', component: Order },
  { path: '/NoticetoVisit', component: NoticetoVisit },
  { path: '/AdTop', component: AdTop },
  { path: '/AdMain', component: AdMain },
  { path: '/AdContact', component: AdContact },
  { path: '/AdCustomer', component: AdCustomer },
  { path: '/AdProducts', component: AdProducts },
  { path: '/AdMaster', component: AdMaster },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;

// アプリを初期化
createInertiaApp({
  // ルーターを設定
  resolve: (name) => import(`./Pages/${name}.vue`),
  setup({ el, app, props }) {
    app.use(router).mount(el);
  },
});
