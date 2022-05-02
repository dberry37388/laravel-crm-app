<script>
import {Disclosure, DisclosureButton, DisclosurePanel} from "@headlessui/vue";
import ContactTable from "./ContactTable";
import {ChevronDownIcon} from "@heroicons/vue/solid"
import Button from "../../../Jetstream/Button";

export default {
    props: {
        companyId: {
            type: Number,
            required: true,
        }
    },
    components: {Button, ChevronDownIcon, ContactTable, DisclosurePanel, DisclosureButton, Disclosure}
}
</script>

<template>
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
            <DisclosurePanel class="h-75 overflow-auto">
                <ContactTable :company-id="companyId" />
            </DisclosurePanel>
        </transition>
    </Disclosure>
</template>
