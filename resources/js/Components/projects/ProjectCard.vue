<template>
    <div class="bg-white grow w-1/5">
        <div class="w-full"><img :src="`${project.img_src}`" /></div>
        <div class="p-6">
            <h3>{{ project.name }}</h3>
            <a :href="`projects/${project.id}/edit`">Edit Project</a>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    project: Object,
});
</script>

<style lang="scss" scoped></style>
