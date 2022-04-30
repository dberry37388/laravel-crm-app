<script>
import AppLayout from "../../Layouts/AppLayout";
import {Orion} from "@tailflow/laravel-orion/lib/orion";
import {Company} from "../../Models/Company";
import Button from "../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Jetstream/Button";
import ContactTable from "../Contacts/Partials/ContactTable";
import {Disclosure, DisclosureButton, DisclosurePanel} from "@headlessui/vue";
import {ChevronDownIcon} from "@heroicons/vue/solid"
import UpdateCompanySlideOver from "./Partials/UpdateCompanySlideOver";
import DialogModal from "../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Jetstream/DialogModal";

export default {
    components: {
        DialogModal,
        UpdateCompanySlideOver,
        DisclosurePanel,
        DisclosureButton,
        Disclosure,
        ContactTable,
        ChevronDownIcon,
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
                this.company = await Company.$query().with(['assignedTo', 'contacts']).find(this.companyId);
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
                    Manage {{ company.$attributes.name }}
                </h2>

                <div>
                    <Button type="button" @click="editingCompany = true">
                        Edit
                    </Button>
                </div>
            </div>
        </template>

        <div class="max-w-7xl mx-auto p-5 sm:px-6 lg:px-8" v-if="company">
            <Disclosure v-slot="{ open }">
                <DisclosureButton as="div" class="p-6 flex items-center justify-between bg-white rounded-lg">
                    <div class="flex gap-4">
                        <span class="ml-6 h-7 flex items-center">
                            <ChevronDownIcon :class="[open ? '-rotate-180' : 'rotate-0', 'h-6 w-6 transform']" aria-hidden="true" />
                        </span>

                        <span class="font-bold text-xl text-gray-900">
                            Contacts
                        </span>
                    </div>

                    <div>
                        <Button type="button">Create Contact</Button>
                    </div>
                </DisclosureButton>

                <!-- Use the built-in <transition> component to add transitions. -->
                <transition
                    enter-active-class="transition duration-100 ease-out"
                    enter-from-class="transform scale-95 opacity-0"
                    enter-to-class="transform scale-100 opacity-100"
                    leave-active-class="transition duration-75 ease-out"
                    leave-from-class="transform scale-100 opacity-100"
                    leave-to-class="transform scale-95 opacity-0"
                >
                    <DisclosurePanel>
                        <ContactTable :contacts="company.$attributes.contacts" />
                    </DisclosurePanel>
                </transition>
            </Disclosure>
        </div>

        <UpdateCompanySlideOver :show="editingCompany" :company="company" @close="editingCompany = false" @updated="getCompany" v-if="company" />
    </AppLayout>
</template>
