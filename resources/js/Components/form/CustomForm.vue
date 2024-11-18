<template>
    <form @submit.prevent="submit" enctype="multipart/form-data">
        <BaseInput label="Name" v-model="formData.name">
            <p class="text-red-500" v-if="formData.errors.name">
                {{ formData.errors.name }}
            </p>
        </BaseInput>
        <BaseTextArea label="Description" v-model="formData.description" />
        <BaseTextArea
            label="Short Description"
            v-model="formData.short_description"
        />
        <BaseInput type="file" label="Image" v-model="formData.img_src">
            <div v-if="props.project" class="h-1/2">
                <h5>Old Image</h5>
                <img :src="`/storage/${project.img_src}`" />
            </div>
        </BaseInput>
        <BaseSelect label="Category" v-model="formData.category_id">
            <option value="none" selected disabled hidden>
                Select a Category
            </option>
            <option :value="category.id" v-for="category in categories" class="capitalize">{{ category.name }}</option>

            <template #error>
                <p class="text-red-500" v-if="formData.errors.category_id">
                    {{ formData.errors.category_id }}
                </p>
            </template>
        </BaseSelect>

        <BaseSelect label="Type" v-model="formData.type">
            <option value="none" selected disabled hidden>Select a Type</option>
            <option value="freelance">Freelance</option>
            <option value="personal">Personal</option>
            <option value="both">Both</option>
            <template #error>
                <p class="text-red-500" v-if="formData.errors.type">
                    {{ formData.errors.type }}
                </p>
            </template>
        </BaseSelect>
        <BaseSelect label="Status" v-model="formData.status">
            <option value="none" selected disabled hidden>
                Select a Status
            </option>
            <option value="published">Published</option>
            <option value="hidden">Hidden</option>
        </BaseSelect>

        <div class="flex flex-col mb-4">
            <Label for="site">Project Url</Label>
            <input type="text" name="site" id="" v-model="formData.site" />
        </div>
        <div class="flex flex-col mb-4">
            <input type="submit" value="Submit" />
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";
import BaseInput from "./BaseInput.vue";
import BaseTextArea from "./BaseTextArea.vue";
import BaseSelect from "./BaseSelect.vue";

const props = defineProps({
    project: Object,
    categories: Object
});

// const type = ref("");
const formData = useForm({
    name: props.project.name || "",
    description: props.project.description || "",
    short_description: props.project.short_description || "",
    freelance: props.project.freelance || false,
    personal: props.project.personal || false,
    img_src: null,
    category_id: props.project.category_id || "",
    status: props.project.status || "",
    site: props.project.site || "",
});

onMounted(() => {
    if (props.project.freelance && !props.project.personal) {
        formData.type = "freelance";
    } else if (props.project.freelance && props.project.personal) {
        formData.type = "both";
    } else if (!props.project.freelance && props.project.personal) {
        formData.type = "personal";
    }
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
    formData.put(route("projects.update", props.project.id));
}
</script>

<style lang="scss" scoped></style>
