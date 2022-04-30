<script>

import {Company} from "../../Models/Company";
import AppLayout from "../../Layouts/AppLayout";
import {Orion} from "@tailflow/laravel-orion/lib/orion";
import Button from "../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Jetstream/Button";

export default {
    components: {Button, AppLayout},
    data() {
        return {
            companies: []
        }
    },

    created() {
        this.getCompanies();
    },

    methods: {
        async getCompanies() {
            try {
                await Orion.csrf();
                // now you can make requests to the API
                this.companies = await Company.$query().with(['assignedTo', 'contacts']).get();
                console.log(this.companies);
            } catch (error) {
                console.error('Unable to retrieve CSRF cookie.');
            }
        }
    }
}

</script>

<template>
    <app-layout>
        <template #header>
            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                Companies
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto p-5 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">Companies</h1>
                        <p class="mt-2 text-sm text-gray-700">A list of all the companies in your account including their name, title, email and role.</p>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <Button type="button">Create Company</Button>
                    </div>
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                    <tr class="divide-x divide-gray-200">
                                        <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Assigned To</th>
                                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Create Date</th>
                                        <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">Last Update</th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr v-for="company in companies" :key="company.id" class="divide-x divide-gray-200">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                                <a :href="route('companies.show', company.$attributes.id)">
                                                    {{ company.$attributes.name }}
                                                </a>
                                            </td>
                                            <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                                                <div class="flex">
                                                    <div class="h-10 w-10 flex-shrink-0">
                                                        <img class="h-10 w-10 rounded-full" :src="company.$attributes.assigned_to.profile_photo_url" alt="{{ company.$attributes.assigned_to.name }}" />
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="font-medium text-gray-900">{{ company.$attributes.assigned_to.name }}</div>
                                                        <div class="text-gray-500">{{ company.$attributes.assigned_to.email }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{ new Date(company.$attributes.created_at).toDateString() }}</td>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-6">{{ new Date(company.$attributes.updated_at).toDateString() }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>

</template>
