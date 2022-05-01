<script>
import AppLayout from "../../Layouts/AppLayout";
import {Orion} from "@tailflow/laravel-orion/lib/orion";
import {Company} from "../../Models/Company";
import Button from "../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Jetstream/Button";
import UpdateCompanySlideOver from "./Partials/UpdateCompanySlideOver";
import DialogModal from "../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Jetstream/DialogModal";
import ContactDisclosure from "../Contacts/Partials/ContactDisclosure";
import AddContact from "../Contacts/Partials/AddContact";

export default {
    components: {
        AddContact,
        ContactDisclosure,
        DialogModal,
        UpdateCompanySlideOver,
        Button,
        AppLayout
    },

    props: {
        companyId: {
            type: Number,
            required: true
        },
    },

    data() {
        return {
            company: null,
            editingCompany: false,
            addingContact: false,
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
        }
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

                <div class="flex gap-3">
                    <Button type="button" @click="editingCompany = true">
                        Edit
                    </Button>

                    <Button type="button" @click="addingContact = true">
                        Contact
                    </Button>
                </div>
            </div>
        </template>

        <div class="max-w-7xl mx-auto p-5 sm:px-6 lg:px-8" v-if="company">

            <div class="flex flex-col gap-4">
                <ContactDisclosure :company-id="company.$attributes.id" />
            </div>
        </div>

        <UpdateCompanySlideOver :show="editingCompany" :company="company" @close="editingCompany = false" @updated="getCompany" v-if="company" />
        <AddContact :show="addingContact" :company="company" @close="addingContact = false"  v-if="company" />
    </AppLayout>
</template>
