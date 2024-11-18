<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
  categories: Object
});
const formData = useForm({
  name: "",
  description: "",
  short_description: "",
  img_src: null,
  category_id: "",
  site: "",
  status: "",
  freelance: false,
  personal: false,
});

function submit() {
  if (formData.type === "both") {
    formData.freelance = true;
    formData.personal = true;
  } else if (formData.type === "freelance") {
    formData.freelance = true;
    formData.personal = false;
  } else if (formData.type === "personal") {
    formData.freelance = false;
    formData.personal = true;
  } else {
    formData.freelance = false;
    formData.personal = false;
  }

  formData.post(route("projects.store"));
}
</script>
<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white p-6">
                        <h1>Create New Project</h1>
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
                                <input
                                    type="file"
                                    name="img_src"
                                    id=""
                                    @input="
                                        formData.img_src =
                                            $event.target.files[0]
                                    "
                                />
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
                                <label for="category_id">Type</label>
                                <select
                                    name="category_id"
                                    v-model="formData.type"
                                >
                                    <option
                                        value="none"
                                        selected
                                        disabled
                                        hidden
                                    >
                                        Select a Type
                                    </option>
                                    <option value="freelance">Freelance</option>
                                    <option value="personal">Personal</option>
                                    <option value="both">Both</option>
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
                            <div class="flex flex-col mb-4">
                                <input type="submit" value="Submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

