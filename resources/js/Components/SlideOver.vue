<script setup>
import { computed, onMounted, onUnmounted, watch } from 'vue';
import {Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot} from "@headlessui/vue";
import {XCircleIcon} from "@heroicons/vue/solid";

const props = defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    closeable: {
        type: Boolean,
        default: true,
    },
    title: {
        type: String,
        required: false
    }
});

const emit = defineEmits(['close']);

const close = () => {
    if (props.closeable) {
        this.show = false;
        emit('close');
    }
};

const closeOnEscape = (e) => {
    if (e.key === 'Escape' && props.show) {
        close();
    }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));

onUnmounted(() => {
    document.removeEventListener('keydown', closeOnEscape);
    document.body.style.overflow = null;
});
</script>

<template>
    <TransitionRoot as="template" :show="show" scroll-region>
        <Dialog as="div" class="fixed inset-0 overflow-hidden" @close="show = false">
            <div class="absolute inset-0 overflow-hidden">
                <TransitionChild as="template" enter="ease-in-out duration-500" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-500" leave-from="opacity-100" leave-to="opacity-0">
                    <DialogOverlay class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
                </TransitionChild>
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                    <TransitionChild as="template" enter="transform transition ease-in-out duration-500 sm:duration-700" enter-from="translate-x-full" enter-to="translate-x-0" leave="transform transition ease-in-out duration-500 sm:duration-700" leave-from="translate-x-0" leave-to="translate-x-full">
                        <div class="pointer-events-auto relative w-screen max-w-md">
                            <TransitionChild as="template" enter="ease-in-out duration-500" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-500" leave-from="opacity-100" leave-to="opacity-0">
                                <div class="absolute top-0 left-0 -ml-8 flex pt-4 pr-2 sm:-ml-10 sm:pr-4">
                                    <button type="button" class="rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white" @click="close">
                                        <span class="sr-only">Close panel</span>
                                        <XCircleIcon class="h-6 w-6" aria-hidden="true" />
                                    </button>
                                </div>
                            </TransitionChild>

                            <div class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl">
                                <div class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl">
                                    <div class="px-4 sm:px-6" v-if="title">
                                        <DialogTitle class="text-lg font-medium text-gray-900">
                                            {{ title }}
                                        </DialogTitle>
                                    </div>

                                    <div class="relative mt-6 flex-1 px-4 sm:px-6">
                                        <slot v-if="show" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
