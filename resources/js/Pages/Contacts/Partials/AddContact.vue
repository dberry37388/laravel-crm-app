<script>
import {nextTick} from "vue";

import DialogModal from "../../../Jetstream/DialogModal";
import InputError from "../../../Jetstream/InputError";
import SecondaryButton from "../../../Jetstream/SecondaryButton";
import Button from "../../../Jetstream/Button";
import Input from "../../../Jetstream/Input";
import {Company} from "../../../Models/Company";
import {Contact} from "../../../Models/Contact";
import {usePage} from "@inertiajs/inertia-vue3";

export  default {
    components: {Input, Button, SecondaryButton, InputError, DialogModal},
    props: {
        company: {
            type: Object,
            required: false,
        }
    },

    emits: ['updated', 'close'],

    data() {
        return {
            show: false,
            form: {
                first_name: '',
                last_name: '',
                email: '',
                phone_number: '',
                mobile_number: '',
                job_title: '',
                processing: false,
            },
        }
    },

    methods: {
        async saveForm() {
            this.form.processing = true;

            await Contact.$query().store({
                company_id: this.company.$attributes.id,
                created_by: usePage().props.value.user.id,
                assigned_to: usePage().props.value.user.id,
                name: this.form.name,
                first_name: this.form.first_name,
                last_name: this.form.last_name,
                email: this.form.email,
                phone_number: this.form.phone_number,
                mobile_number: this.form.mobile_number,
                job_title: this.form.job_title,
            }).then(() => {
                this.form.processing = false;
                this.closeDialog();
            })
                .catch(error => {
                    this.form.processing = false;
                    console.log(error)
                });
        },

        closeDialog() {
            this.show = false;
            this.$emit('updated');
            this.$emit('close');
        }
    }
}
</script>

<template>
    <DialogModal :closeable="false" :show="show">
        <template #title>
            <h2 class="font-bold">
                Add Contact
            </h2>
        </template>

        <template #content>
            <div class="flex flex-col gap-3">
                <div>
                    <Input
                        v-model="form.first_name"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="First Name"
                    />

                    <InputError :message="form.error" class="mt-2" />
                </div>

                <div>
                    <Input
                        v-model="form.last_name"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Last Name"
                    />

                    <InputError :message="form.error" class="mt-2" />
                </div>

                <div>
                    <Input
                        v-model="form.email"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Email Address"
                    />

                    <InputError :message="form.error" class="mt-2" />
                </div>

                <div>
                    <Input
                        v-model="form.job_title"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Job Title"
                    />

                    <InputError :message="form.error" class="mt-2" />
                </div>

                <div>
                    <Input
                        v-model="form.phone_number"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Phone Number"
                    />

                    <InputError :message="form.error" class="mt-2" />
                </div>

                <div>
                    <Input
                        v-model="form.mobile_number"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Mobile Number"
                    />

                    <InputError :message="form.error" class="mt-2" />
                </div>
            </div>
        </template>

        <template #footer>
            <SecondaryButton @click="closeDialog">
                Cancel
            </SecondaryButton>

            <Button
                class="ml-3"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
                @click="saveForm"
            >
                Save
            </Button>
        </template>
    </DialogModal>
</template>
