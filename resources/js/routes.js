import Home from './components/Home';
import Register from './components/Register';
import Login from'./components/Login'

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
    },
    {
        path: '/login',
        component: Login,
        name: 'Login'
    }
]
