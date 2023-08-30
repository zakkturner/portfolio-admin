<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-end px-6 pt-6">
                        <button
                            class="bg-red-500 text-white border-0"
                            @click="show = true"
                        >
                            Delete Project
                        </button>
                    </div>
                    <div class="bg-white p-6">
                        <h1>Edit {{ project.name }}</h1>
                        <form
                            @submit.prevent="submit"
                            enctype="multipart/form-data"
                        >
                            <div class="flex flex-col mb-4">
                                <label for="name">Name</label>
                                <input
                                    type="text"
                                    name="name"
                                    id=""
                                    v-model="formData.name"
                                />
                            </div>
                            <div class="flex flex-col mb-4">
                                <label for="description">Description</label>
                                <textarea
                                    type="text"
                                    name="description"
                                    id=""
                                    v-model="formData.description"
                                ></textarea>
                            </div>
                            <div class="flex flex-col mb-4">
                                <label for="short-description"
                                    >Short Description</label
                                >
                                <textarea
                                    type="text"
                                    name="short-description"
                                    id=""
                                    v-model="formData.short_description"
                                ></textarea>
                            </div>
                            <div class="flex flex-col mb-4">
                                <label for="img_src">Image</label>
                                <div class="flex justify-between">
                                    <input
                                        type="file"
                                        name="img_src"
                                        id=""
                                        @input="
                                            formData.img_src =
                                                $event.target.files[0]
                                        "
                                    />
                                    <div class="h-1/2">
                                        <h5>Old Image</h5>
                                        <img
                                            :src="`/storage/${project.img_src}`"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col mb-4">
                                <label for="category_id">Category</label>
                                <select
                                    name="category_id"
                                    v-model="formData.category_id"
                                >
                                    <option
                                        value="none"
                                        selected
                                        disabled
                                        hidden
                                    >
                                        Select a Category
                                    </option>
                                    <option value="1">Frontend</option>
                                    <option value="2">Ecommerce</option>
                                    <option value="3">PHP</option>
                                </select>
                            </div>
                            <div class="flex flex-col mb-4">
                                <label for="status">Status</label>
                                <select name="status" v-model="formData.status">
                                    <option
                                        value="none"
                                        selected
                                        disabled
                                        hidden
                                    >
                                        Select a Status
                                    </option>
                                    <option value="published">Published</option>
                                    <option value="hidden">Hidden</option>
                                </select>
                            </div>
                            <div class="flex flex-col mb-4">
                                <label for="site">Project Url</label>
                                <input
                                    type="text"
                                    name="site"
                                    id=""
                                    v-model="formData.site"
                                />
                            </div>
                            <div class="flex justify-end mb-4">
                                <input type="submit" value="Update Project" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
    <Modal :show="show">
        <div class="p-4 flex flex-col">
            <h3 class="mb-6">Are you sure you want to delete this project?</h3>
            <div class="flex justify-between">
                <button @click="show = false">Cancel</button>
                <Link
                    class="bg-red-500 text-white border-0"
                    :href="route('projects.destroy', project.id)"
                    as="button"
                    method="DELETE"
                    @click="show = false"
                >
                    Yes, Delete
                </Link>
            </div>
        </div>
    </Modal>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";
import { useForm, Link } from "@inertiajs/vue3";
const props = defineProps({
    project: Object,
});
const show = ref(false);
const formData = useForm({
    name: props.project.name,
    description: props.project.description,
    short_description: props.project.short_description,
    img_src: null,
    category_id: props.project.category_id,
    site: props.project.site,
});
function submit() {
    formData.put(route("projects.update", props.project.id));
}
</script>

<style lang="scss" scoped></style>
