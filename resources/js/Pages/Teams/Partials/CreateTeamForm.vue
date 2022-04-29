<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import { InformationCircleIcon } from '@heroicons/vue/solid'
import JetButton from '@/Jetstream/Button.vue';
import JetFormSection from '@/Jetstream/FormSection.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetInputError from '@/Jetstream/InputError.vue';
import JetLabel from '@/Jetstream/Label.vue';

const form = useForm({
    name: '',
});

const createTeam = () => {
    form.post(route('teams.store'), {
        errorBag: 'createTeam',
        preserveScroll: true,
    });
};
</script>

<template>
    <JetFormSection @submitted="createTeam">
        <template #title>
            Team Details
        </template>

        <template #description>
            Create a new team to collaborate with others on projects.
        </template>

        <template #form>
            <div class="rounded-md bg-blue-50 p-4 mb-5 col-span-full" v-if="!$page.props.user.current_team">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <InformationCircleIcon class="h-5 w-5 text-blue-400" aria-hidden="true" />
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-bold text-blue-800">Create Your First Team!</h3>
                        <div class="mt-2 text-sm text-blue-700">
                            <p>
                                Let's get started by creating your first team! Your team is your organization. Once your team has
                                been created, you will be able to invite users to begin collaborating with.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-6">
                <JetLabel value="Team Owner" />

                <div class="flex items-center mt-2">
                    <img class="object-cover w-12 h-12 rounded-full" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name">

                    <div class="ml-4 leading-tight">
                        <div>{{ $page.props.user.name }}</div>
                        <div class="text-sm text-gray-700">
                            {{ $page.props.user.email }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="name" value="Team Name" />
                <JetInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="block w-full mt-1"
                    autofocus
                />
                <JetInputError :message="form.errors.name" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <JetButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Create
            </JetButton>
        </template>
    </JetFormSection>
</template>
