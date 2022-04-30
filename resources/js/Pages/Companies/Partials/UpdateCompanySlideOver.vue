<script>
import {nextTick} from "vue";

import DialogModal from "../../../Jetstream/DialogModal";
import InputError from "../../../Jetstream/InputError";
import SecondaryButton from "../../../Jetstream/SecondaryButton";
import Button from "../../../Jetstream/Button";
import Input from "../../../Jetstream/Input";

export  default {
    components: {Input, Button, SecondaryButton, InputError, DialogModal},
    props: {
        company: {
            type: Object,
            required: true,
        }
    },

    emits: ['updated', 'close'],

    data() {
        return {
            show: false,
            form: {
                name: this.company.$attributes.name,
                processing: false,
            },
        }
    },

    methods: {
        async saveForm() {
            this.form.processing = true;

            await this.company.$query().update(this.company.$attributes.id, {
                name: this.form.name
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
                Edit Company
            </h2>
        </template>

        <template #content>
            <Input
                v-model="form.name"
                type="text"
                class="mt-1 block w-3/4"
                placeholder="Company Name"
            />

            <InputError :message="form.error" class="mt-2" />
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
