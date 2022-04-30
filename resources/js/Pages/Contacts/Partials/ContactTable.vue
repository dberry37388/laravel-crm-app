<script>
export default {
    props: {
        contacts: {
            type: Array,
            required: true
        }
    }
}
</script>

<template>
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 mt-5">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
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
                    <tr v-for="contact in contacts" :key="contact.id" class="divide-x divide-gray-200">
                        <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                            {{ contact.first_name }} {{ contact.last_name }}
                        </td>
                        <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                            {{ contact.email }}
                        </td>

                        <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                            {{ contact.job_title }}
                        </td>

                        <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                            {{ contact.phone_number }}
                        </td>

                        <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                            {{ contact.mobile_number }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
