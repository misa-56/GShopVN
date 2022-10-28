import Home from '../pages/Home';
import Product from '../pages/Product';
import About from '../pages/StaticPages/About';
import Review from '../pages/StaticPages/Review';
import Notification from '../pages/StaticPages/Notification';
import Feedback from '../pages/StaticPages/Feedback';
import Support from '../pages/StaticPages/Support';

const publicRoutes = [
    { path: '/', component: Home },
    { path: '/product', component: Product },
    { path: '/1-about', component: About },
    { path: '/2-notification', component: Notification },
    { path: '/3-review', component: Review },
    { path: '/4-feedback', component: Feedback },
    { path: '/5-support', component: Support },
];

const privateRoutes = [];

export { publicRoutes, privateRoutes };
