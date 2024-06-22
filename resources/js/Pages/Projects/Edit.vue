<template>
    <head title="New project" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit project
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-md bg-white sm:px-6 lg:px-8">
                <form class="p-4" @submit.prevent="submit">
                    <div class="mt-4">
                        <InputLabel for="name" value="name" />
                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                            required
                            autofocus
                        />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <div class="mt-2">
                        <InputLabel for="image" value="image" />
                        <TextInput
                            id="image"
                            type="file"
                            class="mt-1 block w-full"
                            v-model="form.image"
                            @input="form.image = $event.target.files[0]"
                        />
                        <InputError class="mt-2" :message="form.errors.image" />
                    </div>

                    <div class="mt-4 flex items-center justify-end">
                        <PrimaryButton
                            type="submit"
                            class="ms-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Update
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import InputError from "../../Components/InputError.vue";
import InputLabel from "../../Components/InputLabel.vue";
import TextInput from "../../Components/TextInput.vue";
import PrimaryButton from "../../Components/PrimaryButton.vue";
import { router } from "@inertiajs/vue3";

const props = defineProps({
    project: Object,
});

const form = useForm({
    name: props.project?.name,
    image: null,
});

const submit = () => {
    router.post(`/projects/${props.project.id}`, {
        _method: "put",
        name: form.name,
        image: form.image,
    });
};
</script>
