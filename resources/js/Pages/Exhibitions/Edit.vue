<template>
    <head title="New Exhibition" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">New Exhibition</h2>
        </template>

        <div class="py-12">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white py-4 shadow-grey-300">
                <form @submit.prevent="submit">
                    <div class="py-6">
                        <InputLabel for="Project" value="project" />
                        <select v-model="form.project_id"
                            name="project_id"
                            id="project_id"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            <option v-for="project in projects" :key="project.id" :value="project.id">
                                {{ project.name }}
                            </option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <InputLabel for="name" value="name" />
                        <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="project_url" value="URL" />
                        <TextInput id="project_url" type="text" class="mt-1 block w-full" v-model="form.project_url"
                            required autofocus />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="image" value="image" />
                        <TextInput id="image" type="file" class="mt-1 block w-full" v-model="form.image"
                            @input="form.image = $event.target.files[0]" />
                        <InputError class="mt-2" :message="form.errors.image" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton type="submit" class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Update
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '../../Components/InputError.vue';
import InputLabel from '../../Components/InputLabel.vue';
import TextInput from '../../Components/TextInput.vue';
import PrimaryButton from '../../Components/PrimaryButton.vue';
import { router } from '@inertiajs/vue3'


const props = defineProps({
    projects: Array,
    exhibition: Object
})

const form = useForm({
    name: props.exhibition?.name,
    image: null,
    project_id: props.exhibition?.project_id,
    project_url: props.exhibition?.project_url
});

const submit = () => {
    router.post(`/exhibitions/${props.exhibition.id}`, {
        _method: "put",
        name: form.name,
        image: form.image,
        project_id: form.project_id,
        project_url: form.project_url
    });
};

</script>
