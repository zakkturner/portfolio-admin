<template>
    <div class="bg-white p-6">
        <h1>Edit {{ project.name }}</h1>
        <form @submit.prevent="submit" enctype="multipart/form-data">
            <div class="flex flex-col mb-4">
                <label for="name">Name</label>
                <input type="text" name="name" id="" v-model="formData.name" />
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
                <label for="short-description">Short Description</label>
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
                        @input="formData.img_src = $event.target.files[0]"
                    />
                    <div class="h-1/2">
                        <h5>Old Image</h5>
                        <img :src="`/storage/${project.img_src}`" />
                    </div>
                </div>
            </div>
            <div class="flex flex-col mb-4">
                <label for="category_id">Category</label>
                <select name="category_id" v-model="formData.category_id">
                    <option value="none" selected disabled hidden>
                        Select a Category
                    </option>
                    <option value="1">Frontend</option>
                    <option value="2">Ecommerce</option>
                    <option value="3">PHP</option>
                </select>
            </div>
            <div class="flex flex-col mb-4">
                <label for="site">Project Url</label>
                <input type="text" name="site" id="" v-model="formData.site" />
            </div>
            <div class="flex justify-end mb-4">
                <input type="submit" value="Update Project" />
            </div>
        </form>
    </div>
</template>

<script setup></script>

<style lang="scss" scoped></style>
