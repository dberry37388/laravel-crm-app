<script>
import AppLayout from "../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Layouts/AppLayout";
import {Company} from "../Models/Company";
export default {
    props: {
        companyId: {
            type: Number,
            required: true
        },
    },

    components: { AppLayout },

    data() {
        return {
            company: null,
        }
    },

    created() {
        this.getCompany();
    },

    methods: {
        async getCompany() {
            try {
                await Orion.csrf();
                // now you can make requests to the API
                this.company = await Company.$query().with(['assignedTo']).find(this.companyId);
            } catch (error) {
                console.error('Unable to retrieve CSRF cookie.');
            }
        },
    }
}
</script>

<template>
    <AppLayout>
        <template #header v-if="company">
            <div class="flex items-center justify-between">
                <h2 class="font-bold text-xl text-gray-800 leading-tight">
                    {{ company.$attributes.name }}
                </h2>
            </div>
        </template>

        <slot />

    </AppLayout>
</template>
