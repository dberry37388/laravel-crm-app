require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import {Orion} from "@tailflow/laravel-orion/lib/orion";
import {AuthDriver} from '@tailflow/laravel-orion/lib/drivers/default/enums/authDriver';

Orion.init("//localhost", "api/v1", AuthDriver.Sanctum, '4SEIHWzzdgm8xkiMzLgJdwSC3G9SOirtgBcCDkdg');
Orion.setToken(process.env.MIX_API_ACCESS_TOKEN);

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
