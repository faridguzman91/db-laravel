<template>
    <Head title="New project" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                New project
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-md bg-white sm:px-6 lg:px-8">
                <form class="p-4" @submit.prevent="submit">
                    <!-- Name -->
                    <div class="mt-4">
                        <InputLabel for="name" value="Name" />
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

                    <!-- Description -->
                    <div class="mt-4">
                        <InputLabel for="description" value="Description" />
                        <textarea
                            id="description"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="form.description"
                            required
                        ></textarea>
                        <InputError class="mt-2" :message="form.errors.description" />
                    </div>

                    <!-- Year -->
                    <div class="mt-4">
                        <InputLabel for="year" value="Year" />
                        <TextInput
                            id="year"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="form.year"
                            required
                            min="1900"
                            :max="new Date().getFullYear() + 1"
                        />
                        <InputError class="mt-2" :message="form.errors.year" />
                    </div>

                    <!-- Project URL -->
                    <div class="mt-4">
                        <InputLabel for="project_url" value="Project URL" />
                        <TextInput
                            id="project_url"
                            type="url"
                            class="mt-1 block w-full"
                            v-model="form.project_url"
                            required
                        />
                        <InputError class="mt-2" :message="form.errors.project_url" />
                    </div>

                    <!-- Category -->
                    <div class="mt-4">
                        <InputLabel for="category" value="Category" />
                        <TextInput
                            id="category"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.category"
                            required
                        />
                        <InputError class="mt-2" :message="form.errors.category" />
                    </div>

                    <!-- Materials (Array of strings) -->
                    <div class="mt-4">
                        <InputLabel for="materials" value="Materials" />
                        <div v-for="(material, index) in form.materials" :key="index" class="flex items-center mb-2">
                            <TextInput
                                :id="'material-' + index"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.materials[index]"
                                required
                            />
                            <button
                                type="button"
                                class="ml-2 text-red-500"
                                @click="removeMaterial(index)"
                            >
                                Remove
                            </button>
                        </div>
                        <button
                            type="button"
                            class="mt-2 text-blue-500"
                            @click="addMaterial"
                        >
                            Add Material
                        </button>
                        <InputError class="mt-2" :message="form.errors.materials" />
                    </div>

                    <!-- Image Upload -->
                    <div class="mt-2">
                        <InputLabel for="image" value="Image" />
                        <TextInput
                            id="image"
                            type="file"
                            class="mt-1 block w-full"
                            @change="handleImageUpload"
                        />
                        <InputError class="mt-2" :message="form.errors.image" />
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4 flex items-center justify-end">
                        <PrimaryButton
                            type="submit"
                            class="ms-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Store
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
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    name: "",
    description: "",
    year: "",
    project_url: "",
    category: "",  // Category field
    materials: [""], // Initialize as an array with one empty string
    image: null,
});

// Handle adding a new material input field
const addMaterial = () => {
    form.materials.push(""); // Add an empty string to the materials array
};

// Handle removing a material input field
const removeMaterial = (index) => {
    form.materials.splice(index, 1); // Remove the material at the given index
};

const handleImageUpload = (event) => {
    form.image = event.target.files[0];
};

const submit = () => {
    form.post(route("projects.store"), {
        forceFormData: true,
    });
};
</script>

