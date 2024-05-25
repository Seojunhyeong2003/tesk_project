import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue, route } from '../../vendor/tightenco/ziggy';
let Ziggy;

(async() => {
    const response = await fetch( '/ziggy' );
    Ziggy = await response.json();
})();
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
import Echo from 'laravel-echo';
import SocketClient from 'socket.io-client';
window.io = SocketClient;


window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: import.meta.env.VITE_ECHO_HOST + ':6001'
});

createInertiaApp( {
    resolve: name => {
        const pages = import.meta.glob( './Pages/**/*.vue', { eager: true } );
        return pages[ `./Pages/${ name }.vue` ];
    },
    setup( { el, App, props, plugin } ) {
        const app = createApp( { render: () => h( App, props ) } )
            .use( ZiggyVue, Ziggy )
            .use(plugin)
            .directive( 'focus', {
                mounted: ( el ) => el.focus(),
            } );

        app.config.globalProperties.route = route;

        app.mount( el );
        return app;
    },
    progress: {
        color: '#4B5563',
    },
} );

