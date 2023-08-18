let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}


import './bootstrap';
import '../css/app.css';


import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';

import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import router from './router';

/**
 * vee-validate
 */

import { defineRule } from 'vee-validate';
import { required } from '@vee-validate/rules';

defineRule('required', required);




// Font Awesome
import '@fortawesome/fontawesome-free/css/all.css';

// Import sub Components
import Header from './Components/Header.vue';
import Footer from './Components/Footer.vue';
import What from './Components/What.vue';
import Search from './Components/Search.vue';
import Request from './Components/Request.vue';
import ContactLink from './Components/ContactLink.vue';
import KnowAqureco from './Components/KnowAqureco.vue';
import AlreadyLogin from './Components/AlreadyLogin.vue';
import PageTop from './Components/PageTop.vue';
import ChoosePackage from './Components/ChoosePackage.vue';
import LayoutPackage from './Components/LayoutPackage.vue';
import FishPackage from './Components/FishPackage.vue';
import ChooseProducts from './Components/ChooseProducts.vue';
import ShopSample from './Components/ShopSample.vue';
import AlreadyPackage from './Components/AlreadyPackage.vue';
import ProductsIntro from './Components/ProductsIntro.vue';
import ProductsIntroTank from './Components/ProductsIntroTank.vue';
import ProductsIntroWood from './Components/ProductsIntroWood.vue';
import ProductsIntroStone from './Components/ProductsIntroStone.vue';
import ProductsIntroFish from './Components/ProductsIntroFish.vue';
import ProductsIntroPlant from './Components/ProductsIntroPlant.vue';
import ProductsIntroProducts from './Components/ProductsIntroProducts.vue';
import Back from './Components/Back.vue';
import FishesCategoryList from './Components/FishesCategoryList.vue';
import LayoutConcept from './Components/LayoutConcept.vue';
import FishConcept from './Components/FishConcept.vue';
import LayoutTankSize from './Components/LayoutTankSize.vue';
import SelectTankLink from './Components/SelectTankLink.vue';
import SelectWoodLink from './Components/SelectWoodLink.vue';
import SelectStoneLink from './Components/SelectStoneLink.vue';
import SelectPlantLink from './Components/SelectPlantLink.vue';
import SelectFishLink from './Components/SelectFishLink.vue';
import SelectProductLink from './Components/SelectProductLink.vue';
import MakeOrder from './Components/MakeOrder.vue';
import FishListFIsh from './Components/FishListFIsh.vue';
import FIshListFishButton0 from './Components/FIshListFishButton0.vue';
import FIshListFishButton1 from './Components/FIshListFishButton1.vue';
import FIshListFishButton2 from './Components/FIshListFishButton2.vue';
import FIshListFishButton3 from './Components/FIshListFishButton3.vue';
import FIshListFishButton4 from './Components/FIshListFishButton4.vue';
import FavoriteList from './Components/FavoriteList.vue';
import TroubleBody from './Components/TroubleBody.vue';
import ContactBody from './Components/ContactBody.vue';
import ConfirmBody from './Components/ConfirmBody.vue';
import CompleteBody from './Components/CompleteBody.vue';
import iconFish from './Components/iconFish.vue';
import adiconFish from './Components/adiconFish.vue';
import Menu from './Components/Menu.vue';
import LogOut from './Components/LogOut.vue';
import TanksCom from './Components/TanksCom.vue';
import WoodsCom from './Components/WoodsCom.vue';
import StonesCom from './Components/StonesCom.vue';
import PlantsCom from './Components/PlantsCom.vue';
import ProductsCom from './Components/ProductsCom.vue';
import AdHeader from './Components/AdHeader.vue';
import AdMainMenu from './Components/AdMainMenu.vue';
import Favorite_wood from './Components/Favorite_wood.vue';
import NTVbody from './Components/NTVbody.vue';
import FishCom from './Components/FishCom.vue';


const appName = import.meta.env.VITE_APP_NAME || 'Laravel';


createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });
        app.use(plugin);
        app.use(ZiggyVue, Ziggy);
        app.use(router); // Vue Routerをセットアップ

        // Register header and footer components globally
        app.component('Header', Header);
        app.component('Footer', Footer);
        app.component('What', What);
        app.component('Search', Search);
        app.component('Request', Request);
        app.component('ContactLink', ContactLink);
        app.component('KnowAqureco', KnowAqureco);
        app.component('AlreadyLogin', AlreadyLogin);
        app.component('PageTop', PageTop);
        app.component('ChoosePackage',ChoosePackage);
        app.component('LayoutPackage',LayoutPackage);
        app.component('FishPackage',FishPackage);
        app.component('ChooseProducts',ChooseProducts);
        app.component('ShopSample',ShopSample);
        app.component('AlreadyPackage',AlreadyPackage);
        app.component('ProductsIntro',ProductsIntro);
        app.component('ProductsIntroTank',ProductsIntroTank);
        app.component('ProductsIntroWood',ProductsIntroWood);
        app.component('ProductsIntroStone',ProductsIntroStone);
        app.component('ProductsIntroFish',ProductsIntroFish);
        app.component('ProductsIntroPlant',ProductsIntroPlant);
        app.component('ProductsIntroProducts',ProductsIntroProducts);
        app.component('Back',Back);
        app.component('FishesCategoryList',FishesCategoryList);
        app.component('LayoutConcept',LayoutConcept);
        app.component('FishConcept',FishConcept);
        app.component('LayoutTankSize',LayoutTankSize);
        app.component('SelectTankLink',SelectTankLink);
        app.component('SelectWoodLink',SelectWoodLink);
        app.component('SelectStoneLink',SelectStoneLink);
        app.component('SelectPlantLink',SelectPlantLink);
        app.component('SelectFishLink',SelectFishLink);
        app.component('SelectProductLink',SelectProductLink);
        app.component('MakeOrder',MakeOrder);
        app.component('FishListFIsh',FishListFIsh);
        app.component('FIshListFishButton0',FIshListFishButton0);
        app.component('FIshListFishButton1',FIshListFishButton1);
        app.component('FIshListFishButton2',FIshListFishButton2);
        app.component('FIshListFishButton3',FIshListFishButton3);
        app.component('FIshListFishButton4',FIshListFishButton4);
        app.component('FavoriteList',FavoriteList);
        app.component('TroubleBody',TroubleBody);
        app.component('ContactBody',ContactBody);
        app.component('ConfirmBody',ConfirmBody);
        app.component('CompleteBody',CompleteBody);
        app.component('iconFish',iconFish);
        app.component('adiconFish',adiconFish);
        app.component('Menu',Menu);
        app.component('LogOut',LogOut);
        app.component('TanksCom',TanksCom);
        app.component('WoodsCom',WoodsCom);
        app.component('StonesCom',StonesCom);
        app.component('PlantsCom',PlantsCom);
        app.component('ProductsCom',ProductsCom);
        app.component('AdHeader',AdHeader);
        app.component('AdMainMenu',AdMainMenu);
        app.component('Favorite_wood',Favorite_wood);
        app.component('NTVbody',NTVbody);
        app.component('FishCom',FishCom);

        app.mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
