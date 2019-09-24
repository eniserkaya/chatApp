import Home from './components/Home';
import Register from './components/Register';

export default [
    {
        path: '/',
        component: Home,
        name: 'home'
    },
    {
        path: '/register',
        component: Register,
        name: 'Register'
    }
]
