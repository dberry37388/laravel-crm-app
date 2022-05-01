<script>
import Input from "../../../Jetstream/Input";
import {Contact} from "../../../Models/Contact";
import {FilterOperator} from "@tailflow/laravel-orion/lib/drivers/default/enums/filterOperator";
import Button from "../../../Jetstream/Button";
import { SearchIcon } from '@heroicons/vue/solid'

export default {
    components: {Button, Input, SearchIcon},

    props: {
        companyId: {
            type: Number,
            required: true
        }
    },

    data() {
        return {
            search: '',
            contacts: []
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
                .search()
        }), 300),
    },
}
</script>

<template>
    <div class="sm:-mx-6 lg:-mx-8 mt-5">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

            <div class="mt-1 relative rounded-md shadow-sm w-full mb-4">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <SearchIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                </div>
                <Input type="text" class="w-full pl-10" placeholder="Search by a contacts first or last name, or by their email address" v-model.lazy="search" @input="searchContacts" />
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
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
