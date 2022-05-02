<script>
import Input from "../../../Jetstream/Input";
import {Contact} from "../../../Models/Contact";
import {FilterOperator} from "@tailflow/laravel-orion/lib/drivers/default/enums/filterOperator";
import Button from "../../../Jetstream/Button";
import { CogIcon, ChevronDownIcon, SearchIcon, UserAddIcon, PencilAltIcon } from '@heroicons/vue/solid'
import UpdateContactModal from "./UpdateContactModal";
import AddContactModal from "./AddContactModal";
import SecondaryButton from "../../../Jetstream/SecondaryButton";
import {Menu, MenuButton, MenuItem, MenuItems} from "@headlessui/vue";

export default {
    components: {
        AddContactModal,
        Button,
        ChevronDownIcon,
        CogIcon,
        Input,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        PencilAltIcon,
        SearchIcon,
        SecondaryButton,
        UpdateContactModal,
        UserAddIcon,
    },

    props: {
        companyId: {
            type: Number,
            required: true
        }
    },

    data() {
        return {
            search: '',
            contacts: [],
            selectedContact: null,
            editingContact: false,
            addingContact: false,
            showingContactDetailsPanel: false,
        }
    },

    created() {
        this.searchContacts();
    },

    methods: {
        searchContacts: _.debounce((async function (e) {
            this.contacts = await Contact.$query()
                .filter('company_id', FilterOperator.Equal, this.companyId)
                .lookFor(this.search)
                .sortBy('first_name', 'asc')
                .search()
        }), 300),

        setSelectedContact(contact) {
            this.selectedContact = contact;
            this.editingContact = true;
        },

        closeEditingModal() {
            this.searchContacts();
            this.selectedContact = null;
            this.editingContact = false;
        },

        closeAddModal() {
            this.searchContacts();
            this.addingContact = false;
        }
    },
}
</script>

<template>
    <div class="sm:-mx-6 lg:-mx-8 mt-5">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

            <div class="flex justify-between">
                <div class="mt-1 relative rounded-md shadow-sm w-100 mb-4">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <SearchIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                    </div>
                    <Input type="text" class="w-full pl-10" placeholder="Search by a contacts first or last name, or by their email address" v-model.lazy="search" @input="searchContacts" />
                </div>

                <div class="flex">
                    <div>
                        <SecondaryButton type="button" @click="addingContact = true" @cancel="searchContacts">
                            <div class="flex">
                                <UserAddIcon class="h-5 w-5 text-primary" />
                            </div>
                        </SecondaryButton>
                    </div>
                </div>
            </div>

            <div class="overflow-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg h-50">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                    <tr class="divide-x divide-gray-200">
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Job Title</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                    <tr v-for="contact in contacts" :key="contact.$attributes.id" class="divide-x divide-gray-200">
                        <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                            {{ contact.$attributes.first_name }} {{ contact.$attributes.last_name }}
                        </td>
                        <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                            {{ contact.$attributes.email }}
                        </td>

                        <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                            {{ contact.$attributes.job_title }}
                        </td>

                        <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                            {{ contact.$attributes.phone_number }}
                        </td>

                        <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                            {{ contact.$attributes.mobile_number }}
                        </td>

                        <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                            <Menu as="div" class="relative inline-block text-left">
                                <MenuButton class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500">
                                    <CogIcon class="h-5 w-5" aria-hidden="true" />
                                </MenuButton>

                                <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                    <MenuItems class="origin-top-right absolute right-0 mt-2 w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none z-50">
                                        <div class="py-1">
                                            <MenuItem v-slot="{ active }">
                                                <a href="#" class="text-black group flex items-center px-4 py-2 text-sm" @click="setSelectedContact(contact)">
                                                    <PencilAltIcon class="mr-3 h-5 w-5 text-black group-hover:text-gray-500" aria-hidden="true" />
                                                    Edit
                                                </a>
                                            </MenuItem>
                                        </div>
                                    </MenuItems>
                                </transition>
                            </Menu>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <AddContactModal :show="addingContact" :company-id="companyId" @close="closeAddModal" v-if="companyId"/>
        <UpdateContactModal v-if="selectedContact" :show="editingContact" :contact="selectedContact" @close="closeEditingModal" />
    </div>
</template>
