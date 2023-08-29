<template>
    <div class="bg-white grow w-1/5">
        <div class="w-full"><img :src="`storage/${project.img_src}`" /></div>
        <div class="p-6">
            <h3>{{ project.name }}</h3>
            <a :href="`projects/edit/${project.id}`">Edit Project</a>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    project: Object,
});
</script>

<style lang="scss" scoped></style>
