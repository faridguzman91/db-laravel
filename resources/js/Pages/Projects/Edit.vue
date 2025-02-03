<template>
    <head title="Edit project" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit project
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
                        />
                        <InputError class="mt-2" :message="form.errors.name" />
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
                    <div class="mt-4">
                        <InputLabel for="image" value="Image" />
                        <TextInput
                            id="image"
                            type="file"
                            class="mt-1 block w-full"
                            @input="form.image = $event.target.files[0]"
                        />
                        <InputError class="mt-2" :message="form.errors.image" />
                    </div>

                    <!-- Submit Button and Cancel Button -->
                    <div class="mt-4 flex items-center justify-end space-x-4">
                        <PrimaryButton
                            type="submit"
                            class="ms-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Update
                        </PrimaryButton>

                        <!-- Cancel Button -->
                        <button
                            type="button"
                            class="text-gray-600 hover:text-gray-900"
                            @click="cancelEdit"
                        >
                            Cancel
                        </button>
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
    category: props.project?.category || "", // Set category
    description: props.project?.description,
    year: props.project?.year,
    project_url: props.project?.project_url,
    materials: props.project?.materials || [""], // Initialize with existing materials or an empty string
    image: null,
});

const addMaterial = () => {
    form.materials.push(""); // Add an empty string to the materials array
};

const removeMaterial = (index) => {
    form.materials.splice(index, 1); // Remove the material at the given index
};

const submit = () => {
    const data = new FormData();
    data.append("_method", "put");
    data.append("name", form.name);
    data.append("category", form.category);
    data.append("description", form.description);
    data.append("year", form.year);
    data.append("project_url", form.project_url);
    data.append("materials", JSON.stringify(form.materials)); // Serialize materials array
    if (form.image) {
        data.append("image", form.image); // Append the image if provided
    }

    router.post(`/projects/${props.project.id}`, data);
};

// Cancel Edit: Redirects back to the projects index page
const cancelEdit = () => {
    router.visit(route('projects.index')); // Navigates to the projects index page
};
</script>


